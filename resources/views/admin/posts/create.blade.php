@extends("layouts.admin")

@section("title" , __('Posts'))

@section("page_title" , __("Create Post"))

@section("page_subtitle" , __("Create new user post"))

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    {!! html()->form()->acceptsFiles()->route("admin.posts.store")->open() !!}
                    @include("admin.posts.fields")
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
