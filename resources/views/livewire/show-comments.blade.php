<div>
    <h1>Comentários Post: {{$post->title}}</h1>

    @foreach ($comments as $comment)
    <p><a href="/perfil/{{ $comment->user->id }}"><strong>{{ $comment->user->name }}</strong></a> {{ date('d/m/Y H:m', strtotime($comment->date)) }}</p>
    <p>{{ $comment->content }}</p>
    <br>
    @endforeach
<br>
    <form method="post" wire:submit.prevent="create()">
        <h4>Insira um comentário:</h4>
        <input type="text" name="content" id="content" wire:model="content">
        @error('content')
            {{ $message }}
        @enderror
        <button type="submit">Comentar</button>
    </form>
</div>
