@extends("layouts.admin")

@section("title" , __('States'))

@section("page_title" , __("Create State"))

@section("page_subtitle" , __("Create new user state"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->form()->acceptsFiles()->route("admin.states.store")->open() !!}
                    @include("admin.states.fields")
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
