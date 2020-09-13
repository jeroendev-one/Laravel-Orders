<div class="contact-clean">
<form wire:submit.prevent="submit" id="orderForm">

    <div class="form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">Restaurant</label>
        <select class="form-control" name="restaurant" id="restaurant" oninvalid="this.setCustomValidity('Selecteer het restaurant.')" wire:model="restaurant" required>
                    <option value="">Restaurant</option>
                    <option value="De Broodbode">De Broodbode</option>
                    <option value="De Waag">De Waag</option>
        </select>
        @error('restaurant') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <div class="form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="bestelling">Bestelling</label>
        <input type="text" class="form-control" id="bestelling" placeholder="Je bestelling" wire:model="bestelling" oninvalid="this.setCustomValidity('Bestelling kan niet leeg zijn.')">
        @error('bestelling') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
  
    <button type="submit" class="bg-indigo-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="submitForm()">Place order</button>
    <div>
    @include('messages.success')
    </div>
</form>
</div>
