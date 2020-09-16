<form>
    <div class="form-group">
        <input type="hidden" wire:model="order_id">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="bestelling">Bestelling:</label>
        <input type="text" class="form-control" wire:model="bestelling" id="bestelling" placeholder="Bestelling">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="restaurant">restaurant</label>
        <select class="form-control" name="restaurant" id="restaurant" oninvalid="this.setCustomValidity('Choose.')" wire:model="restaurant" placeholder="Restaurant" required>

        </select>
    </div>
    <button wire:click.prevent="update()" class="px-5 py-2 border-green-500 border text-green-500 rounded transition duration-300 hover:bg-green-500 hover:text-white focus:outline-none">Update</button>
    <button wire:click.prevent="cancel()" class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">Cancel</button>
</form>