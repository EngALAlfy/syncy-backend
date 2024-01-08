@extends("layouts.admin")

@section("title" , __('Categories'))

@section("page_title" , __("Edit Category"))

@section("page_subtitle" , __("Edit user category"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->modelForm($category ,'PUT')->acceptsFiles()->route("admin.categories.update" , $category)->open() !!}
                    @include("admin.categories.fields")
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
