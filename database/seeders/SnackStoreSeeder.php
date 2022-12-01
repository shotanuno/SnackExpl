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
                    'store_id' => rand(1,4),
                ]);
        }
        
        for ($i = 0;$i < 50; $i++){
            $set_snack_id = Snack::select('id')->orderByRaw('rand()')->first()->id;
            $set_store_id = Store::select('id')->orderByRaw('rand()')->first()->id;
            
            $snack_store = DB::table('snack_store')->where([
                    ['snack_id', '=' , $set_snack_id],
                    ['store_id', '=' , $set_store_id],
            ])->get();
            
            if($snack_store->isEmpty()){
                DB::table('snack_store')->insert([
                    'snack_id' => $set_snack_id,
                    'store_id' => $set_store_id,
                ]);
            } else {
                $i--;
            }
        }
    }
}
