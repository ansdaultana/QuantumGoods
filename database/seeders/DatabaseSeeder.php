<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\BanksSeeder;
use Database\Seeders\CategoriesSeeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // $this->call(BanksSeeder::class);
        // $this->call(CategoriesSeeder::class);

         \App\Models\User::factory()->create([
            'id'=>1,
             'name' => 'Ans Daultana',
             'email' => 'ansdaultana.ad5@gmail.com',
             'password'=>bcrypt('12121212'),
             'role'=>'vendor'
         ]);
          \App\Models\Vendor::factory()->create([
            'id'=>1,
            'company_name'=>'Quantum Goods',
            'address'=>'Model Town R block',
            'user_id'=>1,
            'phone_number'=>'0300578032',
            'details'=>'ansdaultana ansdaultana ansdaultana ansdaultana ansdaultana ansdaultanaansdaultana ansdaultana ansdaultanaansdaultana ansdaultana ansdaultana ansdaultana',
            'facebook_store_url'=>'https://github.com/ansdaultana',
            'instagram_store_url'=>'https://github.com/ansdaultana',
            'bank_name'=>'Habib Bank Limited',
            'bank_account_number'=>'12341232142142142'

          ]);
    }
}
