@extends("layouts.admin")

@section("title" , __('States'))

@section("page_title" , __("Edit State"))

@section("page_subtitle" , __("Edit user state"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->modelForm($state, 'PUT')->acceptsFiles()->route("admin.states.update" , $state)->open() !!}
                    @include("admin.states.fields")
                    {!! html()->closeModelForm() !!}
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
