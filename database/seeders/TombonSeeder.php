<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\Tombon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class TombonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(storage_path('app/public/geography/tambons.json'));
        $objs = json_decode($json, true);

        foreach ($objs as $obj) {
            try {
                Tombon::updateOrcreate([
                    'code' => $obj['code'],
                    'district_id' => District::where('code', $obj['amphure_id'])->first()->id,
                ], [
                    'name' => $obj['name_th'],
                    'en' => $obj['name_en'],
                    'zipcode' => $obj['zip_code'],
                ]);
            } catch (\Exception $e) {
            }
        }
    }
}
