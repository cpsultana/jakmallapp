@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    {!!Form::open(['action' => ['OrdersController@update', $id], 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::text('id', $id, ['class' => 'form-control', 'placeholder' => 'Order no.'])}}
        </div>
        {{Form::submit('Pay now', ['class' => 'btn btn-primary'])}}
        {{Form::hidden('_method', 'PUT')}}
    {!!Form::close()!!}
@endsection