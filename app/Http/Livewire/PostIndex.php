<?php

namespace App\Http\Livewire;

use Livewire\WithFileUploads;

use App\Models\Post;
use Livewire\Component;

class PostIndex extends Component
{
    use WithFileUploads;

    public $showingPostModal = false;

    public $title;
    public $newImage;
    public $body;

    public function showPostModal()
    {
        $this->showingPostModal = true;
    }

    public function storePost()
    {
        $this->validate([
            'newImage' => 'image|max:1024',
            'title' => 'required',
            'body' => 'required'
        ]);

        $image = $this->newImage->store('public/posts');
        Post::create([
            'title' => $this->title,
            'image' => $image,
            'body' => $this->body
        ]);
        $this->reset();
    }

    public function render()
    {
        return view('livewire.post-index', ['posts' => Post::all()]);
    }
}
