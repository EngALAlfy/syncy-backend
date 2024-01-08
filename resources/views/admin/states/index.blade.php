@extends("layouts.admin")

@section("title" , "States")

@section("page_title" , "States")

@section("page_subtitle" , "Users states")

@push("page_actions")
    <a href="{{route("admin.states.create")}}" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="New State">
        <i class="icon-add"></i>
    </a>
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include("admin.states.table")
                </div>
                <div class="card-footer">
                    {!! $states->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
