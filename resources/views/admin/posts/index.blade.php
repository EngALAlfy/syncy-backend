@extends("layouts.admin")

@section("title" , "Posts")

@section("page_title" , "Posts")

@section("page_subtitle" , "Users posts")

@push("page_actions")
    <a href="{{route("admin.posts.create")}}" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="New Post">
        <i class="icon-add"></i>
    </a>
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include("admin.posts.table")
                </div>
                <div class="card-footer">
                    {!! $posts->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
