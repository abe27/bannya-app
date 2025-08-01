<?php

namespace Database\Seeders;

use App\Models\Geography;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Province;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(storage_path('app/public/geography/provinces.json'));
        $provinces = json_decode($json, true);

        foreach ($provinces as $province) {
            Province::updateOrcreate([
                'code' => $province['code'],
                'geography_id' => Geography::where('code', $province['geography_id'])->first()->id,
            ], [
                'name' => $province['name_th'],
                'en' => $province['name_en'],
            ]);
        }
    }
}
