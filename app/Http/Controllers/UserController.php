<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Activitylog\Models\Activity;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(25);
        return view("admin.users.index" , compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.users.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        if (isset($data["image"])) {
            $data["image"] = upload_image($data["image"]);
        }

        if (isset($data["password"])) {
            $data["password"] = Hash::make($data["password"]);
        }

        User::create($data);

        flash()->success(__('Users') . ": " . __("created successfully"));
        return redirect()->route("admin.users.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        $activityLogs = Activity::where("causer_id" , $user->id)->latest()->paginate(25);
        return view("admin.users.show" , compact("user" , "activityLogs"));
    }

    public function profile()
    {
        $user = auth()->user();
        $activityLogs = Activity::where("causer_id" , $user->id)->latest()->paginate(25);
        return view("admin.users.profile" , compact("user" , "activityLogs"));
    }

    public function editProfile()
    {
        $user = auth()->user();
        return view("admin.users.edit" , compact("user"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view("admin.users.edit" , compact("user"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user)
    {
        $data = $request->validated();
        if (isset($data["image"])) {
            $data["image"] = upload_image($data["image"]);
        }

        if (isset($data["password"])) {
            $data["password"] = Hash::make($data["password"]);
        }else{
            unset($data["password"]);
        }

        $user->update($data);
        flash()->success(__('Users') . ": " . __("updated successfully"));
        return redirect()->route("admin.users.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        flash()->success(__('Users') . ": " . __("deleted successfully"));
        return redirect()->route("admin.users.index");
    }

    public function apiProfile(){
        $user = Auth::user();
        return new UserResource($user);
    }
    public function apiUpdateProfile(Request $request){

    }
    public function apiUpdateProfilePhoto(Request $request){

    }
    public function apiDeleteAccount(){
        $user = Auth::user();

        $user->delete();
        return $this->sendJsonSuccess();
    }
}
