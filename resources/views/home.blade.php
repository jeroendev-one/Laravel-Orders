@extends('layouts.app')
@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="contact-clean">
            <form action="{{ action('OrderController@createOrder') }}" method="post">
                @csrf
                <div class="form-group">
                <input class="form-control" type="hidden" name="naam" value="{{ auth()->user()->name }}" required></div>
                <div class="form-group">
                <input class="form-control" type="hidden" name="email" value="{{ auth()->user()->email }}" required></div>
                <div class="form-group" oninvalid="this.setCustomValidity('Selecteer het restaurant')" required>

                <label for="restaurant">Waar je wilt bestellen.</label>
                    <select class="form-control" name="restaurant" id="restaurant" required>
                        <option value="">Restaurant</option>
                        <option value="De Broodbode">De Broodbode</option>
                        <option value="De Waag">De Waag</option>
                        <option value="Dominos">Dominos</option>
                    </select>
                </div>

                <div class="form-group">
                <label for="bestelling">Meerdere items met een '+' toevoegen.</label>
                <input class="form-control" name="bestelling" placeholder="Bestelling" rows="14" oninvalid="this.setCustomValidity('Voer je bestelling in.')" required></textarea></div>
                <div class="form-group"><button class="btn btn-primary btn-block" type="submit"><i
                            class="fas fa-check-circle"></i>&nbsp;Plaats bestelling</button></div>
                @if(session()->has('message'))
                    <div class="alert alert-success" role="alert">
                        {{ session()->get('message') }}
                    </div>
                @endif
                <a href="{{ route('allOrders') }}">Bestellijst vandaag</a>
            </form>
        </div>
    </div>
</div>
@endsection
