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
                    <label for="title">Email</label>
                    <input type="text" class="form-control" id="email" name="email" disabled value="{{auth()->user()->email}}">
                </div>
                <br>
                <input type="submit" class="btn btn-dark" value="Atualizar">
            </form>
        </div>
    </div>





@endsection
