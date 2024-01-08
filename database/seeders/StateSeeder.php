<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class StateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('states')->truncate();

        $dummyData = [
            [
                'id' => 1,
                'country_id' => 2,
                'name' => 'Cairo',

            ],
            [
                'id' => 2,
                'country_id' => 2,
                'name' => 'Alex',

            ],
            [
                'id' => 3,
                'country_id' => 2,
                'name' => 'Aswan',

            ],
        ];

        foreach ($dummyData as $data) {
            State::create($data);
        }

        Schema::enableForeignKeyConstraints();
    }
}
