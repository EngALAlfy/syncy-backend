@extends("layouts.admin")

@section("title" , __("Home"))

@section("page_title" , __("Home"))

@section("page_subtitle" , __("Website Analytics"))

@push("page_actions")
    <a href="{{route("admin.settings.index")}}" class="btn btn-primary float-right" data-toggle="tooltip"
       data-placement="left" title="{{__('Settings')}}">
        <i class="icon-settings"></i>
    </a>
@endpush

@section("content")

    <div class="row gutters">

        <div class="col-xl-2 col-lg-2 col-md-4 col-sm-4">
            <a class="block-140 block-300 center-text pt-3">
                <div class="icon info mt-5">
                    <i class="icon-eye"></i>
                </div>
                <div class="user-profile">
                    <h5 class="profile-name">{{$app_views}}</h5>
                    <h6 class="profile-designation">{{__('App views')}}</h6>
                    <p class="profile-location">{{__('All time')}}</p>
                </div>
            </a>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col">
            <a href="{{route("admin.posts.index")}}" class="block-140">
                <div class="icon violet">
                    <i class="icon-list-numbered"></i>
                </div>
                <h5>{{$posts_count}}</h5>
                <p>{{__('All posts')}}</p>
            </a>
            <a href="{{route("admin.users.index")}}" class="block-140">
                <div class="icon pink">
                    <i class="fa fa-user-check"></i>
                </div>
                <h5>{{$users_count}}</h5>
                <p>{{__('All users')}}</p>
            </a>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col">
            <a href="{{route("admin.posts.index")}}" class="block-140">
                <div class="icon success">
                    <i class="fa fa-list-squares"></i>
                </div>
                <h5>{{$today_posts_count}}</h5>
                <p>{{__('Today posts')}}</p>
            </a>
            <a href="{{route("admin.posts.index")}}" class="block-140">
                <div class="icon warning">
                    <i class="fa fa-list-check"></i>
                </div>
                <h5>{{$this_month_posts_count}}</h5>
                <p>{{__('This month posts')}}</p>
            </a>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col">
            <a href="{{route("admin.users.index")}}" class="block-140">
                <div class="icon info">
                    <i class="icon-users"></i>
                </div>
                <h5>{{$today_users_count}}</h5>
                <p>{{__('Today users')}}</p>
            </a>
            <a href="{{route("admin.users.index")}}" class="block-140">
                <div class="icon danger">
                    <i class="icon-users2"></i>
                </div>
                <h5>{{$this_month_users_count}}</h5>
                <p>{{__('This month users')}}</p>
            </a>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col">
            <a href="{{route("admin.countries.index")}}" class="block-140">
                <div class="icon pink">
                    <i class="icon-flag3"></i>
                </div>
                <h5>{{$countries_count}}</h5>
                <p>{{__('Countries')}}</p>
            </a>
            <a href="{{route("admin.states.index")}}" class="block-140">
                <div class="icon violet">
                    <i class="fa fa-map-location-dot"></i>
                </div>
                <h5>{{$states_count}}</h5>
                <p>{{__('States')}}</p>
            </a>
        </div>
        <div class="col-xl-2 col-lg-2 col-md-3 col-sm-3 col">
            <a href="{{route("admin.categories.index")}}" class="block-140">
                <div class="icon danger">
                    <i class="fa fa-code-branch"></i>
                </div>
                <h5>{{$categories_count}}</h5>
                <p>{{__('Categories')}}</p>
            </a>
            <a href="{{route("admin.categories.index")}}" class="block-140">
                <div class="icon success">
                    <i class="icon-flow-branch"></i>
                </div>
                <h5>{{$sub_categories_count}}</h5>
                <p>{{__('Sub Categories')}}</p>
            </a>
        </div>
    </div>


{{--    <div class="row gutters">--}}
{{--        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{__('Contact Messages')}}</div>--}}
{{--                <div class="card-body">--}}
{{--                    <ul class="stats">--}}
{{--                        @forelse($contactMessages as $message)--}}
{{--                            <li>--}}
{{--                                <span class="icon"><i class="icon-contact_mail"></i></span>--}}
{{--                                {{$message->name}}: {{$message->subject}}--}}
{{--                            </li>--}}
{{--                        @empty--}}
{{--                            <div class="alert alert-success text-center">{{__('No Data')}}</div>--}}
{{--                        @endforelse--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{__('Freight Requests')}}</div>--}}
{{--                <div class="card-body">--}}
{{--                    <ul class="stats">--}}
{{--                        @forelse($freightRequests as $request)--}}
{{--                            <li>--}}
{{--                                <span class="icon"><i class="icon-fire"></i></span>--}}
{{--                                {{$request->name}}: {{$request->phone}}--}}
{{--                            </li>--}}
{{--                        @empty--}}
{{--                            <div class="alert alert-success text-center">{{__('No Data')}}</div>--}}
{{--                        @endforelse--}}
{{--                    </ul>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@endsection
