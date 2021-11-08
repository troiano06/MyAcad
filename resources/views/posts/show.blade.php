@extends('layouts.main')

@section('title', $post->title)

@section('content')

    <div class="col-md-10 offset-md-1">
        <div class="row">
            <div id="image-container" class="col-md-6">
                <img src="/img/posts/{{ $post->image }}" class="img-fluid" alt="{{ $post->title }}">
            </div>
            <div id="info-container" class="col-md-6">
                <h1>{{ $post->title }}</h1>
                <p class="post-owner"><ion-icon name="person"></ion-icon> {{ $postOwner['name'] }} </p>
                <p class="post-category"><ion-icon name="bookmark"></ion-icon> {{ $post->category }}</p>
                <p class="post-course"><ion-icon name="book"></ion-icon> {{ $postCourse['initials'] }}</p>
            </div>
            <div class="col-md-12" id="content-container">
                <p class="post-content">{{ $post->content }}</p>
            </div>
        </div>
    </div>


@endsection
