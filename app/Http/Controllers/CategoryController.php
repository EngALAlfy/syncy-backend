<?php

namespace App\Http\Controllers;

use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Setting;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $perPage = optional(Setting::whereKey("per_page")->first())->value ?? 25;
        $categories = Category::query()->paginate($perPage);
        return view("admin.categories.index" , compact("categories"));
    }

    public function apiIndex()
    {
        $categories = Category::query()->whereNull("parent_id")->with("subCategories:id,name,parent_id,image")->withCount("posts")->get();
        return $this->sendJsonSuccess(CategoryResource::collection($categories));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::whereNull("parent_id")->pluck("name" , "id");
        return view("admin.categories.create" , compact("categories"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        $data = $request->validated();

        if(array_key_exists("image" , $data)){
            $data["image"] = upload_image($data["image"]);
        }

        Category::create($data);

        flash()->success(__('Categories') . ": " . __("created successfully"));

        return redirect()->route("admin.categories.index");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categories = Category::whereNull("parent_id")->pluck("name" , "id");
        return view("admin.categories.edit" , compact("category" , "categories"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        $data = $request->validated();

        if(array_key_exists("image" , $data)){
            $data["image"] = upload_image($data["image"]);
        }

        $category->update($data);

        flash()->success(__('Categories') . ": " . __("updated successfully"));

        return redirect()->route("admin.categories.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $category->delete();

        flash()->success(__('Categories') . ": " . __("deleted successfully"));

        return redirect()->route("admin.categories.index");
    }
}
