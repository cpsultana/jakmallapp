@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    {!!Form::open(['action' => 'OrdersController@store', 'method' => 'POST'])!!}
        <div class="form-group">
            {{Form::text('mobile_number', '', ['class' => 'form-control', 'placeholder' => 'Mobile Number'])}}
            {{Form::select('price', array('10000' => 'Rp. 10.000,-', '50000' => 'Rp. 50.000,-', '100000' => 'Rp. 100.000,-'), '10000')}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection