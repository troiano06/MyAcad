<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Livewire\Component;

class Posts extends Component
{

    public function render()
    {
        $search = request('search');

        if ($search) {

            $posts = Post::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $posts = Post::where('status', 'Aprovado')->get();
        }

        $posts = Post::where('status', 'Aprovado')->get();
        return view('livewire.posts', ['posts' => $posts, 'search' => $search]);
    }
}
