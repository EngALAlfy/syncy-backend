@extends("layouts.admin")

@section("title" , __('Point Transactions'))

@section("page_title" , __("Create Point Transaction"))

@section("page_subtitle" , __("Create new user point transactions"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->form()->acceptsFiles()->route("admin.point-transactions.store")->open() !!}
                    @include("admin.point-transactions.fields")
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
