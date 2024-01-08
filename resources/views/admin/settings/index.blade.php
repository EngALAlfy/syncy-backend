@extends("layouts.admin")

@section("title" , "Settings")

@section("page_title" , "Settings")

@section("page_subtitle" , "Website Settings")

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3>{{__('Actions')}}</h3>
                </div>
                <div class="card-body">
                    <div class="row justify-content-center">
                        <div class="col-8 my-2">
                            <a class="btn btn-block btn-danger"
                               href="{{url("/error-log")}}"><i
                                    class="icon-error mr-2"></i> {{__('Error log')}}</a>
                        </div>
                        <div class="col-8"><a class="btn  btn-block btn-warning"
                                              href="{{route("admin.settings.activity-log")}}"><i
                                    class="icon-pen2 mr-2"></i> {{__('Activity log')}}</a>
                        </div>
                        <div class="col-8 my-2"><a class="btn  btn-block btn-success"
                                              href="{{route("admin.settings.clear-cache")}}"><i
                                    class="icon-cached mr-2"></i> {{__('Clear cache')}}</a>
                        </div>
                        <div class="col-8 mb-2"><a class="btn  btn-block btn-info" href="{{route("admin.settings.backup")}}"><i
                                    class="icon-database mr-2"></i> {{__('Backup')}}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
