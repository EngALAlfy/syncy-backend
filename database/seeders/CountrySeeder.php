<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CountrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('countries')->truncate();

        $dummyData = [
            [
                'id' => 1,
                'code' => 13,
                'name' => 'USA',

            ],
            [
                'id' => 2,
                'code' => 20,
                'name' => 'Egypt',

            ],
            [
                'id' => 3,
                'code' => 32,
                'name' => 'Ireland',

            ],
        ];

        foreach ($dummyData as $data) {
            Country::create($data);
        }

        Schema::enableForeignKeyConstraints();
    }
}
