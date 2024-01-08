<table class="table table-hover table-fixed table-striped ">
    <thead>
    <tr>
        <th style="width: 5%">#</th>
        <th style="width: 30%">{{__('Name')}}</th>
        <th style="width: 20%">{{__('Code')}}</th>
        <th style="width: 25%">{{__('Image')}}</th>
        <th style="width: 20%">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($countries as $country)
        <tr>
            <th scope="row">{{$country->id}}</th>
            <td>{{$country->name}}</td>
            <td><span class="badge badge-warning">{{$country->code}}</span></td>
            <td>{!! $country->image_html !!}</td>
            <td>
                <a href="{{route("admin.countries.edit" , $country)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                <form class="d-inline delete-form" action="{{route("admin.countries.destroy" , $country)}}" method="post">
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
