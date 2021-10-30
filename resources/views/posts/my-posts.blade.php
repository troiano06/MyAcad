@extends('layouts.main')

@section('title','Meus Posts')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Posts</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-posts-container">
    @if (count($posts) > 0)
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">ID</th>
                    <th scope="col">Título</th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Status</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td scope="row"> {{ $loop->index + 1 }} </td>
                        <td scope="row"> {{ $post->id }} </td>
                        <td><a href="/posts/{{ $post->id }}">{{ $post->title }}</a></td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->status }}</td>
                        <td>
                            @if ($post->status != 'Desativado')
                                <form action="/posts/disable/{{$post->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-danger delete-btn" value="Desativar">
                                </form>
                           @else
                                <p>Nenhuma ação disponível</p>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Você ainda não possuí publicações.</p>
    @endif
</div>

@endsection
