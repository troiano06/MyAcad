<?php

namespace App\Http\Livewire;

use App\Models\Like;
use App\Models\Post;
use Livewire\Component;

class ShowLikes extends Component
{
    public $post;

    public function mount($post) {
        $this->post = $post;
    }

    public function render()
    {
        $likes = Like::where('post_id', $this->post->id);

        if(Like::where('user_id', auth()->user()->id)->where('post_id', $this->post->id)->count()){
            $like = 'Descurtir';
        }else{
            $like = 'Curtir';
        }


        return view('livewire.show-likes', ['likes' => $likes, 'like' => $like]);
    }

    public function Curtir() {

        $like = new Like;

        $like->user_id = auth()->user()->id;
        $like->post_id = $this->post->id;

        $like->save();

        //$post = Post::find($this->post->id);

        //$post->likes()->create([
        //    'user_id' => auth()->user()->id
        //]);
    }

    public function Descurtir() {

        $this->post->likes()->delete();
    }
}
