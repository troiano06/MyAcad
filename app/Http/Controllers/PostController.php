<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\User;
use App\Models\Course;

class PostController extends Controller
{
    public function index() {

        $search = request('search');

        if ($search) {

            $posts = Post::where([
                ['title', 'like', '%'.$search.'%']
            ])->orderBy('id', 'desc')->get();

        } else {
            $posts = Post::where('status', 'Aprovado')->orderBy('id', 'desc')->get();
        }

        return view('posts', ['posts' => $posts, 'search' => $search]);
    }

    public function category($category, $search = null) {

        $posts = Post::where([
            ['category', ucfirst($category)],
            ['status', 'Aprovado']
        ])->orderBy('id', 'desc')->get();

        return view('posts', ['posts' => $posts, 'search' => $search]);
    }

    public function create() {

        $courses = Course::all();

        return view('posts.create', ['courses' => $courses]);
    }

    public function store(Request $request) {

        $post = new Post;

        $post->title = $request->title;
        $post->category = $request->category;
        $post->content = $request->content;
        if (auth()->user()->profile_type == 'Moderador'){
            $post->status = "Aprovado";
        } else {
            $post->status = "Pendente";
        }
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
        $post->course_id = $request->course_id;

        $post->save();

        if (auth()->user()->profile_type == 'Moderador'){

            return redirect('/')->with('msg', 'Sua publicação já está ativa!');
        }

        return redirect('/')->with('msg', 'Publicação foi enviada para análise!');
    }

    public function show($id) {

        $post = Post::findOrFail($id);

        return view('posts.show', ['post' => $post]);
    }

    public function myPosts() {

        $user = auth()->user();

        $posts = $user->posts;

        return view('posts.my-posts', ['posts' => $posts]);

    }

    public function edit($id) {

        $courses = Course::all();

        $post = Post::findOrFail($id);

        return view('posts.edit', ['post' => $post, 'courses' => $courses]);
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

    public function enable($id) {

        Post::where('id', $id)->update(array('status' => 'Aprovado'));

        return redirect('/notificacoes')->with('msg', "Publicação #ID". $id . " aprovada com sucesso!");
    }

    public function disable($id) {

        if (auth()->user()->profile_type == 'Moderador'){

            Post::where('id', $id)->update(array('status' => 'Não aprovado'));

            return redirect('/notificacoes')->with('msg', 'Publicação #ID' . $id . ' desativada com sucesso!');
        }

        Post::where('id', $id)->update(array('status' => 'Desativado'));

        $post = Post::findOrFail($id);

        return redirect('/perfil/my-posts')->with('msg', 'Publicação #ID' . $id . ' desativada com sucesso!');
    }

    public function like($postId) {

        $post = Post::find($postId);

        $post->likes()->create([
            'user_id' => auth()->user()->id
        ]);
    }

    public function unlike(Post $post) {

        $post->likes()->delete();
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

        $courses = Course::all();

        return view('profile-edit', ['courses' => $courses]);
    }

    public function profileUpdate(Request $request) {

        $data = $request->all();

        User::findOrFail(auth()->user()->id)->update($data);

        return redirect('/')->with('msg', 'Perfil editado com sucesso!');
    }

    public function notifications() {
        if (auth()->user()->profile_type != 'Moderador'){
            return redirect('/')->with('msg', 'Acesso negado.');
        }

        $posts = Post::where([
            ['course_id', auth()->user()->course_id],
            ['status', 'Pendente']
        ])->get();

        return view('notifications', ['posts' => $posts]);
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
