<div class="my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
    <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
    <div class="flex justify-between">


<!--Dropdown Menu -->
<div class="mb-8 bg-red">
            <select name="date" wire:model="date" class="p-2 px-4 py-2 pr-8 leading-tight bg-blue border border-gray-400 rounded shadow appearance-none hover: focus:outline-none focus:shadow-outline">
                <option value=''>Choose a date</option>
                @foreach($orderDates as $date)
                <option value={{ $date }}>{{ $date}}</option>
                @endforeach
            </select>

<!-- End Dropdown Menu -->
    @if($updateMode)
            @include('livewire.order-update')
    @endif
        @include('messages.success')
        @include('messages.error')
        </div>
    </div>
</div>

<div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
    <table class="min-w-full">
        <thead>
            <tr>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Naam</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Restaurant</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Bestelling</th>
		        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Bedrag</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Betaald</th>
                <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Datum</th>
                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
            </tr>
        </thead>
        <tbody class="bg-white">
            @foreach ($orders as $order)
            <tr>
                <td class="px-6 py-4 whitespace-no-wrap border-b ">
                    <div class="text-sm leading-5 text-blue-900">{{ $order->name }}</div>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">{{ $order->restaurant }}</td>
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">{{ $order->bestelling }}</td>
		        @if ($order->amount != 0)
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">&euro; {{ $order->amount }}</td>
                @else
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">---</td>
                @endif
                <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900  text-sm leading-5">
                    <span class="relative inline-block px-3 py-1 font-semibold text-green-900 leading-tight">
                        @if ($order->paid != 0)
                        <span aria-hidden class="absolute inset-0 bg-green-200 opacity-50 rounded-full"></span>
                        <span class="relative text-xs">Yes</span>
                        @else
                        <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                        <span class="relative text-xs">No</span>
                        @endif
                    </span>
                </td>
                <td class="px-6 py-4 whitespace-no-wrap border-b  text-blue-900 text-sm leading-5">{{ $order->datum }}</td>
                @if (Auth::user()->name == $order->name)
                    @if (\App\Models\Order::where(['id' => $order->id])->value('created_at')->isToday())
                        @if (\Carbon\Carbon::now()->lt(\Carbon\Carbon::parse(\App\Models\Restaurant::where(['name' => $order->restaurant])->value('time_closed'))))
                <td class="px-6 py-4 whitespace-no-wrap text-right border-b  text-sm leading-5">
                <button wire:click="edit({{ $order->id }})" class="px-4 py-2 border-yellow-500 border text-yellow-500 rounded transition duration-300 hover:bg-yellow-500 hover:text-white focus:outline-none">Edit</button>
                <button onclick="confirm('Are you sure you want to delete this order?') || event.stopImmediatePropagation()" wire:click="deleteOrder({{ $order->id }})" class="px-5 py-2 border-red-500 border text-red-500 rounded transition duration-300 hover:bg-red-700 hover:text-white focus:outline-none">Delete</button>
                </td>
                        @endif
                    @endif
                @endif
                @endforeach
                <p class="px-6 py-4 text-blue-900 text-large"> Total: {{ count($orders) }} </p>
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
