@extends('layout.base')

@section('content')
    <div class="panel panel-default">    
        <div class="panel-heading">Lista de Usuários</div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>E-mail</th>
                            <th>Login</th>
                            <th>Ações</th>
                        </tr>
                    </thead>            
                    <tbody>            
                        @foreach($users as $user)
                            <tr>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td>{{$user->login}}</td>
                                @can('update', App\Usuario::class)
                                    <a href="{{route('editar', $usuario->id)}}"><i class="glyphicon glyphicon-pencil"></i></a>
                                @endcan
                                </td>                                
                            </tr>                         
                        @endforeach                                
                    </tbody>
                </table> 
            </div> 
        </div>
    </div>
@endsection