@extends('layouts.main')

@section('title', 'Perfil')

@section('content')


    <div class="col-md-12 ">
        <div class="row">
            <h1>Perfil</h1>
            <div id="info-container" class="col-md-4">
                <h1>{{ $user->name }}</h1>
                <p class="post-owner">Email: {{ $user->email }} </p>
            </div>
            <div id="info-container" class="col-md-3">
                @if ($user->id == auth()->user()->id)
                    <h1>Ações</h1>
                    <p><a href="/perfil/my-posts">Minhas publicações</a></p>
                    <p><a href="/perfil/edit">Editar Perfil</a></p>
                @endif
            </div>
        </div>
    </div>





@endsection
