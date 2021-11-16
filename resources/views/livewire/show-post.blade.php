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
            <div id="image-container" class="col-md-6">
                <img src="/img/posts/{{ $post->image }}" class="img-fluid" alt="{{ $post->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $post->title }}</h1>
                <p class="post-owner"><ion-icon name="person"></ion-icon><a href="/perfil/{{ $post->user->id }}">{{ $post->user->name }}</a></p>
                <p class="post-category"><ion-icon name="bookmark"></ion-icon> {{ $post->category }}</p>
                <p class="post-course"><ion-icon name="book"></ion-icon> {{ $post->course->initials }}</p>
                @if ($post->likes->count())
                    <a href="#" wire:click.prevent="unlike({{ $post->id }})">Descurtir</a>
                @else
                    <a href="#" wire:click.prevent="like({{ $post->id }})">Curtir</a>
                @endif
            </div>
            <div class="col-md-12" id="content-container">
                <p class="post-content">{{ $post->content }}</p>
            </div>
            <hr>
            @livewire('show-comments', ['post' => $post])
        </div>
    </div>
@endsection
</div>
