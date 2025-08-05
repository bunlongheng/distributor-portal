<?php

class API_InventoryController extends \BaseController
{

    // This function will gather all the data, polish, then insert into the database.
    public function post()
    {
        // Declaration
        date_default_timezone_set('America/New_York');
        ini_set('memory_limit', '2048M');
        set_time_limit(-1);
        $day_of_week = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m"), date("d"), date("Y")), 0);
        $head = true;
        $exist_in_magento_and_qb = 0;
        $exist_in_magento_only = 0;
        $qb_array = [];

        //Retreive all the json data from QuickBooks
        $qb_raw = json_decode(Input::get('json'), true);


        $content = Input::get('json');
        $fp = fopen(public_path() . "/request" . date('Y-m-d-H:i:s') . ".txt", "wb");
        fwrite($fp, $content);
        fclose($fp);
        if ($qb_raw) {
            // QB array also keyed by SKU
            foreach ($qb_raw as $sku => $stock) {
                if (strpos($sku, '-')
                    && strlen($sku) < 20
                    && strlen($sku) > 5
                    && strpos($sku, 'bs') === 0
                    && strpos($sku, '(') === false) {    // valid SKU
                    $elements = explode('-', $sku);
                    $elements[0] = strtolower($elements[0]);
                    $elements[1] = strtoupper($elements[1]);
                    $qb_array[implode("-", $elements)] = $stock;
                }
            }
        }
        // Make a cURL request to Product Database API 
        $ch = curl_init("http://biossantibodies.com/api/v2/products?key=qoEfzhTb7tfF6S86fp9LgMvor6Wfax3R7gRrnbAYZOLDV&fields=name,status,price,conjugation&conjugate=1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
        // Contruct  $product_database_array base on Simon's API
        $product_database_array = json_decode($response, true);

        // Truncate the table before insert the new one
        // DB::table('inventories')->truncate();


        $start = date("i");


        list($exist_in_magento_and_qb, $exist_in_magento_only) = $this->importIntoInventory($product_database_array, $day_of_week, $qb_array, $exist_in_magento_and_qb, $exist_in_magento_only);


        $speciaProductsArray = SpecialProducts::all()->keyBy('sku')->toArray();


        list($exist_in_magento_and_qb2, $exist_in_magento_only2) = $this->importIntoInventory($speciaProductsArray, $day_of_week, $qb_array, $exist_in_magento_and_qb, $exist_in_magento_only);

        $exist_in_magento_only = array_merge($exist_in_magento_only, $exist_in_magento_only2);
        $exist_in_magento_and_qb = array_merge($exist_in_magento_and_qb, $exist_in_magento_and_qb2);
        // Check to see how long does it take to insert all data into database
        $end = date("i");
        $timer = ($end - $start);


        // Report Messages
        echo "<div style='position:fixed;right:20px;top:80px;' class='alert alert-info'><span class='fa fa-ellipsis-v'></span>
        All SKU : <b>" . count($qb_raw) . "</b></div>";

        echo "<div style='position:fixed;right:20px;top:140px;' class='alert alert-warning'><span class='fa fa-check-square'></span>
        Valid SKU : <b>" . count($product_database_array) . "</b></div>";

        echo "<div style='position:fixed;right:20px;top:200px;' class='alert alert-success'><span class='fa fa-crosshairs'></span>
        SKU in ( Magento + QuickBooks ) : <b>" . $exist_in_magento_and_qb . "</b></div>";

        echo "<div style='position:fixed;right:20px;top:260px;' class='alert alert-success'><span class='fa fa-crosshairs'></span>
        SKU in ( Magento only ) : <b>" . $exist_in_magento_only . "</b></div>";

        echo "<div style='position:fixed;right:20px;top:320px;' class='alert alert-success'><span class='fa fa-check'></span>
        It takes about $timer minute(s).";
    }


    // Grab the user input and perform a query from inventories table
    public function index()
    {
        // Grab the user input from the form
        $search = Input::get('search');

        // This is for pagination
        $params = compact('search');


        // Declare Important Variables that need to check
        $count_dash = substr_count($search, '-');
        $last_dash = strrpos($search, "-");
        $related_search = substr($search, 0, $last_dash);
        $last = substr($search, -1);
        $first_two = substr($search, 0, 2);


        // Check the restriction on user input
        if ($search) {
            // Query Data for Exact Match Table
            $inventories = Inventory::where('sku', 'like', $search . '%')
                ->orderBy('stock', 'DESC')->paginate(17);

            // Check the restriction on user input
            // Query Data for Related Table
            if ($last != '-') {
                $related_inventories = Inventory::where('sku', 'like', $related_search . '%')
                    ->orderBy('stock', 'DESC')->paginate(17);

                return View::make('product_inventory.index')
                    ->with('pagination', $inventories->appends($params)->links())
                    ->with('inventories', $inventories)
                    ->with('related_inventories', $related_inventories)
                    ->with('search', $search);
            }

            return View::make('product_inventory.index')
                ->with('pagination', $inventories->appends($params)->links())
                ->with('inventories', $inventories)
                ->with('search', $search);
        } else {
            return View::make('product_inventory.index')->with('search', $search);
        }
    }

    /**
     * @param $product_database_array
     * @param $day_of_week
     * @param array $qb_array
     * @param int $exist_in_magento_and_qb
     * @param int $exist_in_magento_only
     * @return int[]
     */
    private function importIntoInventory($product_database_array, $day_of_week, array $qb_array, int $exist_in_magento_and_qb, int $exist_in_magento_only): array
    {
        foreach ($product_database_array as $sku => $data) {
            if ($data['status'] == "Disabled") {
                $inventory = Inventory::where('sku', '=', $sku)->delete();
                continue;
            }

            $inventory = Inventory::where('sku', '=', $sku)->first(); // rotate out each week
            if (!$inventory) {
                $inventory = new Inventory;
            }
            $inventory->sku = $sku;
            $inventory->conjugation = $data['conjugation'] ?? '';
            $inventory->description = $data['name'];
            $inventory->price = $data['price'] ?? 0;
            $inventory->day_of_week = $day_of_week;
            if (array_key_exists($sku, $qb_array)
                && is_numeric($qb_array[$sku])
                && $qb_array[$sku] >= 0) {
                $inventory->stock = $qb_array[$sku];
                $exist_in_magento_and_qb++;
            } else {
                $inventory->stock = 0;
                $exist_in_magento_only++;
            }
            $inventory->save();
        }
        return array($exist_in_magento_and_qb, $exist_in_magento_only);
    }

    public function suggestion()
    {
        // Grab the user input from the form
        $search = Input::get('term');
        $inventories = [];
        if ($search) {
            // Query Data for Exact Match Table
            $inventories = Inventory::where('sku', 'like', $search . '%')->orderBy('stock', 'DESC')->limit(20)->lists('sku');
        }

        return Response::json($inventories);
    }
}
