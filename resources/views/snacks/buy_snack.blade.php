@extends('layouts.app')

@section('content')

	<div class="container">

		<div class="row">
        <div class="col-md-8 col-md-offset-2">
            
            <div class="panel panel-default">
                <div class="panel-heading"><h3><strong>{{ $snack->name }}</strong></h3>         
                </div>
                <div class="panel-body">
                    <div class="form-horizontal">
                        {{ Form::open(['method' => 'PUT', 'route' => array('buy.product') , 'id' => 'frm-buy'])  }}
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('snack_id') ? ' has-error' : '' }}">
                        	<div class="col-md-4" >
                        		<label for="name" class="col-md-4 control-label">Price</label>
                             <h4  >${{ $snack->price }}</h4>	
                        	</div>
                            <input type="hidden" name="snack_id" value="{{ $snack->id }}" >
                            <input type="hidden" name="snack_qty" id="snack_qty" value="" >
                            <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >
                            <div class="col-md-4" >
								<label>Quantity</label> 
								<select class="form-control" id="combo-buy" style="width: 80px;">
        							<option value="1">1</option>
        							<option value="2">2</option>
        							<option value="3">3</option>
        							<option value="4">4</option>
        							<option value="5">5</option>
        							<option value="6">6</option>
        							<option value="7">7</option>
        							<option value="8">8</option>
        							<option value="9">9</option>
        							<option value="10">10</option>
      							</select>
							</div>
						<div class="col-md-4 ">
                                {{ Form::submit('Buy Snack', ['class' => 'btn btn-default buy-snack']) }}                    
                                {{ Form::close() }}
                        </div>
                    </div>
                    <div class="form-group">
                                
                    </div>
                    </div>                  
                </div>            
            </div>       
        </div>
    </div>
	</div>
	

@endsection