@extends('layouts.main')

@section('title', 'Criar Publicação')

@section('content')

<div id="post-create-container" class="col-md-6 offset-md-3">
    <h1>Crie sua publicação</h1>
    <form action="/posts/store" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do Post</label><br>
            <input type="file" id="image" name="image" class="form-control-title">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Categoria</label>
            <select name="category" id="category" class="form-control">
                <option value="Geral">Geral</option>
                <option value="Comunicado">Comunicado</option>
                <option value="Evento">Evento</option>
                <option value="Vaga">Vaga</option>
                <option value="Artigo">Artigo</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Curso</label>
            <select name="course" id="course" class="form-control">
                <option value="Todos">Todos</option>
                <option value="ADS">Análise e Desenvolvimento de Sistemas</option>
                <option value="LOG">Logística</option>
                <option value="POL">Polímeros</option>
                <option value="SBIO">Sistemas Biomédicos</option>
            </select>
        </div>
        <br>
        <div class="form-group">
            <label for="title">Título</label>
            <input type="text" class="form-control" id="title" name="title">
        </div>
        <br>
        <div class="form-group">
            <label for="title">Conteúdo</label>
            <textarea name="content" id="content"class="form-control" rows="5"></textarea>
        </div>
        <br>
        <input type="submit" class="btn btn-dark" value="Enviar Publicação">
    </form>
</div>
@endsection
