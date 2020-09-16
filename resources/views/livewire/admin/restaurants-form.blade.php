<div class="contact-clean">

<form wire:submit.prevent="submit" id="restaurantsForm">

    <div class="form-group">
    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Restaurant name</label>
    <input type="text" class="form-control" id="name" placeholder="Restaurant name" wire:model="name">
    </div>

        <label class="block text-gray-700 text-sm font-bold mb-2" for="enabled">Enabled?</label>
        <select class="form-control" name="enabled" id="enabled" oninvalid="this.setCustomValidity('Choose.')" wire:model="enabled" required>
                    <option value="">Choose</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
        </select>
  
    <div class="form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="site_url">Site URL</label>
        <div id="dynamicInput">
        <input type="text" class="form-control" id="site_url" placeholder="Site URL" wire:model="site_url">
        </div>
    </div>

    <div class="form-group">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="time_closed">Time Closed</label>
        <div id="dynamicInput">
        <input type="text" class="form-control" id="time_closed" placeholder="Time closed" wire:model="time_closed">
        </div>
    </div>
  
    <button type="submit" class="bg-indigo-700 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" onclick="submitForm()">Add restaurant</button>
    <div>
    @include('messages.success')
    </div>
</form>
</div>
