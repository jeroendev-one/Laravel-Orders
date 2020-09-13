<h2> Bestelling </h2>
Restaurant: {{ $order->restaurant }}
<br>
Bestelling: {{ $order->bestelling }}
<br>
Bedrag: &euro; {{ $amount }}

<hr>
<h3> Betaal links </h3>
Tikkie link: <a href="{{ $tikkieLink }}">Tikkie</a><br>
<br>
PayPal link: <a href="{{ $paypalLink }}/{{ $amount }}">PayPal</a>
<br>
