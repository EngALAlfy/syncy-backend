<?php

namespace App\Http\Livewire;

use App\Models\PostImage;
use Livewire\Component;

class PostImages extends Component
{
    public $postId;
    public $deleteId;
    // settings
    protected $listeners = ['post_image_stored' => '$refresh'];

    public function render()
    {
        $images = PostImage::where("post_id", $this->postId)->latest()->get();
        return view('livewire.post-images', compact("images"));
    }

    function deleteId($id)
    {
        $this->deleteId = $id;
    }

    public function delete()
    {
        $image = PostImage::find($this->deleteId);
        $image->delete();
        flash()->success(__("Image deleted successfully"));
        $this->deleteId = null;
    }
}
