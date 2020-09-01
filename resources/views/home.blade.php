@extends('layouts.app')
@section('title', '- Home')
<div class="contact-clean">

        <form action="{{ action('OrderController@createOrder') }}" method="post">
        @csrf
            <h2 class="text-center">&nbsp;Bestel formulier</h2>
            <div class="form-group"><input class="form-control" type="text" name="naam" placeholder="Naam" required></div>
                <div class="form-group"><input class="form-control" type="email" name="email" placeholder="E-mail adres" required></div>
            <div class="form-group">
                <select class="form-control" name="restaurant" id="restaurant">
                    <option value="" selected disabled hidden>Restaurant</option>
                    <option value="De Broodbode">De Broodbode</option>
                    <option value="De Waag">De Waag</option>
                </select></div>

            <div class="form-group"><input class="form-control" name="bestelling" placeholder="Bestelling" rows="14" oninvalid="this.setCustomValidity('Voer je bestelling in')" required></textarea></div>
            <div class="form-group"><button class="btn btn-primary btn-block" type="submit"><i class="fas fa-check-circle"></i>&nbsp;bestelling plaatsen</button></div>
            @if(session()->has('message'))
            <div class="alert alert-success" role="alert">
            {{ session()->get('message') }}
            </div>
            @endif
            <a href="{{ route('listOrder') }}">Bestellijst vandaag</a>
        </form>
</div>