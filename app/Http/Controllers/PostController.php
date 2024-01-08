<?php

namespace App\Http\Controllers;

use App\Helpers\ErrorsCode;
use App\Http\Requests\DeletePostRequest;
use App\Http\Resources\FavoriteResource;
use App\Http\Resources\PostResource;
use App\Models\Category;
use App\Models\Country;
use App\Models\Favorite;
use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = optional(Setting::whereKey("per_page")->first())->value ?? 25;
        $posts = Post::query()->paginate($perPage);
        return view("admin.posts.index", compact("posts"));
    }

    /**
     * Display a listing of the resource.
     * Posts API
     * Record a view for app here
     * @params
     * category_id
     * country_id
     * state_id
     * user_id
     */
    public function apiIndex(Request $request)
    {
        $posts = Post::query()
            ->withAggregate("category" , "name")
            ->withAggregate("state" , "name")
            ->withAggregate("country" , "name")
            ->with("owner:id,name,email,image,country_code,phone_number")
            ->with("images");

        if($request->has("category_id")){
            $posts = $posts->whereCategoryId($request->get("category_id"));
        }

        if($request->has("country_id")){
            $posts = $posts->whereStateId($request->get("country_id"));
        }

        if($request->has("state_id")){
            $posts = $posts->whereStateId($request->get("state_id"));
        }

        if($request->has("user_id")){
            $posts = $posts->whereOwnerId($request->get("user_id"));
        }

        $posts = $posts->get();

        return $this->sendJsonSuccess(PostResource::collection($posts));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $categories = Category::query()->whereNull("parent_id")
            ->has("subCategories")
            ->with("subCategories")->get()->mapWithKeys(function ($category) {
                return [
                    $category->name => $category->subCategories->pluck("name", "id"),
                ];
            })->toArray();

        $states = Country::query()
            ->has("states")
            ->with("states")->get()->mapWithKeys(function ($country) {
                return [
                    $country->name => $country->states->pluck("name", "id"),
                ];
            })->toArray();

        $users = User::query()/*->role("admin")*/->pluck("name", "id");

        return view("admin.posts.create", compact("categories", "users", "states"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $data = $request->validated();

        if (array_key_exists("image", $data)) {
            $data["image"] = upload_image($data["image"]);
        }
        
        $country_id = State::find($data['state_id'])->country_id;
        $data["country_id"] = $country_id;

        Post::create($data);

        flash()->success(__('Posts') . ": " . __("created successfully"));

        return redirect()->route("admin.posts.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view("admin.posts.show", compact("post"));
    }

    /**
     * Display the specified resource.
     */
    public function apiShow(Post $post)
    {
        $post->loadAggregate("category" , "name")
            ->loadAggregate("state" , "name")
            ->loadAggregate("country" , "name")
            ->load("owner:id,name,email,image,country_code,phone_number");
        return $this->sendJsonSuccess(new PostResource($post));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        $categories = Category::query()->whereNull("parent_id")
            ->has("subCategories")
            ->with("subCategories")->get()->mapWithKeys(function ($category) {
                return [
                    $category->name => $category->subCategories->pluck("name", "id"),
                ];
            })->toArray();

        $states = Country::query()
            ->has("states")
            ->with("states")->get()->mapWithKeys(function ($country) {
                return [
                    $country->name => $country->states->pluck("name", "id"),
                ];
            })->toArray();

        $users = User::query()/*->role("admin")*/->pluck("name", "id");


        return view("admin.posts.edit", compact("categories", "users", "states" , "post"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $data = $request->validated();

        if (array_key_exists("image", $data)) {
            $data["image"] = upload_image($data["image"]);
        }

        $post->update($data);

        flash()->success(__('Posts') . ": " . __("updated successfully"));

        return redirect()->route("admin.posts.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();

        flash()->success(__('Posts') . ": " . __("deleted successfully"));

        return redirect()->route("admin.posts.index");
    }

    public function apiFavorites(){
        $ids = Favorite::where("user_id" , auth()->id())->pluck("post_id");
        $favorites = Post::whereIn("id" , $ids)->get();
        return $this->sendJsonSuccess(PostResource::collection($favorites));
    }
    public function apiFavoritesAdd(Post $post){
        if($post->is_favorite){
            return $this->sendJsonError( "post is already favorite" ,ErrorsCode::ALREADY_EXIST_ERROR_CODE);
        }

        Favorite::create([
            "post_id" => $post->id,
            "user_id" => auth()->id(),
        ]);

        return $this->sendJsonSuccess();
    }
    public function apiFavoritesRemove(Post $post){
        if($post->is_favorite === false){
            return $this->sendJsonError( "post is already not favorite" ,ErrorsCode::NOT_EXIST_ERROR_CODE);
        }

        Favorite::where([
            "post_id" => $post->id,
            "user_id" => auth()->id(),
        ])->delete();

        return $this->sendJsonSuccess();
    }
    public function apiOwned(){
        $posts = Post::whereOwnerId(auth()->id())->latest()->get();
        return $this->sendJsonSuccess(PostResource::collection($posts));
    }
    public function apiOwnedUpdate(Post $post , Request $request){

    }
    public function apiOwnedDelete(Post $post , DeletePostRequest $request){
        $post->delete();
        return $this->sendJsonSuccess();
    }
    public function apiOwnedFeaturedStart(Post $post , Request $request){
        $post->startFeatured();
        return $this->sendJsonSuccess();
    }
    public function apiOwnedFeaturedStop(Post $post , Request $request){
        $post->stopFeatured();
        return $this->sendJsonSuccess();
    }

    function apiSliders()
    {
        $posts = Post::latest()/*->whereIsFeatured(true)*/
        ->whereNotNull("image")
        ->withAggregate("category", "name")
            ->withAggregate("state", "name")
            ->withAggregate("country", "name")
            ->with("owner:id,name,email,image,country_code,phone_number")
            ->limit(10)->get();

        return $this->sendJsonSuccess(PostResource::collection($posts));
    }
}
