@extends("layouts.admin")

@section("title" , __('Countries'))

@section("page_title" , __("Edit Country"))

@section("page_subtitle" , __("Edit user country"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->modelForm($country ,'PUT')->acceptsFiles()->route("admin.countries.update" , $country)->open() !!}
                    @include("admin.countries.fields")
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
