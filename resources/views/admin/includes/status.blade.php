<div class="p-l-20 p-r-20">
    @if (session()->has('success'))
        <script id="notification_script">
            if (Notification.permission === "granted") {
                new Notification("Success", {
                    body: "{{ session('success') }}",
                    icon: "{{ asset('assets/admin/img/lead.png') }}"
                });
            } else {
                Notification.requestPermission();
            }
        </script>
    @endif

        @include('flash::message')

    @if ($errors->any())
        <div class="m-t-10 alert with-close alert-danger alert-dismissible fade show">
            <span class="badge badge-pill badge-danger">Error</span>
            <i class="icon fa fa-ban"></i>
            <ul class="list-unstyled">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif


</div>
