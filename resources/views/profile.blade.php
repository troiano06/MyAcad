@extends('layouts.main')

@section('title', 'Perfil')

@section('content')


    <div class="col-md-12 ">
        <div class="row">
            <div id="info-container" class="col-md-4">
                <h1>{{ $user->name }}</h1>
                <p>Email: {{ $user->email }} </p>
                <p>RA: {{ $user->RA }}</p>
                <p>Semestre:
                    @if ($user->semester != null)
                        {{ $user->semester }}°
                    @endif
                </p>
                <p>Curso:
                    @if ($user->course_id != null)
                        {{ $user->course->name }}
                    @endif
                </p>
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
