<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categories')->truncate();

        $dummyData = [
            [
                'id' => 1,
                'name' => 'Category 1',
                'short_desc' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',

            ],
            [
                'id' => 2,
                'name' => 'Category 2',
                'short_desc' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque accumsan orci sit amet mauris vulputate.',

            ],
            [
                'id' => 3,
                'name' => 'Category 3',
                'short_desc' => 'Vestibulum bibendum arcu non vestibulum tincidunt. Vestibulum in libero sapien.',

            ],
            [
                'id' => 4,
                'name' => 'Category 4',
                'short_desc' => 'Donec sagittis odio at elementum malesuada. Sed eu odio vitae neque auctor auctor.',

            ],
            [
                'id' => 5,
                'name' => 'Category 5',
                'short_desc' => 'Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.',

            ],
            [
                'id' => 6,
                'name' => 'Category 6',
                'short_desc' => 'Fusce a nulla finibus, sagittis dolor et, vehicula libero. Vivamus vehicula pharetra ante, vel malesuada ex interdum ut.',

            ],
            [
                'id' => 7,
                'name' => 'Category 7',
                'short_desc' => 'Mauris laoreet nibh non sapien ultrices, sed laoreet nulla tristique. Ut vel mi nec orci aliquet lacinia ut a nisl.',

            ],
            [
                'id' => 8,
                'parent_id' => 1,
                'name' => 'Category 8',
                'short_desc' => 'Etiam et nisi sit amet odio accumsan cursus eu a felis. Suspendisse ac rhoncus nisl. Suspendisse potenti.',

            ],
            [
                'id' => 9,
                'parent_id' => 1,
                'name' => 'Category 9',
                'short_desc' => 'Cras venenatis mauris sit amet imperdiet gravida. Nunc vitae malesuada urna, in suscipit turpis. Nullam porttitor malesuada diam, eget tristique odio vulputate in.',

            ],
            [
                'id' => 10,
                'parent_id' => 2,
                'name' => 'Category 10',
                'short_desc' => 'Sed at justo ut metus bibendum auctor. Sed tincidunt venenatis ex, ac pellentesque dolor vestibulum id. Phasellus vel magna vitae lacus posuere facilisis et nec urna.',

            ]
        ];

        foreach ($dummyData as $data) {
            Category::create($data);
        }

        Schema::enableForeignKeyConstraints();

    }
}
