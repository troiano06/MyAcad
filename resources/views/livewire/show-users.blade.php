<div>
    @extends('layouts.main')

    @section('title','Gerenciar Usuários')

    @section('content')

    <div class="row mb-3 p-2">
        <h1>Gerenciar Usuários</h1>
        <div class="col-md-3">
            <label for="">Pesquisar por e-mail:</label>
            <form class="d-flex" action="/usuarios" action="GET" id="search">
                <input class="form-control me-2" type="search" id="search" name="search" placeholder="exemplo@fatec.sp.gov.br" aria-label="Search">
                <button class="btn btn-outline-dark" type="submit">Pesquisar</button>
            </form>
        </div>
    </div>

    @if (count((array)$users) > 0)
        <table class="table col-md-6">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Email</th>
                    <th scope="col">Curso</th>
                    <th scope="col">Tipo Perfil</th>
                    <th scope="col">Opções</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td> {{ $loop->index + 1 }} </td>
                    <td> {{ $user->name }} </td>
                    <td> {{ $user->email }} </td>
                    @if ($user->course == null)
                        <td>Indefinido</td>
                    @else
                        <td> {{ $user->course->name }} </td>
                    @endif
                    @if ($user->profile_type == 'Administrador')
                        <td>Administrador</td>
                        <td>Nenhuma ação disponível</td>
                    @else
                        @if ($user->profile_type == 'Moderador')
                            <td>Moderador</td>
                            <td>
                                <form action="/usuarios/downgrade/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-danger delete-btn" value="Rebaixar">
                                </form>
                            </td>
                        @else
                            <td>Comum</td>
                            <td>
                                <form action="/usuarios/upgrade/{{$user->id}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <input type="submit" class="btn btn-primary delete-btn" value="Promover">
                                </form>
                            </td>
                        @endif

                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Não encontrado.</p>
    @endif

    @endsection
</div>
