@extends('layouts.app')
@section('title', '- Order lijst')
@section('content')
<div class="container">

    <table class="table table-light table-bordered">
        <thead class="thead-dark" style="border-color: #dee2e6;!important">
            <tr>
                <th scope="col"> Naam </th>
                <th scope="col"> Restaurant </th>
                <th scope="col"> Bestelling </th>
                <th scope="col"> Bedrag </th>
                <th scope="col"> Betaald </th>
                <th scope="col"> Datum </th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
                <tr>
                    <td scope="row">{{ $order->naam }}</td>
                    <td>{{ $order->restaurant }}</td>
                    <td>{{ $order->bestelling }}</td>
                    <td>&euro; {{ $order->amount }}</td>
                    @if ($order->paid == '0')
                    <td><i class="fa fa-window-close"></i></td>
                    @else
                    <td><i class="fas fa-check"></i></td>
                    @endif
                    <td>{{ $order->datum }}</td>
            @endforeach
                </tr>

        </tbody>
    </table>
</div>
@endsection