<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;

class PostController extends Controller
{
    public function index() {

        $search = request('search');

        if ($search) {

            $posts = Post::where([
                ['title', 'like', '%'.$search.'%']
            ])->get();

        } else {
            $posts = Post::where('status', 'Aprovado')->get();
        }



        return view('posts', ['posts' => $posts, 'search' => $search]);
    }

    public function category($category, $search = null) {

        $posts = Post::where([
            ['category', ucfirst($category)],
            ['status', 'Aprovado']
        ])->get();

        return view('posts', ['posts' => $posts, 'search' => $search]);
    }

    public function create() {
        return view('posts.create');
    }

    public function store(Request $request) {

        $post = new Post;

        $post->title = $request->title;
        $post->category = $request->category;
        $post->course = $request->course;
        $post->content = $request->content;
        $post->status = "Pendente";
        $post->date = date("Y-m-d H:i:s");

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/posts'), $imageName);

            $post->image = $imageName;

        }

        $user = auth()->user();
        $post->user_id = $user->id;

        $post->save();

        return redirect('/')->with('msg', 'Publicação foi enviada para análise!');
    }

    public function show($id) {

        $post = Post::findOrFail($id);

        $postOwner = User::where('id', $post->user->id)->first()->toArray();

        return view('posts.show', ['post' => $post, 'postOwner' => $postOwner]);
    }

    public function myPosts() {

        $user = auth()->user();

        $posts = $user->posts;

        return view('posts.my-posts', ['posts' => $posts]);

    }

    public function edit($id) {

        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post]);
    }

    public function update(Request $request) {

        $data = $request->all();

        // Image Upload
        if($request->hasFile('image') && $request->file('image')->isValid()) {

            $requestImage = $request->image;

            $extension = $requestImage->extension();

            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now") . "." . $extension);

            $requestImage->move(public_path('img/posts'), $imageName);

            $data['image'] = $imageName;

        }

        Post::findOrFail($request->id)->update($data);

        return redirect('/')->with('msg', 'Publicação editada com sucesso!');
    }

    public function disable($id) {


        Post::where('id', $id)->update(array('status' => 'Desativado'));

        return redirect('/perfil/my-posts')->with('msg', 'Publicação desativada com sucesso!');
    }

    //Perfil
    public function profile($id = null) {

        if($id){
            $user = User::findOrFail($id);
        } else {
            $user = auth()->user();
        }

        return view('profile', ['user' => $user]);
    }

    public function profileEdit() {

        return view('profile-edit');
    }

    public function profileUpdate(Request $request) {

        $data = $request->all();

        User::findOrFail(auth()->user()->id)->update($data);

        return redirect('/')->with('msg', 'Perfil editado com sucesso!');
    }

    public function rules() {
        return view('rules');
    }


    //Calouros

    public function welcome() {
        return view('freshman.welcome');
    }

    public function about() {
        return view('freshman.about');
    }

    public function republics() {

        $posts = Post::all();

        return view('republics', ['posts' => $posts]);
    }

    public function veterans() {

        $posts = Post::all();

        return view('veterans', ['posts' => $posts]);
    }

    public function groups(){
        return view('freshman.groups');
    }
}