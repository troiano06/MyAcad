<div>
@extends('layouts.main')

@section('title', $post->title)

@section('content')
    @if (auth()->user()->profile_type == 'Moderador' && $post->status == 'Pendente')
        <h1 style="text-align: center">Post aprovado?</h1>
        <div class="col-md-2 offset-md-5 mx-auto" id="aprovacao">
            <span style="float:left;">
                <form action="/posts/enable/{{$post->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input style="padding: 10px 40px; font-size: 16px;" type="submit" class="btn btn-success delete-btn" value="Sim">
                </form>
            </span>
            <span style="float:right;">
                <form action="/posts/disable/{{$post->id}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <input style="padding: 10px 40px; font-size: 16px;" type="submit" class="btn btn-danger delete-btn" value="Não">
                </form>
            </span>
        </div>
    @endif
    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="destination-container" class="col-md-6 offset-md-3" style="clear: both">
                <h3 class="post-destination" style="text-align: center"><ion-icon name="book"></ion-icon> {{ $post->course->initials }} | <ion-icon name="bookmark"></ion-icon> {{ $post->category }}</h3>
            </div>
            <div id="heading-container" class="col-md-6 offset-md-3" style="clear: both;">
                <h1 style="text-align: center">{{ $post->title }}</h1>
                <p class="post-owner d-flex justify-content-center" style=" font-size: 25px"><a href="/perfil/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
            </div>
            <div id="image-container" class="col-md-6 offset-md-3">
                <img src="/img/posts/{{ $post->image }}" class="img-fluid" alt="{{ $post->title }}">
            </div>
            <div id="like-container" class="d-flex justify-content-center" style="margin-top: 10px;margin-bottom: 10px;">
                @livewire('show-likes', ['post' => $post])
            </div>
            <div class="col-md-6 offset-md-3" id="content-container">
                <p class="post-content" style=" font-size: 20px">{{ $post->content }}</p>
            </div>
            <hr>
            <div id="comment-container" class="col-md-6 offset-md-3" style="margin-top: 10px;margin-bottom: 10px;">
                @livewire('show-comments', ['post' => $post])
            </div>
        </div>
    </div>
@endsection
</div>
