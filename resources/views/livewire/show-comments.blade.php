<div>
    <h1>Comentários:</h1>
    <br>
    @if (count($comments) == 0)
        <p>Ainda não há comentários... Seja o primeiro a comentar!</p>
    @endif
    @foreach ($comments as $comment)
    <div style="display: table;" id="comentarios">
        <a style="display: table-cell;" href="/perfil/{{ $comment->user->id }}"><strong>{{ $comment->user->email }}</strong></a>&nbsp;
        {{ $comment->created_at->format('d/m/Y H:i') }}&nbsp;
        @if ($comment->user == auth()->user())
            <form style="display: table-cell;" method="post" wire:submit.prevent="disable({{$comment->id}})">
                <button type="submit" class="btn btn-dark">Excluir</button>
            </form>
        @endif
    </div>
    <p>{{ $comment->content }}</p>
    <br>
    @endforeach
<br>
    <form method="post" wire:submit.prevent="create()">
        <h4>Insira um comentário:</h4>
        <textarea type="text" class="form-control" name="content" id="content" wire:model="content" rows="3"></textarea>
        @error('content')
            {{ $message }}
        @enderror
        <br>
        <button type="submit" class="btn btn-dark">Comentar</button>
    </form>
</div>
