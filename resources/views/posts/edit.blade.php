@extends('layouts.main')

@section('title', 'Editando: ' . $post->title)

@section('content')

<div id="post-create-container" class="col-md-6 offset-md-3">
    <h1>Editando: {{$post->title}}</h1>
    <form action="/posts/update/{{$post->id}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="image">Imagem do Post</label><br>
            <input type="file" id="image" name="image" class="form-control-title">
            <img src="/img/posts/{{$post->image}}" alt="{{$post->title}}" class="img-preview">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Categoria</label>
            <select name="category" id="category" class="form-control">
                <option value="Geral">Geral</option>
                <option value="Comunicado" {{ $post->category == "Comunicado" ? "selected='selected'" : "" }}>Comunicado</option>
                <option value="Evento" {{ $post->category == "Evento" ? "selected='selected'" : "" }}>Evento</option>
                <option value="Vaga" {{ $post->category == "Vaga" ? "selected='selected'" : "" }}>Vaga</option>
                <option value="Artigo" {{ $post->category == "Artigo" ? "selected='selected'" : "" }}>Artigo</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Curso</label>
            <select name="course_id" id="course_id" class="form-control">
                @foreach ($courses as $course)
                    <option value="{{ $course->id }}" >{{ $course->name }}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title" value="{{$post->title}}">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Conteúdo</label>
            <textarea name="content" id="content"class="form-control" rows="5">{{$post->content}}</textarea>
        </div>
        <br>
        <input type="submit" class="btn btn-dark" value="Atualizar">
    </form>
</div>
@endsection
