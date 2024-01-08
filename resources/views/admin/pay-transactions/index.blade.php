@extends("layouts.admin")

@section("title" , "Pay Transactions")

@section("page_title" , "Pay Transactions")

@section("page_subtitle" , "Users pay transactions")

@push("page_actions")
    <a href="{{route("admin.pay-transactions.create")}}" class="btn btn-primary float-right" data-toggle="tooltip" data-placement="left" title="New Pay Transaction">
        <i class="icon-add"></i>
    </a>
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    @include("admin.pay-transactions.table")
                </div>
                <div class="card-footer">
                    {!! $payTransactions->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
