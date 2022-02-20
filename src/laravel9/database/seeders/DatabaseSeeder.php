<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ArticlesSeeder::class);
         User::factory(10)->create();
        $egypt = Country::create(['name' => 'Egypt']);
        $egypt->cities()->createMany([
            ['name' => 'Cairo'],
            ['name' => 'Alex'],
            ['name' => 'Giza'],
        ]);
        $france = Country::create(['name' => 'France']);
        $france->cities()->createMany([
            ['name' => 'Paris'],
            ['name' => 'Nis'],
        ]);
        $saudi_arabia = Country::create(['name' => 'Saudi Arabia']);
        $saudi_arabia->cities()->createMany([
            ['name' => 'Mekkah'],
            ['name' => 'Riyadh'],
        ]);
    }
}
