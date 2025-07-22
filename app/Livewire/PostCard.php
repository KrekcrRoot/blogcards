<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;


class PostCard extends Component
{

    public Post $post;

    public function mount($post): void
    {
        $this->post = $post;
    }

    public function updatePost($data): void
    {
        $this->post->body = $data;
        $this->post->save();
    }

    public function render()
    {
        return view('livewire.post-card');
    }
}
