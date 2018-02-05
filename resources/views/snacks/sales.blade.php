@extends('layouts.app')

@section('content')

	<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:  #ffad33;"  >
            <h3>Sales Log for {{ $snack->name }}</h3>
        </div>
    </div>
	<div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                <thead>
                    <tr>
                        <th>user id</th>
                        <th>product id</th>
                        <th>amount</th>
                        <th>date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach( $sales as $sale )
                        <tr>
                            <td> {{ $sale->user_id }} </td>
                            <td> {{ $sale->product_id }} </td>
                            <td> {{ $sale->amount }} </td>
                            <td> {{ $sale->created_at }} </td>
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
        
                {{ $sales->links() }}

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:  #ffad33;"  >
            <a href="/admin" class="btn btn-default" >Go Back</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" style="color:  #ffad33;"  >
            <h3>General Sales</h3>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-md-offset-2" >
            <div class="panel panel-default">
                <div class="panel-body">
                    <table class="table table-hover">
                <thead>
                    <tr>
                        <th>user id</th>
                        <th>product id</th>
                        <th>amount</th>
                        <th>date</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach( $grl_sales as $sale )
                        <tr>
                            <td> {{ $sale->user_id }} </td>
                            <td> {{ $sale->product_id }} </td>
                            <td> {{ $sale->amount }} </td>
                            <td> {{ $sale->created_at }} </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>        
                </div>
            </div>
            
        </div>
    </div>
<<<<<<< HEAD
=======

>>>>>>> 0ca1ad266965ab61a46ce8969d1dc77282b89fe0

	</div>
	

@endsection
