@extends('layouts.main')

@section('title','Dashboard')

@section('content')

<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Posts</h1>
</div>
<div class="col-md-10 offset-md-1 dashboard-posts-container">
    @if (count($posts) > 0)

    @else
        <p>Você ainda não possuí publicações.</p>
    @endif
</div>

@endsection
