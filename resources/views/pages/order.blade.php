<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Order form
        </h2>
    </x-slot>
    <div class="py-6">
        <div class="max-w-2xl mx-auto sm:px-2 lg:px-2">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
            @livewire('order-form')
            </div>
        </div>
    </div>
</x-app-layout>