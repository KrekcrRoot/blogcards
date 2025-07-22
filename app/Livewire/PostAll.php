<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostAll extends Component
{

    public $posts;
    public $selectedPost;

    public function mount($selectedPost): void
    {
        $this->selectedPost = $selectedPost;
        $this->posts = Post::all();
    }
    public function render()
    {
        return view('livewire.post-all');
    }
}
