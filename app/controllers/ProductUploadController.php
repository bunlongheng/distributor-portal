<?php

class ProductUploadController extends BaseController
{
    protected $limit;

    public function __construct()
    {
        parent::__construct();
        $this->limit = 1000;
    }

    // Bring up create view of Product Upload
    public function create()
    {
        $export_types = ExportType::all();
        // dd($export_types->toArray());

        return View::make('products.upload')
            ->with('export_types', $export_types);
    }

    //Store the Product download
    public function store()
    {
        // $validator = ProductUpload::validator(Input::all());

        // if ($validator->fails()) {
        // 	return Redirect::to('product_uploads/')
        // 	->withErrors($validator)->withInput();
        // }

        // Loop through all the export_type and save them into a certain path
        // I stored them in to their own folder
        // I store them /app/files/ which is behind the public folder for a better security reasons
        if (!Input::hasFile('csv_file')) {
            return Redirect::to('product_uploads/')->with('error', 'No Files');
        }
        $zip = Input::file('csv_file');
        $filename = uniqid() . '-' . $zip->getClientOriginalName();
        $filesize = $zip->getSize();
        $today = date('mdY');
        $relative_path = '/app/files/product_upload/' . $today . '/';

        $destinationPath = base_path() . $relative_path;
        $file_path = $destinationPath . $filename;
        $uploadSuccess = $zip->move($destinationPath, $filename);

        // check extension (allow to accept csv or xlsx)
        $fileExt = $zip->getClientOriginalExtension();
        if (!($fileExt === 'csv' || $fileExt === 'xlsx'|| $fileExt === 'xls')) {
            return Redirect::to('product_uploads/')
                ->with('error', 'Must be a file of type: csv, xlsx.')
                ->withInput();
        }

        if (!isset($uploadSuccess) || !$file_path) {
            return Redirect::to('product_uploads/')
                ->with('error', 'Problem during upload')
                ->withInput();
        }

        // checking headers
        $status = $this->checkHeader($file_path, $fileExt);
        $missedColumnMsg = '';
        if ($fileExt === 'csv') { // if fileType is csv
            // if (!$status['item_name'] || !$status['qty_on_hand'] || !$status['is_active']) {
            if (!$status['item_name'] || !$status['qty_on_hand']) {
                if (!$status['item_name']) {
                    $missedColumnMsg = 'Item Name, ';
                }
                if (!$status['qty_on_hand']) {
                    $missedColumnMsg = $missedColumnMsg . 'Qty on Hand, ';
                }
                // if (!$status['is_active']) {
                // 	$missedColumnMsg = $missedColumnMsg . 'Is Active, ';
                // }
                $errorMsg = 'Missed "' . rtrim($missedColumnMsg, ", ") . '" Column(s)';

                return Redirect::to('product_uploads/')
                    ->with('error', $errorMsg)
                    ->withInput();
            }
        } else { // if fileType is xlsx
            // if (!$status['item'] || !$status['quantity_on_hand'] || !$status['is_active']) {
            if (!$status['item'] || !$status['quantity_on_hand']) {
                if (!$status['item']) {
                    $missedColumnMsg = 'Item, ';
                }
                if (!$status['quantity_on_hand']) {
                    $missedColumnMsg = $missedColumnMsg . 'Quantity on Hand, ';
                }
                // if (!$status['is_active']) {
                // 	$missedColumnMsg = $missedColumnMsg . 'Is Active, ';
                // }
                $errorMsg = 'Missed "' . rtrim($missedColumnMsg, ", ") . '" Column(s)';

                return Redirect::to('product_uploads/')
                    ->with('error', $errorMsg)
                    ->withInput();
            }
        }

        $product_upload = new ProductUpload;
        $product_upload->user_id = Auth::user()->id;
        $product_upload->file_path = $relative_path . $filename;
        $product_upload->status = 'pending';
        $product_upload->save();

        // get total rows in the uploaded file
        $totalRows = $this->getRecordsCount($file_path);

        // update total record count
        $product_upload->records = $totalRows;
        $product_upload->polls_total = ceil($totalRows / $this->limit);
        // $product_upload->polls_pending = ceil($totalRows/$this->limit);
        $product_upload->save();

        // Create an activity log, and save it in the database
        $name = $filename;
        $log = new ActivityLog;
        $log->action = "Store";
        $log->object = "Product";
        $log->name = $name;
        $log->user = Auth::user()->username;
        $log->user_id = Auth::user()->id;
        $log->save();

        /*return View::make('products.import_progress')
        ->with('response', $response);*/

        return Redirect::to("product_uploads/$product_upload->id/progress");
    }

    public function progress($import_id)
    {
        $import_file = ProductUpload::findOrFail($import_id);

        if ($import_file->status == 'completed') {
            return Redirect::to("/product_inventory")
                ->with('success', 'The product has been imported!');
        }

        $response = [
            'id' => $import_file->id,
            'records' => $import_file->records,
            'status' => $import_file->status,
            'polls' => [
                'total' => $import_file->polls_total,
                'completed' => $import_file->polls_completed
            ],
        ];

        return View::make('products.import_progress')
            ->with('response', $response);
    }

    public function process($import_id)
    {
        $ignore_conjugation = [
            'PE-Cy3',
            'PerCP-Cy7',
            'A350',
            'A488',
            'A647',
            'A750',
            'A555',
            'A594',
            'A680',
            'ALEXA FLUOR',
        ];

        $import_file = ProductUpload::find($import_id);
        $dayOfWeek = jddayofweek(cal_to_jd(CAL_GREGORIAN, date("m"), date("d"), date("Y")), 0);

        $response = [
            'status' => false,
            'message' => 'Something went wrong!'
        ];

        if (!$import_file) {
            $response['message'] = 'File not found!';
            return Response::json($response);
        }

        if ($import_file->status == 'completed') {
            $response = [
                'id' => $import_file->id,
                'records' => $import_file->records,
                'status' => 'completed',
                'polls' => [
                    'total' => 1,
                    'completed' => 1
                ],
                'message' => 'The product has been imported!',
            ];
            return Response::json($response);
        }

        if ($import_file->status != 'pending') {
            $response['message'] = 'There is already a product import running!';
            return Response::json($response);
        }

        $import_file->status == 'running';
        $import_file->save();

        $file = base_path() . $import_file->file_path;
        $fileExt = substr($file, -3);

        if (!file_exists($file) || !is_readable($file)) {
            $response['message'] = 'file not found!';
            return Response::json($response);
        }

        \Log::info('getting csvData');
        $records = $this->getRecords($file, 2, 0);

        if (!is_array($records) || count($records) == 0 || !is_array($records[0])) {
            $response['message'] = 'The uploaded file appears empty or has an invalid structure.';
            return Response::json($response);
        }

        $clearRecords = [];

        foreach ($records as $item) {

            if ($fileExt === 'csv') {
                $clearRecords[$item->item_name] = $item;
            }else{
                $clearRecords[$item->item] = $item;
            }
        }

        $records = $clearRecords;
        //346310
        $header = null;
        $csvData = $records;
        // \Log::info('recieved csvData');

        ini_set('memory_limit', '2048M');
        set_time_limit(0); // Use 0 for unlimited

        $ch = curl_init("http://biossantibodies.com/api/v2/products?key=qoEfzhTb7tfF6S86fp9LgMvor6Wfax3R7gRrnbAYZOLDV&fields=name,status,price,conjugation&conjugate=1&active=1");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 300); // 5 minutes
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Accept: application/json',
            'User-Agent: Mozilla/5.0'
        ]);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        // If using https, you can try this (not recommended for production):
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);

        $response = curl_exec($ch);
        if ($response === false) {
            $response = [
                'status' => false,
                'message' => 'Curl error: ' . curl_error($ch)
            ];
            return Response::json($response);
        }
        curl_close($ch);

        $restData = json_decode($response, true);
        if ($restData === null) {
            $response = [
                'status' => false,
                'message' => 'Failed to decode JSON response from API.'
            ];
            return Response::json($response);
        }
        // \Log::info('restData count: '. count($restData));
        unset($response);

        $activeSkus = array();
        $result = array();

        // \Log::info('looping csvData');


        if ($fileExt === 'csv') {
            // create an array of active records which exists in csv but missing in api
            foreach ($csvData as $item) {
                $sku = $item->item_name;
                if (!$sku) {
                    continue;
                }
                $sku = strtolower($sku);

                if (isset($restData[$sku])) {
                    $activeSkus[$sku] = $sku;
                    if ($this->strposa($restData[$sku]['conjugation'], $ignore_conjugation)) {
                        $result[] = [
                            'sku' => $sku,
                            'description' => $restData[$sku]['name'],
                            'conjugation' => $restData[$sku]['conjugation'],
                            'price' => $restData[$sku]['price'],
                            'stock' => $item->qty_on_hand,
                            'day_of_week' => $dayOfWeek,
                        ];
                    }
                } elseif (stripos($sku, 'IHC') === 0 || stripos($sku, 'BSK') === 0) {
                    $activeSkus[$sku] = $sku;
                    $result[] = [
                        'sku' => $sku,
                        'description' => $item->description,
                        'conjugation' => '',
                        'price' => 0,
                        'stock' => $item->qty_on_hand,
                        'day_of_week' => $dayOfWeek,
                    ];
                }/* else {
	                \Log::info('skipping sku: ' . $sku);
	            }*/
            }
        } else {

            // create an array of active records which exists in xlsx but missing in api
            foreach ($csvData as $item) {
                $sku = $item->item;
                if (!$sku) {
                    continue;
                }
                $sku = strtolower($sku);

                if (isset($restData[$sku])) {
                    $activeSkus[$sku] = $sku;
                    if ($this->strposa($restData[$sku]['conjugation'], $ignore_conjugation)) {
                        $result[] = [
                            'sku' => $sku,
                            'description' => $restData[$sku]['name'],
                            'conjugation' => $restData[$sku]['conjugation'],
                            'price' => $restData[$sku]['price'],
                            'stock' => $item->quantity_on_hand,
                            'day_of_week' => $dayOfWeek,
                        ];
                    }
                } elseif (stripos($sku, 'IHC') === 0 || stripos($sku, 'BSK') === 0) {
                    $activeSkus[$sku] = $sku;
                    $result[] = [
                        'sku' => $sku,
                        'description' => $item->description,
                        'conjugation' => '',
                        'price' => 0,
                        'stock' => $item->quantity_on_hand,
                        'day_of_week' => $dayOfWeek,
                    ];
                }/* else {
	                \Log::info('skipping sku: ' . $sku);
	            }*/
            }
        }
        // \Log::info('unsetting csvData');
        // \Log::info('active sku count in csv: '. count($activeSkus));
        //\Log::info('active sku in csv: ', $activeSkus);
        unset($csvData);
        // \Log::info('looping restData');
        // create an array of active records which exists in api but missing in csv
        foreach ($restData as $key => $value) {
            if ($key != '' && !isset($activeSkus[$key]) && $this->strposa($restData[$key]['conjugation'], $ignore_conjugation)) {
                $result[] = [
                    'sku' => $key,
                    'description' => $restData[$key]['name'],
                    'conjugation' => $restData[$key]['conjugation'],
                    'price' => $restData[$key]['price'],
                    'stock' => 0,
                    'day_of_week' => $dayOfWeek,
                ];
            }
        }
        // \Log::info('unsetting restData');
        // \Log::info('total active sku count: '. count($result));
        unset($activeSkus);
        unset($restData);

        // \Log::info('Truncating all the inventories');
        DB::table('inventories')->truncate();

        // \Log::info('inserting 0 qty sku');
        // \Log::info('inserting csv sku');
        $chunks = array_chunk($result, 500);
        foreach ($chunks as $chunk) {
            Inventory::insert($chunk);
        }
        // \Log::info('unsetting result');
        unset($result);
        unset($chunks);

        $import_file->status = 'completed';
        $import_file->save();

        $response = [
            'id' => $import_file->id,
            'records' => $import_file->records,
            'status' => $import_file->status,
            'polls' => [
                'total' => 1,
                'completed' => 1
            ],
        ];

        return Response::json($response);
    }

    public function getRecords($file_path = '', $take = 1, $skip = 0)
    {
        if (!$file_path) {
            return false;
        }
        // read the file
        $reader = Excel::selectSheetsByIndex(0)->load($file_path);
        // take x and skip y
        // $reader->limit(100,0);
        $reader = $reader->get();
        // return false if file is empty
        if (!$reader || $reader->count() < 1) {
            return false;
        }

        return $reader;
    }

    public function checkHeader($file_path = '', $fileExt)
    {
        $errors = [
            'item_name' => false,
            'qty_on_hand' => false,
            // 'is_active'     => false,
            'item' => false,
            'quantity_on_hand' => false
        ];
        // read the file
        $reader = Excel::load($file_path)->get();
        $firstRow = $reader->first();
        if (!$firstRow) {
            return $errors;
        }
        $headerRow = $firstRow->keys();

        if ($fileExt === 'csv') { // if fileType is xlsx
            foreach ($headerRow as $column) {
                if ($column === 'item_name') {
                    $errors['item_name'] = true;
                }
                if ($column === 'qty_on_hand') { // if fileType is csv, check Qty on Hand
                    $errors['qty_on_hand'] = true;
                }
                // if ($column === 'is_active') {
                // 	$errors['is_active'] = true;
                // }
            }
        } else { // if fileType is xlsx
            foreach ($headerRow as $column) {
                if ($column === 'item') {
                    $errors['item'] = true;
                }
                if ($column === 'quantity_on_hand') {
                    $errors['quantity_on_hand'] = true;
                }
                // if ($column === 'is_active') {
                // 	$errors['is_active'] = true;
                // }
            }
        }

        return $errors;
    }

    public function getRecordsCount($file_path = '')
    {
        if (!$file_path) {
            return 0;
        }
        // read the file
        $reader = Excel::selectSheetsByIndex(0)->load($file_path)->get();
        // return 0 if file is empty
        if (!$reader || $reader->count() < 1) {
            return 0;
        }
        return $reader->count();
    }

    protected function strposa($haystack, $needles = array(), $offset = 0)
    {
        foreach ($needles as $needle) {
            $res = stripos($haystack, $needle, $offset);
            if($res!==false){
                return false;
            }
        }
        return true;
    }
}
