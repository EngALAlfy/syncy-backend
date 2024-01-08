@extends("layouts.admin")

@section("title", "Posts")

@section("page_title", "Post Details")

@section("content")
    <div class="row gutters">
        <div class="col-12">
            @include("admin.posts.show_fields")
        </div>
        <div class="col-12">
            @livewire("post-images" , ["postId" => $post->id])
        </div>
    </div>
@endsection

@push("scripts") @livewireScripts @endpush
@push("styles") @livewireStyles @endpush
