<table class="table table-hover table-fixed table-striped ">
    <thead>
    <tr>
        <th style="width: 5%">#</th>
        <th style="width: 20%">{{__('Name')}}</th>
        <th style="width: 25%">{{__('Short desc')}}</th>
        <th style="width: 10%">{{__('Owner')}}</th>
        <th style="width: 20%">{{__('Image')}}</th>
        <th style="width: 20%">{{__('Actions')}}</th>
    </tr>
    </thead>
    <tbody>
    @forelse($posts as $post)
        <tr>
            <th scope="row">{{$post->id}}</th>
            <td>{{$post->name}}</td>
            <td>{{$post->short_desc}}</td>
            <td>{{$post->owner?->name}}</td>
            <td>{!! $post->image_html !!}</td>
            <td>
                <a href="{{route("admin.posts.show" , $post)}}"
                   class="btn btn-success"><i class="icon-eye"></i></a>
                <a href="{{route("admin.posts.edit" , $post)}}" class="btn btn-warning"><i class="icon-edit"></i></a>
                <form class="d-inline delete-form" action="{{route("admin.posts.destroy" , $post)}}" method="post">
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
