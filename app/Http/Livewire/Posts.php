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

            $posts = Post::where('title', 'like', '%'.$search.'%')
                    ->whereIn('category',['Geral','Comunicado', 'Evento', 'Vaga', 'Artigo'])
                    ->where('created_at', '>', date('Y-m-d', strtotime('-90 days')))
                    ->orderBy('id', 'desc')->get();

        } else {
            $posts = Post::where('status', 'Aprovado')
                    ->whereIn('category',['Geral','Comunicado', 'Evento', 'Vaga', 'Artigo'])
                    ->where('created_at', '>', date('Y-m-d', strtotime('-90 days')))
                    ->orderBy('id', 'desc')->get();
        }

        if(auth()->user()->profile_type == 'Administrador'){
            return view('livewire.posts', ['posts' => $posts, 'search' => $search]);
        }

        if(auth()->user()->email_verified_at < date('Y-m-d', strtotime('-180 days'))){
            $user = auth()->user();
            $user->email_verified_at = null;
            $user->save();
            return view('livewire.posts', ['posts' => $posts, 'search' => $search]);
        }

        return view('livewire.posts', ['posts' => $posts, 'search' => $search]);
    }

    public function category($category, $search = null) {

        $posts = Post::where([
            ['category', ucfirst($category)],
            ['status', 'Aprovado'],
            ['created_at', '>', date('Y-m-d', strtotime('-90 days'))]
        ])->orderBy('id', 'desc')->get();

        return view('livewire.posts', ['posts' => $posts, 'search' => $search]);
    }

    public function show($id) {

        $post = Post::findOrFail($id);

        return view('livewire.show-post', ['post' => $post]);
    }

}
