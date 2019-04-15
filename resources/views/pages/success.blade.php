@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>
    @if($order->mobile_number !== '')                   
        <table>
            <tr>
                <td><b>Order no.</b></td>
                <td><b>{{$order->id}}</b></td>
            </tr>
            <tr>
                <td><b>Total</b></td>
                <td><b>Rp. {{$order->price}}</b></td>
            </tr>
        </table>

        <p>Your mobile phone number {{$order->mobile_number}} will receive Rp. {{$order->price}}</p>
        <br>
        <p>only after you pay.</p>
    @else                   
        <table>
            <tr>
                <td><b>Order no.</b></td>
                <td><b>{{$order->id}}</b></td>
            </tr>
            <tr>
                <td><b>Total</b></td>
                <td><b>Rp. {{$order->price}}</b></td>
            </tr>
        </table>

        <p>
            {{$order->product_name}} that cost Rp. {{$order->price}} will be shipped to:
            <br>
            {{$order->shipping_address}}
            <br>
        </p>
        <p>only after you pay.</p>
    @endif

    {!!Form::open(['action' => 'PagesController@payment', 'method' => 'POST'])!!}
        {{Form::hidden('id', $order->id)}}
        {{Form::submit('Pay now', ['class' => 'btn btn-primary'])}}
    {!!Form::close()!!}
@endsection