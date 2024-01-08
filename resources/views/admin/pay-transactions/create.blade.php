@extends("layouts.admin")

@section("title" , __('Pay Transactions'))

@section("page_title" , __("Create Pay Transaction"))

@section("page_subtitle" , __("Create new user pay transactions"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->form()->acceptsFiles()->route("admin.pay-transactions.store")->open() !!}
                    @include("admin.pay-transactions.fields")
                    {!! html()->form()->close() !!}
                </div>
            </div>
        </div>
    </div>

@endsection

@push("scripts")
    <script>
        $(function () {

        })
    </script>
@endpush
