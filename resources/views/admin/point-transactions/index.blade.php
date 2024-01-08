@extends("layouts.admin")

@section("title" , "Point Transactions")

@section("page_title" , "Point Transactions")

@section("page_subtitle" , "Users point transactions")

@push("page_actions")
    <a href="{{route("admin.point-transactions.create")}}" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="New Point Transaction">
        <i class="icon-add"></i>
    </a>
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include("admin.point-transactions.table")
                </div>
                <div class="card-footer">
                    {!! $pointTransactions->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
