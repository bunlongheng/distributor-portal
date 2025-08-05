<?php

class SpecialProductSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Eloquent::unguard();
        $row = 1;
        ini_set('auto_detect_line_endings', true);
        $handle = fopen(app_path('database/seeds/ELISA_Kits_DP.csv'), 'r');
        $this->importInDb($handle, $row);
        $handle = fopen(app_path('database/seeds/IHC_Kits_DP.csv'), 'r');
        $this->importInDb($handle, $row);
        ini_set('auto_detect_line_endings', false);
    }

    private function importInDb($handle, int $row)
    {
        while (($data = fgetcsv($handle)) !== false) {
            if ($row == 1) {
                $row++;
                continue;
            }
            try {
                SpecialProducts::insert(['sku' => $data[0], 'name' => $data[1], 'price' => '', 'conjugation' => '']);
            } catch (\Exception $e) {
            }
        }
    }

}
