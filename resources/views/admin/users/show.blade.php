@extends("layouts.admin")

@section("title", "Users")

@section("page_title", "User Details")

@section("content")
    <div class="row gutters">
        <div class="col-12">
            <div class="card">
                <div class="card-body"> <!-- Center align content -->
                    <div class="mb-4 text-center">
                        <img src="{{ $user->image_url }}" alt="User Avatar" class="rounded-circle" style="width: 150px; height: 150px;"> <!-- Circular profile avatar -->
                    </div>

                    <div class="form-group">
                        <label for="name">{{__('Name')}}</label>
                        <input type="text" class="form-control" id="name" value="{{ $user->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="email">{{__('Email')}}</label>
                        <input type="email" class="form-control" id="email" value="{{ $user->email }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="role">{{__('Role')}}</label>
                        <input type="text" class="form-control" id="role" value="{{ $user->role }}" readonly>
                    </div>
                </div>
            </div>

            <div class="card card-outline card-primary">
                <div class="card-header">
                    <h5 class="card-title">
                        User Activity log
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
