<!doctype html>
<html lang="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocale() }}"
      dir="{{ \Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() }}">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" href="{{asset("assets/website/img/logo/ficon.png")}}"/>
    <title>{{config("app.name")}} | @yield("title")</title>

    @if (\Mcamara\LaravelLocalization\Facades\LaravelLocalization::getCurrentLocaleDirection() == 'rtl')
        <link rel="stylesheet" href="{{asset("assets/admin/css/bootstrap-rtl.min.css")}}"/>
        <link rel="stylesheet" href="{{asset("assets/admin/css/main-rtl.css")}}"/>
    @else
        <link rel="stylesheet" href="{{asset("assets/admin/css/bootstrap.min.css")}}"/>
        <link rel="stylesheet" href="{{asset("assets/admin/css/main.css")}}"/>
    @endif

    <!-- Common CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{asset("assets/admin/fonts/icomoon/icomoon.css")}}"/>
    <link href="{{asset("assets/admin/css/select2.min.css")}}" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset("assets/admin/css/flag-icons.min.css")}}"/>
    @vite('resources/js/app.js' , "build")
    @stack("styles")

    <style>
        .table-fixed {
            table-layout: fixed !important;
        }

        .table-fixed td {
            word-break: break-all;
        }
    </style>
</head>
<body>

<!-- BEGIN .app-wrap -->
<div class="app-wrap">
    <!-- BEGIN .app-heading -->
    @include("admin.includes.header")
    <!-- END: .app-heading -->
    <!-- BEGIN .app-container -->
    <div class="app-container">
        <!-- BEGIN .app-side -->
        @include("admin.includes.sidebar")
        <!-- END: .app-side -->

        <!-- BEGIN .app-main -->
        <div class="app-main">
            <!-- BEGIN .main-heading -->
            <header class="main-heading">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8">
                            <div class="page-icon">
                                <i class="icon-beaker"></i>
                            </div>
                            <div class="page-title">
                                <h5>@yield("page_title")</h5>
                                <h6 class="sub-heading">@yield("page_subtitle")</h6>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4">
                            <div class="right-actions">
                                @stack("page_actions")
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- END: .main-heading -->
            <!-- BEGIN .main-content -->
            <div class="main-content">
                @include("admin.includes.status")
                @yield("content")
            </div>
            <!-- END: .main-content -->
        </div>
        <!-- END: .app-main -->
    </div>
    <!-- END: .app-container -->
    <!-- BEGIN .main-footer -->
    @include("admin.includes.footer")
    <!-- END: .main-footer -->
</div>
<!-- END: .app-wrap -->

<!-- jQuery first, then Tether, then other JS. -->
<script src="{{asset("assets/admin/js/jquery.js")}}"></script>
<script src="{{asset("assets/admin/js/bootstrap.min.js")}}"></script>
<script src="{{asset("assets/admin/vendor/leadMenu/leadMenu.js")}}"></script>
<script src="{{asset("assets/admin/vendor/onoffcanvas/onoffcanvas.js")}}"></script>
<script src="{{asset("assets/admin/js/moment.js")}}"></script>

<!-- Slimscroll JS -->
<script src="{{asset("assets/admin/vendor/slimscroll/slimscroll.min.js")}}"></script>
<script src="{{asset("assets/admin/vendor/slimscroll/custom-scrollbar.js")}}"></script>

<!-- Common JS -->
<script src="{{asset("assets/admin/js/common.js")}}"></script>
<script src="{{asset("assets/admin/js/select2.min.js")}}"></script>
@stack("scripts")

<script>

    $(function () {

        document.querySelector('li.active.selected').scrollIntoView({
            behavior: 'smooth'
        });

        $(".delete-form button").click(function (e) {
            e.preventDefault();
            let form = $(e.target).parents('form').eq(0);
            swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            })
        });
    });
</script>
</body>

</html>
