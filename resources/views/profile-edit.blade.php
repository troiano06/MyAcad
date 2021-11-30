@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')


    <div class="col-md-4 ">
        <div class="row">
            <h1>Editar Perfil</h1>
            <form action="/perfil/update" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="title">Nome</label>
                    <input type="text" class="form-control" id="name" name="name" value="{{auth()->user()->name}}">
                </div>
                <br>
                <div class="form-group">
                    <label for="title">E-mail</label>
                    <input type="text" class="form-control" id="email" name="email" disabled value="{{auth()->user()->email}}">
                </div>
                <br>
                <div class="form-group">
                    <label for="title">RA</label>
                    <input type="text" class="form-control" id="RA" name="RA" value="{{auth()->user()->RA}}">
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Semestre</label>
                    <select name="semester" id="semester" class="form-control">
                        <option value="Todos" {{ auth()->user()->semester == 'Todos' ? "selected='selected'" : "" }}>Todos</option>
                        @for ($x=1; $x<9; $x++)
                            <option value="{{ $x }}" {{ auth()->user()->semester == $x ? "selected='selected'" : "" }}>{{ $x }}</option>
                        @endfor
                    </select>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">Curso</label>
                    <select name="course_id" id="course_id" class="form-control">
                        @foreach ($courses as $course)
                            <option value="{{ $course->id }}"
                                @if (auth()->user()->course_id != null)
                                    {{ auth()->user()->course_id == $course->id ? "selected='selected'" : "" }}
                                @endif
                            >
                            {{ $course->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <br>
                <input type="submit" class="btn btn-dark" value="Atualizar">
            </form>
        </div>
    </div>





@endsection
