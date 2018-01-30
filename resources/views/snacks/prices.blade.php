@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:  #ffad33;"  >
            <h3>Price Log for {{ $snack->name }}</h3>
        </div>
    </div>

		<div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                <thead>
                    <tr>
                        
                        <th>price</th>
                        <th>date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach( $prices as $price )
                        <tr>
                            <td> {{ $price->price }} </td>
                            <td> {{ $price->created_at }} </td>
                        
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
        
                {{ $prices->links() }}

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:  #ffad33;"  >
            <a href="/admin" class="btn btn-default" >Go Back</a>
        </div>
    </div>
        
	</div>

    
	

@endsection