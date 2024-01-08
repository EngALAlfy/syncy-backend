@extends("layouts.admin")

@section("title" , __('Categories'))

@section("page_title" , __("Create Category"))

@section("page_subtitle" , __("Create new user category"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->form()->acceptsFiles()->route("admin.categories.store")->open() !!}
                    @include("admin.categories.fields")
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
