@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if(count($orders) > 0)
        @foreach ($orders as $order)
            <div class="well">
                @if(!empty($order->mobile_number))
                    <p>{{$order->id}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @convert($order->price)</p>
                    <b>@convert($order->price - 5000) for {{$order->mobile_number}}</b>
                    <hr>
                @else
                    <p>{{$order->id}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; @convert($order->price)</p>
                    <b>{{$order->product_name}} that cost @convert($order->price - 10000)</b>
                    <hr>
                @endif
            </div>
        @endforeach
        {{$orders->links()}}
    @else
        <p>No orders found</p>
    @endif
@endsection