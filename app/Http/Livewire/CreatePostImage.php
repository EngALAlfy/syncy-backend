<?php

namespace App\Http\Livewire;

use App\Models\PostImage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePostImage extends Component
{
    use WithFileUploads;

    public $image;
    public $postId;

    protected $listeners = ['post_image_stored' => '$refresh'];

    protected $rules = [
        "image" => "required|max:900|image",
    ];

    public function updated($propertyName): void
    {
        $this->validateOnly($propertyName);
    }


    public function store(): void
    {

        $data = $this->validate();

        $data['post_id'] = $this->postId;

        if (isset($data['image'])){
            $data['image'] = upload_image($data['image']);
        }

        PostImage::create($data);

        flash()->success(__("Image added successfully"));

        $this->emit('post_image_stored');
        $this->image = null;
    }


    public function render()
    {
        return view('livewire.create-post-image');
    }
}
