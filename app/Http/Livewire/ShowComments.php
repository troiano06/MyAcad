<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class ShowComments extends Component
{
    public $content = '';
    public $post_url = '';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {
        $comments = Comment::all();

        return view('livewire.show-comments', [
            'comments' => $comments
        ]);
    }

    public function create($post_id = null) {

        $this->validate();

        auth()->user()->comment()->create([
            'content' => $this->content,
            'date' => date("Y-m-d H:i:s"),
            'status' => $post_id,
        ]);

        $this->content = '';
    }
}
