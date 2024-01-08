@extends("layouts.admin")

@section("title" , "Countries")

@section("page_title" , "Countries")

@section("page_subtitle" , "System countries")

@push("page_actions")
    <a href="{{route("admin.countries.create")}}" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="New Country">
        <i class="icon-add"></i>
    </a>
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include("admin.countries.table")
                </div>
                <div class="card-footer">
                    {!! $countries->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
