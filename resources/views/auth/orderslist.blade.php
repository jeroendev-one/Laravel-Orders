@extends('layouts.app')
@section('title', '- Order lijst')
@section('content')
<div class="container">
    <br>
    <h2>{{ $date }}</h2>
    <br>
    <table class="table table-light table-bordered">
        <thead class="thead-dark" style="border-color: #dee2e6;!important">
            <tr>
                <th scope="col"> Naam </th>
                <th scope="col"> Restaurant </th>
                <th scope="col"> Bestelling </th>
                <th scope="col"> Bedrag </th>
                <th scope="col"> PayPal </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td scope="row">{{ $order->naam }}</td>
                    <td>{{ $order->restaurant }}</td>
                    <td>{{ $order->bestelling }}</td>
                    @if($order->amount == 0)
                        <td> -- </td>
                        <td> -- </td>
                    @else
                        <td>&euro; {{ $order->amount }}</td>
                        <td><a href="https://paypal.me/jeroendv9/{{ $order->amount }}"></a></td>
                    @endif
            @endforeach
            </tr>

        </tbody>
    </table>
</div>
@endsection