<?php

namespace Database\Seeders;

use App\Models\Sheet;
use Illuminate\Database\Seeder;

class SheetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sheets = [
            [
                'name' => 'Test sheet 1',
                'phone' => '+1234567890',
                'description' => 'Test sheet 1 description',
                'url' => 'https://docs.google.com/spreadsheets/d/1aksJtQE04ICdu_eCO0bqb_ULYNpGRz4-HZShKtc1_MQ'
            ],
            [
                'name' => 'Test sheet 2',
                'phone' => '+1234567890',
                'description' => 'Test sheet 2 description',
                'url' => 'https://docs.google.com/spreadsheets/d/14Z3zNHrBsPAUKrZQpK24L7TRduiLjOyOzDl5GSxtNco'
            ],
            [
                'name' => 'Test sheet 3',
                'phone' => '+1234567890',
                'description' => 'Test sheet 3 description',
                'url' => 'https://docs.google.com/spreadsheets/d/1RwRxnBS19idA1qS8zac-NsCInH35DIaN0CXUXDAR-Bk'
            ]
        ];
        Sheet::insert($sheets);
    }
}
