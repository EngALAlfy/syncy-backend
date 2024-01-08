<div class="card">
    <img src="{{ $post->image_url }}" class="card-img-top" alt="{{ $post->name }}">
    <div class="card-body">
        <h5 class="card-title"><strong>{{ $post->name }}</strong></h5>
        <p class="card-text">{{ $post->short_desc }}</p>
        <hr>
        <p class="card-text">{{ $post->desc }}</p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th scope="row">{{ __("Price") }}</th>
                <td><span class="badge badge-danger">{{ $post->price }}</span></td>
            </tr>
            <tr>
                <th scope="row">{{ __("Custom Email") }}</th>
                <td>{{ $post->custom_email }}</td>
            </tr>
            <tr>
                <th scope="row">{{ __("Custom Phone") }}</th>
                <td>{{ $post->custom_phone }}</td>
            </tr>

            <tr>
                <th scope="row">{{ __("Owner Email") }}</th>
                <td>{{ $post->owner->email }}</td>
            </tr>
            <tr>
                <th scope="row">{{ __("Owner Phone") }}</th>
                <td>{{$post->owner->country_code}}{{ $post->owner->phone_number }}</td>
            </tr>

            <tr>
                <th scope="row">{{ __("Country") }}</th>
                <td><span class="badge badge-primary">{{ $post->country->name }}</span></td>
            </tr>
            <tr>
                <th scope="row">{{ __("State") }}</th>
                <td><span class="badge badge-info">{{ $post->state->name }}</span></td>
            </tr>
            <tr>
                <th scope="row">{{ __("Category") }}</th>
                <td><span class="badge badge-success">{{ $post->category->name }}</span></td>
            </tr>
            <tr>
                <th scope="row">{{ __("Featured") }}</th>
                <td>
                            <span class="{{ $post->is_featured ? 'text-success' : 'text-muted' }}">
                                {{ $post->is_featured ? __("Yes") : __("No") }}
                            </span>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="list-group-item">
            <div class="d-flex align-items-center">
                <img src="{{ $post->owner->image_url }}" alt="{{ $post->owner->name }}" class="mr-2"
                     style="width: 70px; height: 70px; border-radius: 50%;">
                <div class="row ">
                    <h5 class="col-12 mb-0">{{ $post->owner->name }}</h5>
                    <p class="text-muted col-12 mb-0">{{ $post->owner->email }}</p>
                    <p class="text-muted col-12 mb-0">{{$post->owner->country_code}}{{ $post->owner->phone_number }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
