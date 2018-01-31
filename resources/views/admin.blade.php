@extends('layouts.app')

@section('content')
<div class="container">
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:  #ffad33;"  >
            <h3>Snack Store Administrator Dashboard</h3>
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
                        <th>price</th>
                        <th>amount</th>
                        <th>delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $products as $prod )
                        <tr>
                            <td> {{ $prod->id }} </td>
                            <td> {{ $prod->name }} </td>
                            <td> {{ $prod->price }} </td>
                            <td> {{ $prod->amount }} </td>
                            <td>
                                {{ Form::open(['method' => 'DELETE', 'route' => 'remove.product', ]) }}
                                {{ csrf_field() }}
                                <input type="hidden" name="snack_id" value="{{ $prod->id }}" >
                                {{ Form::submit('remove', ['class' => 'btn btn-default']) }}                    
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
                </div>
            </div>
            
        </div>
    </div>

    <div class="row" >
        <div class="col-md-8 col-md-offset-2" >
            <div id="links" >
        
                {{ $products->links() }}

            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:  #ffad33;"  >
            <h3>Price & Sales logs</h3>
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
                        <th>price log</th>
                        <th>sales log</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach( $products as $prod )
                        <tr>
                            <td> {{ $prod->id }} </td>
                            <td> {{ $prod->name }} </td>
                            <td>
                                {{ Form::open(['method' => 'GET', 'route' =>array('price.log.product', $prod->id), ]) }}
                                {{ csrf_field() }}
                                {{ Form::submit('price log', ['class' => 'btn btn-default']) }}                    
                                {{ Form::close() }} 
                            </td>
                            <td>
                                {{ Form::open(['method' => 'GET', 'route' =>array('sales.log.product', $prod->id), ]) }}
                                {{ csrf_field() }}
                                {{ Form::submit('sales log', ['class' => 'btn btn-default']) }}                    
                                {{ Form::close() }} 
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
                </div>
            </div>
            
        </div>
    </div> 
    <div class="row" >
        <div class="col-md-8 col-md-offset-2" >
            <div id="links" >
        
                {{ $products->links() }}

            </div>
        </div>
    </div>   
    
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
            <div class="panel-heading">Add Snack</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('add.product') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('id_add') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="id_add" required autofocus>

                                @if ($errors->has('id_add'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price_add') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price_add" required>

                                @if ($errors->has('price_add'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount_add') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="password" type="text" class="form-control" name="amount_add" required>

                                @if ($errors->has('amount_add'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount_add') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-default" >
                                    Add Snack
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
        </div>
        </div>
        
    </div>

    <!--  
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                <div class="panel-heading">Remove Snack         
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        {{ Form::open(['method' => 'DELETE', 'route' => 'remove.product', ]) }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('snack_id') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                                <input id="snack_id" type="text" class="form-control" name="snack_id" required autofocus>

                                @if ($errors->has('snack_id'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('snack_id') }}</strong>
                                    </span>
                                @endif
                            </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                                {{ Form::submit('Delete Snack', ['class' => 'btn btn-default']) }}                    
                                {{ Form::close() }}
                        </div>        
                    </div>
                    </div>                  
                </div>            
            </div>       
        </div>
    </div>
    -->
    

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                <div class="panel-heading">Change Price       
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        {{ Form::open(['method' => 'PUT', 'route' => 'change.product.price', ]) }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('id_chg') ? ' has-error' : '' }}">                            
                            
                            <label for="name" class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                                <input id="snack_id" type="text" class="form-control" name="id_chg" required autofocus>

                                @if ($errors->has('id_chg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_chg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('price_chg') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">Price</label>

                            <div class="col-md-6">
                                <input id="price" type="text" class="form-control" name="price_chg" required>

                                @if ($errors->has('price_chg'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('price_chg') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit('Change Price', ['class' => 'btn btn-default']) }}                    
                            {{ Form::close() }}
                        </div>        
                    </div>

                    </div>
                    
                </div>                  
                </div>            
            </div>       
        </div>
        <div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                <div class="panel-heading">Change Stock Amount         
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        {{ Form::open(['method' => 'PUT', 'route' => 'change.product.amount', ]) }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('id_amt') ? ' has-error' : '' }}">                            
                       
                            <label for="name" class="col-md-4 control-label">ID</label>

                            <div class="col-md-6">
                                <input id="snack_id" type="text" class="form-control" name="id_amt" required autofocus>

                                @if ($errors->has('id_amt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('id_amt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('amount_amt') ? ' has-error' : '' }}">
                            <label for="amount" class="col-md-4 control-label">Amount</label>

                            <div class="col-md-6">
                                <input id="amount" type="text" class="form-control" name="amount_amt" required>

                                @if ($errors->has('amount_amt'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('amount_amt') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                    <div class="form-group">
                        <div class="col-md-6 col-md-offset-4">
                            {{ Form::submit('Change Amount', ['class' => 'btn btn-default']) }}                    
                            {{ Form::close() }}
                        </div>        
                    </div>

                    </div>
                    
                </div>                  
                </div>            
            </div>       
        </div>
    </div>


</div>
@endsection
