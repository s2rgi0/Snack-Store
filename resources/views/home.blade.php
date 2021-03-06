@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row" >
                        <form method="get" action="{{ route('search.product') }}">
                            {{ csrf_field() }}    

                        
                        <div class="col-md-5">
                            <input class="form-control" style="width: 300px;" type="" name="search_snack">    
                        </div>
                        <div class="col-md-2">
                            <button class="btn btn-default" >Search</button>
                            </form>
                        </div>
                        <div class="col-md-3">
                            <form method="get" action="popular_Snacks" >
                                <button class="btn btn-default" >Most Popular</button>    
                            </form>
                        </div>
                            
                            
                    </div>
                            
                </div>                           
            </div>
    </div>
                       
                    
       
    

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Welcome to Snack Store  </div>

                <div class="panel-body">

                    <div class="row">
                        
                        @foreach( $products as $prod )
                            <div class="col-md-4">
                                <p style="margin-top: 20px;margin-bottom: 20px;" >
                                <strong>{{ $prod->name }}</strong>
                                <P>Price : ${{ $prod->price }} </P>
                                <div>Likes :  {{ $prod->likes }}</div>
                                <div class="col-md-12">
                                    <br>
                                    <div class="row">
                                        <div class="col-md-3" >
                                            <div style="float: right;">
                                                <a href="/snack/{{ $prod->id }}" style="text-decoration: none" class="btn btn-sm btn-default" >Buy</a>  
                                            </div>
                                             
                                        </div>
                                        <div class="col-md-2" >
                                            <div style="float: left;" >
                                    {{ Form::open(['method' => 'POST', 'route' => 'like.snack', ]) }}
                                    {{ csrf_field() }}
                                    <input type="hidden" name="snack_id" value="{{ $prod->id }}" >
                                    <input type="hidden" name="user_id" value="{{ Auth::user()->id }}" >

                                    {{ Form::submit('Like', ['class' => 'btn btn-sm btn-default']) }}  
                                    {{ Form::close() }}
                                            </div>
                                                  
                                        </div>
                                         
                                                        
                                    
                                    
                                    </div>
                                   
                                        
                                </div>
                                
                                </p>
                                
                            </div>
                            
                        @endforeach

                    </div>
                        
                        
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
        


</div>

@endsection
