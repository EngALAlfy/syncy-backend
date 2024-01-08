<table class="table table-hover table-fixed table-striped ">
    <thead>
    <tr>
        <th style="width: 5%">#</th>
        <th style="width: 15%">{{__('Amount')}}</th>
        <th style="width: 20%">{{__('User')}}</th>
        <th style="width: 20%">{{__('Note')}}</th>
        <th style="width: 25%">{{__('Date')}}</th>
        <th style="width: 15%">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($pointTransactions as $pointTransaction)
        <tr>
            <th scope="row">{{$pointTransaction->id}}</th>
            <td>
                @if($pointTransaction->points > 0)
                    <span class="badge badge-success"><i class="fa fa-arrow-up mr-2"></i>{{$pointTransaction->points}}</span>
                @elseif($pointTransaction->points < 0)
                    <span class="badge badge-danger"><i class="fa fa-arrow-down mr-2"></i>{{$pointTransaction->points}}</span>
                @else
                    <span class="badge badge-dark">{{$pointTransaction->points}}</span>
                @endif
            </td>
            <td>{{$pointTransaction->user?->name}}</td>
            <td>{!! $pointTransaction->note !!}</td>
            <td><span data-toggle="tooltip" data-placement="top"
                      title="{{ $pointTransaction->created_at->diffForHumans() }}"
                      id="created_at"
                >{{ $pointTransaction->created_at->format('F j, Y h:i A') }}</span></td>
            <td>
                <form class="d-inline delete-form"
                      action="{{route("admin.point-transactions.destroy" , $pointTransaction)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="icon-delete"></i></button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">
                <div class="alert alert-success text-center">{{__('No Data')}}</div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
