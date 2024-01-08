<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Country;
use App\Models\Post;
use App\Models\Setting;
use App\Models\State;
use App\Models\User;
use Carbon\Carbon;

class HomeController extends Controller
{
    function index()
    {
        $posts_count = Post::count();
        $today_posts_count = Post::query()->whereDate("created_at", Carbon::today())->count();
        $this_month_posts_count = Post::query()->whereBetween("created_at", [Carbon::today()->startOfMonth(), Carbon::now()])->count();

        $countries_count = Country::count();
        $states_count = State::count();

        $users_count = User::count();
        $today_users_count = User::query()->whereDate("created_at", Carbon::today())->count();
        $this_month_users_count = User::query()->whereBetween("created_at", [Carbon::today()->startOfMonth(), Carbon::now()])->count();

        $categories_count = Category::query()->whereNull("parent_id")->count();
        $sub_categories_count = Category::query()->whereNotNull("parent_id")->count();

        $app_views = views(Setting::firstOrCreate([
            "key" => "app_views",
        ]))
            ->unique()
            ->count();

        return view("admin.home.index", compact(
            "app_views",
            "users_count",
            "this_month_users_count",
            "this_month_posts_count",
            "today_users_count",
            "today_posts_count",
            "states_count",
            "categories_count",
            "sub_categories_count",
            "countries_count",
            "posts_count",
        ));
    }


}
