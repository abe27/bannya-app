<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Geography;

class GeographySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get(storage_path('app/public/geography/geographies.json'));
        $geographies = json_decode($json, true);

        foreach ($geographies as $geography) {
            Geography::updateOrcreate([
                'code' => $geography['code']
            ], [
                'code' => $geography['code'],
                'name' => $geography['name'],
                'description' => $geography['description'],
                'is_active' => $geography['is_active'],
            ]);
        }
    }
}
