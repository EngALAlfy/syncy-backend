@extends("layouts.admin")

@section("title" , __('Countries'))

@section("page_title" , __("Create Country"))

@section("page_subtitle" , __("Create new user country"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->form()->acceptsFiles()->route("admin.countries.store")->open() !!}
                    @include("admin.countries.fields")
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
