@extends('layouts.main')

@section('title','Notificações')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Posts pendentes de aprovação</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-posts-container">
    @if (count($posts) > 0)
        <table class="table">
            <thead>
                <tr>
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
                        <td scope="row"> {{ $post->id }} </td>
                        <td>{{ $post->title }}</td>
                        <td>{{ $post->category }}</td>
                        <td>{{ $post->status }}</td>
                        <td>
                            <input type="submit" class="btn btn-info delete-btn" onclick="location.href='/posts/{{ $post->id }}';" value="Avaliar">
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não há publicações pendentes de aprovação.</p>
    @endif
</div>

@endsection
