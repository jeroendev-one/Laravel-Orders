@extends('layouts.app')
@section('title', '- Order lijst')

<div class="container">
<br>
<h2 style="color: white;">Order lijst</h2>
<br>
<table class="table table-light table-bordered">
<thead class="thead-dark">
<tr>
<th scope="col"> Naam </th>
<th scope="col"> Restaurant </th>
<th scope="col"> Bestelling </th>
<th scope="col"> Bedrag </th>
</tr>
</thead>
<tbody>
@foreach ($orders as $order)
<tr>
<td>{{ $order->naam }}</td>
<td>{{ $order->restaurant }}</td>
<td>{{ $order->bestelling }}</td>
<td>&euro; {{ $order->amount }}</td>
@endforeach
</tr>

</tbody>
</table>
</div>
