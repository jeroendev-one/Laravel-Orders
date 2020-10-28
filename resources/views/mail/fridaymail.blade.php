<p><b><i> Geautomatiseerd bericht vanuit {{ env('APP_NAME') }} </i></b></p>
<p>Vandaag gaan we eten bestellen bij @foreach ($restaurants as $restaurant) @if ($loop->last) {{ $restaurant->name }}. @else {{ $restaurant->name }} &  .@endif  @endforeach</p>
<p>De bestelling kan je doorgeven in het <a href="{{ env('APP_URL') }}">bestelsysteem.</a></p>

<hr>
<h3> Restaurants: </h3>
@foreach ($restaurants as $restaurant)
<p><a href="{{ $restaurant->site_url }}">{{ $restaurant->name }} </a> (Tot {{$restaurant->time_closed }})</p>
@endforeach

