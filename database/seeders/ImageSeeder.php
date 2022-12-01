<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;
use DateTime;

class ImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $id_path = array(
            'snack2_fhkvvs' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669915997/snack2_fhkvvs.jpg',
            'snack1_w3jabn' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669915997/snack1_w3jabn.jpg',
            'snack5_p8by4v' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669915997/snack5_p8by4v.jpg',
            'snack3_vrqgu6' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669915997/snack3_vrqgu6.jpg',
            'snack4_nr2q33' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669915997/snack4_nr2q33.jpg',
            'snack12_i2ofua' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919519/snack12_i2ofua.jpg',
            'snack6_xtzmmk' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919519/snack6_xtzmmk.jpg',
            'snack13_w03zz9' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919518/snack13_w03zz9.jpg',
            'snack8_wzynxh' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919518/snack8_wzynxh.jpg',
            'snack9_wad0gz' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919518/snack9_wad0gz.jpg',
            'snack10_dlzgh4' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919518/snack10_dlzgh4.jpg',
            'snack11_maparo' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919518/snack11_maparo.jpg',
            'snack7_du5aei' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669919518/snack7_du5aei.jpg',
            );
        
        DB::table('images')->insert([
                'image_path' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669915616/%E3%82%BB%E3%83%96%E3%83%B3%E3%82%A4%E3%83%AC%E3%83%96%E3%83%B3_nhfxiz.png',
                'public_id' => 'セブンイレブン_nhfxiz',
                'imageable_id' => '1',
                'imageable_type' => 'App\Models\Store',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        
        DB::table('images')->insert([
                'image_path' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669550322/%E3%83%95%E3%82%A1%E3%83%9F%E3%83%AA%E3%83%BC%E3%83%9E%E3%83%BC%E3%83%88_zdxsht.png',
                'public_id' => 'ファミリーマート_zdxsht',
                'imageable_id' => '2',
                'imageable_type' => 'App\Models\Store',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        
        DB::table('images')->insert([
                'image_path' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669550322/%E3%83%AD%E3%83%BC%E3%82%BD%E3%83%B3_kin9ag.png',
                'public_id' => 'ローソン_kin9ag',
                'imageable_id' => '3',
                'imageable_type' => 'App\Models\Store',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        
        DB::table('images')->insert([
                'image_path' => 'https://res.cloudinary.com/dcfv11t63/image/upload/v1669550322/%E3%81%BE%E3%81%84%E3%81%B0%E3%81%99%E3%81%91%E3%81%A3%E3%81%A8_o71rbm.png',
                'public_id' => 'まいばすけっと_o71rbm',
                'imageable_id' => '4',
                'imageable_type' => 'App\Models\Store',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        for ($i = 5; $i < 105; $i++){
            $image_path = $id_path[array_rand($id_path, 1)];
            DB::table('images')->insert([
                'image_path' => $image_path,
                'public_id' => array_search($image_path, $id_path),
                'imageable_id' => $i,
                'imageable_type' => 'App\Models\Snack',
                'created_at' => new DateTime(),
                'updated_at' => new DateTime(),
            ]);
        }
    }
}
