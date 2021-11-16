<div>
@extends('layouts.main')

@section('title', 'MyAcad')

@section('content')
    <div id="title-container" class="col-12">
        <h1>Mural Acadêmico Digital</h1>
    </div>
    <div id="posts-container" class="col-md-6 offset-md-3">
        @if ($search)
            <h2>Resultados para: {{ $search }}</h2>
        @endif
        <div id="cards-container" class="row">
            @foreach ($posts as $post)
                <div onclick="location.href='/posts/{{ $post->id }}';" class="card shadow p-3 mb-5 bg-body col-md-6">
                    <img src="/img/posts/{{ $post->image }}" alt="{{ $post->title }}">
                    <div class="card-body">
                        <p class="card-date">{{ date('d/m/Y', strtotime($post->date)) }}</p>
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-participants">{{ $post->category }} | {{ $post->course->initials }}</p>
                    </div>
                </div>
            @endforeach
            @if (count($posts) == 0 && $search)
                <p>Não foi encontrada nenhuma publicação para <b>{{ $search }}!</b> <a href="/">Ver todos</a></p>
            @elseif(count($posts) == 0)
            <p>Não há publicações disponíveis.</p>
            @endif
        </div>
    </div>


    <!-- Code begins here -->
    <a href="/posts/criar" class="float">
    <ion-icon class="new-post" name="add-outline"></ion-icon>
    </a>
@endsection
</div>
