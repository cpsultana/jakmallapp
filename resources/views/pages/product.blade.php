@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    {!!Form::open(['action' => 'OrdersController@store', 'method' => 'POST'])!!}    
        <div class="form-group">
            {{Form::text('product_name', '', ['class' => 'form-control', 'placeholder' => 'Product'])}}
            {{Form::textarea('shipping_address', '', ['class' => 'form-control', 'placeholder' => 'Shipping Address'])}}
            {{Form::text('price', '', ['class' => 'form-control', 'placeholder' => 'Price'])}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection