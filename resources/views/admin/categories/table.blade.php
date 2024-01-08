<table class="table table-hover table-fixed table-striped ">
    <thead>
    <tr>
        <th style="width: 5%">#</th>
        <th style="width: 20%">{{__('Name')}}</th>
        <th style="width: 25%">{{__('Short desc')}}</th>
        <th style="width: 10%">{{__('Parent')}}</th>
        <th style="width: 20%">{{__('Image')}}</th>
        <th style="width: 20%">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($categories as $category)
        <tr>
            <th scope="row">{{$category->id}}</th>
            <td>{{$category->name}}</td>
            <td>{{$category->short_desc}}</td>
            <td class="text-capitalize">
                @if(empty($category->parent_id))
                    <span class="badge badge-success">@lang("Primary")</span>
                @else
                    {{$category->parent?->name}}</td>
            @endif
            <td>{!! $category->image_html !!}</td>
            <td>
               <a href="{{route("admin.categories.edit" , $category)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                <form class="d-inline delete-form" action="{{route("admin.categories.destroy" , $category)}}" method="post">
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
