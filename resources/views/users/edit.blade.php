@extends('layout.base')

@section('content')
<div class="panel-heading"><h3>Editar perfil</h3></div>
    <div class="panel-body">
        <form class="form-horizontal" method="post" action="#">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name" class="col-sm-2 control-label">Nome</label>
            <div class="col-sm-10">
            <input type="text" class="form-control" name="name" placeholder="Digite seu nome" value="{{$user->name}}">
            </div>
        </div>
        <div class="form-group">
            <label for="email" class="col-sm-2 control-label">Email</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" name="email" placeholder="Digite seu email" value="{{$user->email}}">
            </div>
        </div>
        <hr>
        <div class="form-group">
            <label for="login" class="col-sm-2 control-label">Login</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="login" placeholder="Digite seu login" value="{{$user->login}}">
            </div>
        </div>
        <div class="form-group">
            <label for="cargo" class="col-sm-2 control-label">Cargo</label>
            <div class="col-sm-10">
            <select class="form-control" name="permission">
                <option {{ $user->permission == 'Atendente' ? 'selected' : ''}}>Atendente</option>
                <option {{ $user->permission == 'Gerente' ? 'selected' : ''}}>Gerente</option>
            </select>
            </div>
        </div>
        <div class="form-group">
            <label for="password" class="col-sm-2 control-label">Senha</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" name="password" placeholder="Digite sua nova senha ou deixe em branco para manter a antiga">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="reset" class="btn btn-default">Cancelar</button>
                <button type="submit" class="btn btn-primary">Registrar</button>
            </div>
        </div>
        </form>
    </div>
</div>
@endsection