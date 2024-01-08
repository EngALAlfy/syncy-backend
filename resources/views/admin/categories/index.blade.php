@extends("layouts.admin")

@section("title" , "Categories")

@section("page_title" , "Categories")

@section("page_subtitle" , "Posts categories")

@push("page_actions")
    <a href="{{route("admin.categories.create")}}" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="New Category">
        <i class="icon-add"></i>
    </a>
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include("admin.categories.table")
                </div>
                <div class="card-footer">
                    {!! $categories->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
