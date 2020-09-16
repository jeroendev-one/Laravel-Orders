<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order list
        </h2>
    </x-slot>
    <div class="py-10">
        <div class="max-w-8xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @livewire('order-list')
            </div>
        </div>
    </div> 
</x-app-layout>
