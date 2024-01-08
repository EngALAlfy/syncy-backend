@extends("layouts.admin")

@section("title" , "Users")

@section("page_title" , "Users")

@section("page_subtitle" , "Website Users")

@push("page_actions")
    @if(auth()->user()->role == "admin")
        <a href="{{route("admin.users.create")}}" class="btn btn-primary float-right" data-toggle="tooltip"
           data-placement="left" title="New User">
            <i class="icon-add"></i>
        </a>
    @endif
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <table class="table table-hover table-fixed table-striped ">
                        <thead>
                        <tr>
                            <th style="width: 5%">#</th>
                            <th style="width: 20%">{{__('Name')}}</th>
                            <th style="width: 20%">{{__('Email')}}</th>
                            <th style="width: 15%">{{__('Role')}}</th>
                            <th style="width: 20%">{{__('Image')}}</th>
                            <th style="width: 20%">{{__('Actions')}}</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($users as $user)
                            <tr>
                                <th scope="row">{{$user->id}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->role}}</td>
                                <td>{!! $user->image_html !!}</td>
                                <td>
                                    <a href="{{route("admin.users.show" , $user)}}"
                                       class="btn btn-success"><i class="icon-eye"></i></a>
                                    <a href="{{route("admin.users.edit" , $user)}}" class="btn btn-warning"><i
                                            class="icon-edit"></i></a>
                                    <form class="d-inline delete-form" action="{{route("admin.users.destroy" , $user)}}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger"><i class="icon-delete"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5">
                                    <div class="alert alert-success text-center">{{__('No Data')}}</div>
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    {!! $users->links() !!}
                </div>
            </div>
        </div>
    </div>
@endsection
