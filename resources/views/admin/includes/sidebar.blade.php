<aside class="app-side fixed" id="app-side">
    <!-- BEGIN .side-content -->
    <div class="side-content ">
        <!-- BEGIN .user-profile -->
        <div class="user-profile">
            <img src="{{asset("assets/admin/img/user.png")}}" class="profile-thumb" alt="{{auth()->user()->name}}">
            <h6 class="profile-name">{{auth()->user()->name}}</h6>
        </div>
        <!-- END .user-profile -->
        <!-- BEGIN .side-nav -->
        <div class="sidebarNavScroll">
            <nav class="side-nav">
                <!-- BEGIN: side-nav-content -->
                <ul class="unifyMenu" id="unifyMenu">

                    <li @class(["active selected" => Route::currentRouteName() == "admin.home"])>
                        <a href="{{route("admin.home")}}">
                            <span class="has-icon">
                                <i class="icon-home"></i>
                            </span>
                            <span class="nav-title">{{__('Home')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*posts*")])>
                        <a href="{{route("admin.posts.index")}}">
                            <span class="has-icon">
                                <i class="icon-list-numbered"></i>
                            </span>
                            <span class="nav-title">{{__('Posts')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*countries*")])>
                        <a href="{{route("admin.countries.index")}}">
                            <span class="has-icon">
                                <i class="fa fa-flag"></i>
                            </span>
                            <span class="nav-title">{{__('Countries')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*states*")])>
                        <a href="{{route("admin.states.index")}}">
                            <span class="has-icon">
                                <i class="fa fa-map-marker-alt"></i>
                            </span>
                            <span class="nav-title">{{__('States')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*categories*")])>
                        <a href="{{route("admin.categories.index")}}">
                            <span class="has-icon">
                                <i class="icon-flow-branch"></i>
                            </span>
                            <span class="nav-title">{{__('Categories')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*point-transactions*")])>
                        <a href="{{route("admin.point-transactions.index")}}">
                            <span class="has-icon">
                                <i class="fa fa-gem"></i>
                            </span>
                            <span class="nav-title">{{__('Point transactions')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*pay-transactions*")])>
                        <a href="{{route("admin.pay-transactions.index")}}">
                            <span class="has-icon">
                                <i class="fa fa-dollar"></i>
                            </span>
                            <span class="nav-title">{{__('Pay transactions')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*users*")])>
                        <a href="{{route("admin.users.index")}}">
                            <span class="has-icon">
                                <i class="icon-users"></i>
                            </span>
                            <span class="nav-title">{{__('Users')}}</span>
                        </a>
                    </li>

                    <li @class(["active selected" => request()->is("*settings*")])>
                        <a href="{{route("admin.settings.index")}}">
                            <span class="has-icon">
                                <i class="icon-settings"></i>
                            </span>
                            <span class="nav-title">{{__('Settings')}}</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{route("logout")}}">
                            <span class="has-icon">
                                <i class="icon-log-out"></i>
                            </span>
                            <span class="nav-title">{{__('Logout')}}</span>
                        </a>
                    </li>
                </ul>
                <!-- END: side-nav-content -->
            </nav>
        </div>
        <!-- END: .side-nav -->
    </div>
    <!-- END: .side-content -->
</aside>
