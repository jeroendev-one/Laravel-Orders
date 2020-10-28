<div class="contact-clean">

<form wire:submit.prevent="submit" id="orderForm">
@foreach ($restaurants as $restaurant)
@if ($restaurant->enabled == "1")
    @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($restaurant->time_closed)))
    <h4 class="block text-gray-700 text-sm font-bold mb-2"> {{ $restaurant->name }}:<a class="text-red-500"> gesloten</a></h3>
    @else
    <h4 class="block text-gray-700 text-sm font-bold mb-2"> {{ $restaurant->name }}: <a class="text-green-500"> open </a></h3>
    @endif
@endif
@endforeach
    <div class="form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">Restaurant</label>
        <select class="form-control" name="restaurant" id="restaurant" oninvalid="this.setCustomValidity('Selecteer het restaurant.')" wire:model="restaurant" required>
                    <option value="">Restaurant</option>
                    
                    @foreach ($restaurants as $restaurant)
                    @if ($restaurant->enabled == "1")
                        @if (\Carbon\Carbon::now()->gt(\Carbon\Carbon::parse($restaurant->time_closed)))
                        <option disabled value="{{ $restaurant->name }}">{{ $restaurant->name }}</option>
                        @else
                        <option value="{{ $restaurant->name }}">{{ $restaurant->name }}</option>
                        @endif
                    @endif
                    @endforeach
        </select>
        @error('restaurant') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <div class="form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="bestelling">Bestelling</label>
        <div id="dynamicInput">
        <input style="text-transform: capitalize;" type="text" class="form-control" id="bestelling" placeholder="Je bestelling" wire:model="bestelling" oninvalid="this.setCustomValidity('Bestelling kan niet leeg zijn.')">
        @error('bestelling') <span class="text-danger">{{ $message }}</span> @enderror
        </div>
    </div>
  
    <button type="submit" class="bg-indigo-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="submitForm()">Place order</button>
    <div>
    @include('messages.success')
    </div>
</form>
</div>
