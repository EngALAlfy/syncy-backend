@extends("layouts.admin")

@section("title" , "Users")

@section("page_title" , "Create User")

@section("page_subtitle" , "Create new website user")

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{route("admin.users.store")}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("post")
                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" name="name" class="form-control
                             @error("name") is-invalid @enderror"
                                   id="name" placeholder="Enter user name">
                            @error("name")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" name="email" class="form-control
                             @error("email") is-invalid @enderror"
                                   id="email" placeholder="Enter user email">
                            @error("email")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control
                             @error("password") is-invalid @enderror"
                                   id="password" placeholder="Enter user password">
                            @error("password")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>


                        <div class="form-group">
                            <label for="role">{{__('Role')}}</label>
                            <select name="role" class="form-control
                             @error("role") is-invalid @enderror"
                                   id="role">
                                <option>Select user role</option>
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            @error("role")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>



                        <div class="form-group">
                            @include("admin.includes.image-uploader")
                        </div>

                        <button type="submit" class="btn btn-primary">Save user</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection

