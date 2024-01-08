@extends("layouts.admin")

@section("title", "Profile")

@section("page_title", "Profile")

@section("page_subtitle", "User Profile data")

@push("page_actions")
    @if(auth()->user()->role == "admin")
        <a href="{{route("admin.profile.edit")}}" class="btn btn-warning float-right" data-toggle="tooltip"
           data-placement="left" title="Edit profile">
            <i class="icon-edit"></i>
        </a>
    @endif
@endpush

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="mb-4 text-center">
                        <img src="{{ $user->image_url }}" alt="Profile Picture" class="rounded-circle" style="width: 150px; height: 150px;">
                        <h3 class="my-2">{{ $user->name }}</h3>
                        <p class="text-muted mb-4">{{ $user->email }}</p>
                    </div>
                    <div class="form-group">
                        <label for="role">{{__('Role')}}</label>
                        <input type="text" class="form-control" id="role" value="{{ $user->role }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="phone">{{__('Phone')}}</label>
                        <input type="text" class="form-control" id="phone" value="{{ $user->phone }}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="created_at">Joined On</label>
                        <input type="text" class="form-control" id="created_at" value="{{ $user->created_at->format('F j, Y') }}" readonly>
                    </div>
                </div>
            </div>

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        Your Activity log
                    </h5>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-striped projects">
                            <thead>
                            <tr>
                                <th style="width: 10%">
                                    #
                                </th>
                                <th style="width: 20%">
                                    Description
                                </th>
                                <th style="width: 10%">
                                    Event
                                </th>
                                <th style="width: 15%">
                                    Route
                                </th>
                                <th style="width: 15%">
                                    Date
                                </th>
                                <th style="width: 15%">
                                    Actions
                                </th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($activityLogs as $log)
                                <tr>
                                    <td>
                                        {{ $log->id }}
                                    </td>
                                    <td>
                                        {{ $log->description }}
                                    </td>
                                    <td>
                                        <span class="badge badge-info">{{ $log->event }}</span>
                                    </td>
                                    <td>
                                        <span class="badge badge-warning">{{ $log->properties["route"]["name"] ?? "--" }}</span>
                                    </td>
                                    <td>
                                        {{ $log->created_at->format("Y-m-d g:i a") }}
                                    </td>
                                    <td class="project-actions text-center">

                                        <a href="{{ route('admin.settings.activity-log.show', $log) }}"
                                           class="btn btn-info btn-sm">
                                            <i class="icon-eye">
                                            </i>
                                            Show
                                        </a>

                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7">
                                        <div class="alert alert-success text-center">{{__('No Data')}}</div>
                                    </td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="card-footer">
                    {{$activityLogs->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
