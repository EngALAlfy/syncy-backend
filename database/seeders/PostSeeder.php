<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Country;
use App\Models\Post;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('posts')->truncate();


        for ($i=1;$i<10;$i++) {
            $data = [
                "name" => "Post $i",
                "short_desc" => "hort desc of post $i",
                "price" => 10*$i,
                "desc" => "Long desc of post $i",
                "owner_id" => User::inRandomOrder()->first()->id,
                "custom_email" => "email$i@mail.com",
                "custom_phone" => "+20105955955",
                "country_id" => 2,
                "state_id" => State::inRandomOrder()->first()->id,
                "category_id" => Category::inRandomOrder()->first()->id,
                "is_featured" => $i%2==0,
            ];
            Post::create($data);
        }

        Schema::enableForeignKeyConstraints();
    }
}
