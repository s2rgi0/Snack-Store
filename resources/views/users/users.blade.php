@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">ADD USERS</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('role.user.submit') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('usuario') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Roles de Usuario</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control" name="usuario" value="{{ old('usuario') }}" required autofocus>

                                @if ($errors->has('usuario'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('usuario') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        
                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    ADD USER 
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>name</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach( $role as $rol )
                        <tr>
                            <td> {{ $rol->id }}  </td>
                            <td> {{ $rol->name }} </td>
                           
                           
                        </tr>
                    @endforeach
                </tbody>
            </table>        
                </div>
            </div>
            
        </div>
    </div>













</div>




@endsection
