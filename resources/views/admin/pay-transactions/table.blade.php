<table class="table table-hover table-fixed table-striped ">
    <thead>
    <tr>
        <th style="width: 5%">#</th>
        <th style="width: 15%">{{__('Amount')}}</th>
        <th style="width: 15%">{{__('User')}}</th>
        <th style="width: 10%">{{__('Method')}}</th>
        <th style="width: 10%">{{__('Status')}}</th>
        <th style="width: 15%">{{__('Note')}}</th>
        <th style="width: 15%">{{__('Date')}}</th>
        <th style="width: 15%">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($payTransactions as $payTransaction)
        <tr>
            <th scope="row">{{$payTransaction->id}}</th>
            <td>
                @if($payTransaction->amount > 0)
                    <span class="badge badge-success"><i class="fa fa-arrow-up mr-2"></i>{{$payTransaction->amount}}</span>
                @elseif($payTransaction->amount < 0)
                    <span class="badge badge-danger"><i class="fa fa-arrow-down mr-2"></i>{{$payTransaction->amount}}</span>
                @else
                    <span class="badge badge-dark">{{$payTransaction->amount}}</span>
                @endif
            </td>
            <td>{{$payTransaction->user?->name}}</td>
            <td>
                @if($payTransaction->status == \App\Helpers\TransactionStatus::SUCCESS->name)
                    <span class="badge badge-success"><i class="fa fa-check mr-2"></i>{{\App\Helpers\TransactionStatus::SUCCESS->name}}</span>
                @else
                    <span class="badge badge-danger"><i class="fa fa-close mr-2"></i>{{\App\Helpers\TransactionStatus::ERROR->name}}</span>
                @endif
            </td>
            <td>
                    <span class="badge badge-dark">
                        {{$payTransaction->method}}
                    </span>
            </td>
            <td>{!! $payTransaction->note !!}</td>
            <td><span data-toggle="tooltip" data-placement="top"
                      title="{{ $payTransaction->created_at->diffForHumans() }}"
                      id="created_at"
                >{{ $payTransaction->created_at->format('F j, Y h:i A') }}</span></td>
            <td>
                <form class="d-inline delete-form"
                      action="{{route("admin.pay-transactions.destroy" , $payTransaction)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger"><i class="icon-delete"></i></button>
                </form>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="8">
                <div class="alert alert-success text-center">{{__('No Data')}}</div>
            </td>
        </tr>
    @endforelse
    </tbody>
</table>
