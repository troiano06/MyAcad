<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ShowComments extends Component
{
    public $content = '';
    public $post;

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function mount($post) {
        $this->post = $post;
    }

    public function render()
    {
        $comments = Comment::where('post_id', $this->post->id)->get();

        return view('livewire.show-comments', [
            'comments' => $comments
        ]);
    }

    public function create() {

        $this->validate();

        auth()->user()->comment()->create([
            'content' => $this->content,
            'date' => date("Y-m-d H:i:s"),
            'status' => "Ativo",
            'post_id' => $this->post->id,
        ]);

        $this->content = '';
    }
}
