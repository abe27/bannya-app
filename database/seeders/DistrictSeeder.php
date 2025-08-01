<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(storage_path('app/public/geography/amphures.json'));
        $objs = json_decode($json, true);

        foreach ($objs as $obj) {
            District::updateOrcreate([
                'code' => $obj['code'],
                'province_id' => Province::where('code', $obj['province_id'])->first()->id,
            ], [
                'name' => $obj['name_th'],
                'en' => $obj['name_en'],
            ]);
        }
    }
}
