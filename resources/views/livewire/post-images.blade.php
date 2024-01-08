<div class="card">
    <div class="card-header">
        <div class="card-title float-left">
            <h3>@lang("Images")</h3>
        </div>
        <div class="d-flex card-tools float-right">
            <button class="btn btn-success" data-toggle="modal" data-target="#add-post-image-modal" type="button"><i
                    class="fa fa-plus mr-2"></i> @lang('Add')
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row">
            @forelse($images as $image)
                <div class="col-md-3 mb-4" style="height: 250px;">
                    <div class="card position-relative h-100">
                        <img src="{{ $image->imageUrl }}" style="object-fit: scale-down" alt="{{ $image->imageName }}"
                             class="card-img-top img-fluid h-100 image-previewed">
                        <div style="top:5px;right:5px;" class="position-absolute p-2">

                            @if ($deleteId == $image->id)
                                <button wire:click="delete" class="btn btn-warning btn-sm">
                                    <i class="fas fa-check">
                                    </i>
                                    @lang('Are you sure?')
                                </button>
                            @else
                                <button wire:click="deleteId({{ $image->id }})"
                                        class="btn btn-danger rounded-circle">
                                    <i class="fa fa-trash-alt">
                                    </i>
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="alert alert-info m-l-10 m-r-10">
                        <h5><i class="icon fas fa-info"></i> @lang('No Images found')</h5>
                    </div>
                </div>
            @endforelse
        </div>
    </div>

    @livewire('create-post-image' , ["postId" => $postId])

    @push('scripts')
        <script>
            document.addEventListener('livewire:load', function () {
                Livewire.on('post_image_stored', () => {
                    $('#add-post-image-modal').modal('hide');
                });
            });

        </script>
    @endpush

</div>
