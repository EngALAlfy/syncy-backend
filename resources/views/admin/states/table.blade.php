<table class="table table-hover table-fixed table-striped ">
    <thead>
    <tr>
        <th style="width: 10%">#</th>
        <th style="width: 30%">{{__('Name')}}</th>
        <th style="width: 30%">{{__('Country')}}</th>
        <th style="width: 30%">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($states as $state)
        <tr>
            <th scope="row">{{$state->id}}</th>
            <td>{{$state->name}}</td>
            <td>{{$state->country?->name}}</td>
            <td>
                <a href="{{route("admin.states.edit" , $state)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                <form class="d-inline delete-form" action="{{route("admin.states.destroy" , $state)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="icon-delete"></i></button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4">
                <div class="alert alert-success text-center">{{__('No Data')}}</div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
