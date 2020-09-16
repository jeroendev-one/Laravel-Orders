
<div class="my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
    <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
    <div class="flex justify-between">
    @if($updateMode)
        @include('livewire.admin.restaurants-update')
    @endif
    </div>
    </div>
@include('messages.success')
<div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Name</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Site URL</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Time closed</th>
		        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Enabled</th>
                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($restaurants as $restaurant)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b ">
                    <div class="text-sm leading-5 text-blue-900">{{ $restaurant->name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">{{ $restaurant->site_url }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">{{ $restaurant->time_closed }}</td>
		        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">
                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                        @if ($restaurant->enabled != 0)
                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                        <span class="relative text-xs">Yes</span>
                        @else
                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                        <span class="relative text-xs">No</span>
                        @endif
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap text-right text-sm leading-5">
                <button wire:click="edit({{ $restaurant->id }})" class="px-5 py-2 border-yellow-500 border text-yellow-500 rounded transition duration-300 hover:bg-yellow-500 hover:text-white focus:outline-none">Edit</button>
                <button onclick="confirm('Are you sure you want to delete this order?') || event.stopImmediatePropagation()" wire:click="deleteOrder({{ $restaurant->id }})" class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">Delete</button>
                </td>
                @endforeach
            </tr>
        </tbody>
    </table>
    <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
        <div>
            <nav class="relative z-0 inline-flex shadow-sm">
                <div v-if="pagination.current_page < pagination.last_page">        
                </div>
            </nav>
        </div>
    </div>
</div>
