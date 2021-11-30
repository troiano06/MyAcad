<?php

namespace App\Http\Livewire;

use Illuminate\Http\Request;

use App\Models\User;
use Livewire\Component;

class ShowUsers extends Component
{
    public $search;

    public function render()
    {

        $search = request('search');

        if ($search) {

            $users = User::where('email', 'like', '%'.$search.'%')
                    ->orderBy('id', 'desc')->get();

        } else {
            $users = User::orderBy('course_id', 'asc')->orderBy('name', 'asc')->get();
        }

        return view('livewire.show-users', ['users' => $users, 'search' => $search]);
    }

    public function upgrade($id) {

        User::where('id', $id)->update(array('profile_type' => 'Moderador'));

        return back();
    }

    public function downgrade($id) {

        User::where('id', $id)->update(array('profile_type' => 'Comum'));

        return back();
    }
}
