@extends("layouts.admin")

@section("title" , "Users")

@section("page_title" , "Edit User") <!-- Update page title -->

@section("page_subtitle" , "Edit existing website user") <!-- Update page subtitle -->

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route("admin.users.update", $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method("put") <!-- Change this line to use the PUT method -->

                        <div class="form-group">
                            <label for="name">{{__('Name')}}</label>
                            <input type="text" name="name" class="form-control @error("name") is-invalid @enderror" id="name" value="{{ $user->name }}"> <!-- Populate with existing value -->
                            @error("name")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="email">{{__('Email')}}</label>
                            <input type="email" name="email" class="form-control @error("email") is-invalid @enderror" id="email" value="{{ $user->email }}"> <!-- Populate with existing value -->
                            @error("email")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" class="form-control @error("password") is-invalid @enderror" id="password" placeholder="Enter new password">
                            @error("password")
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="role">{{__('Role')}}</label>
                            <select name="role" class="form-control @error("role") is-invalid @enderror" id="role">
                                <option value="user" {{ $user->role == 'user' ? 'selected' : '' }}>User</option> <!-- Set selected option -->
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>Admin</option> <!-- Set selected option -->
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

                        <button type="submit" class="btn btn-primary">Update user</button> <!-- Update button text -->
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
