<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\User;
use App\Models\Course;

use Livewire\Component;

class Posts extends Component
{

    public function render()
    {
        $search = request('search');

        if ($search) {

            $posts = Post::where([
                ['title', 'like', '%'.$search.'%']
            ])->orderBy('id', 'desc')->get();

        } else {
            $posts = Post::where('status', 'Aprovado')->orderBy('id', 'desc')->get();
        }

        return view('livewire.posts', ['posts' => $posts, 'search' => $search]);
    }

    public function category($category, $search = null) {

        $posts = Post::where([
            ['category', ucfirst($category)],
            ['status', 'Aprovado']
        ])->orderBy('id', 'desc')->get();

        return view('livewire.posts', ['posts' => $posts, 'search' => $search]);
    }

    public function show($id) {

        $post = Post::findOrFail($id);

        return view('livewire.show-post', ['post' => $post]);
    }

}
