<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $json = File::get(public_path('storage/unit/units.json'));
        // $units = json_decode($json, true);

        // foreach ($units as $unit) {
        //     Unit::create([
        //         'id' => $unit['id'],
        //         'company_id' => $unit['company_id'],
        //         'branch_id' => $unit['branch_id'],
        //         'name' => $unit['name'],
        //         'description' => $unit['description'],
        //         'logo' => $unit['logo'],
        //         'is_active' => $unit['is_active'],
        //     ]);
        // }
    }
}
