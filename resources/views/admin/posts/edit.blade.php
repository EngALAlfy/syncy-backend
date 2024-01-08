@extends("layouts.admin")

@section("title" , __('Posts'))

@section("page_title" , __("Edit Post"))

@section("page_subtitle" , __("Edit user post"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->modelForm($post , 'PUT')->acceptsFiles()->route("admin.posts.update" , $post)->open() !!}
                    @include("admin.posts.fields")
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
