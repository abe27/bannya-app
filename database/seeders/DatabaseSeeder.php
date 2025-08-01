<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call([
            FeatureDataSeeder::class,
            GeographySeeder::class,
            ProvinceSeeder::class,
            DistrictSeeder::class,
            TombonSeeder::class,
            SocialListSeeder::class,
            QrCodeLineSeeder::class,
            CategorySeeder::class,
            ProductGroupSeeder::class,
            RateOptionSeeder::class,
            UnitSeeder::class,
            CouponSeeder::class,
            OrderStatusSeeder::class,
        ]);
    }
}
