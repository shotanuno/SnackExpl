<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DateTime;
use App\Models\Snack;
use App\Models\Store;

class SnackStoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1;$i < 101; $i++){
            DB::table('snack_store')->insert([
                    'snack_id' => $i,
                    'store_id' => RANDOM(1,4),
                ]);
        }
        
       
    }
}
