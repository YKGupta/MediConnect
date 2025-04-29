<style>
    .heading{
        font-size: 25px;
        font-weight: bold;
        margin-bottom: 20px;
    }
</style>

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="heading">Your Reported Emergencies</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($emergencies->isEmpty())
                        <p>You have not reported any emergencies yet.</p>
                    @else
                        @foreach ($emergencies as $e)
                            <div class="py-4 {{ !$loop->last ? 'border-b-2' : '' }}">
                                <strong>Type:</strong> {{ $e->type }}<br>
                                <strong>Location:</strong> {{ $e->location }}<br>
                                <strong>Status:</strong> {{ ucfirst($e->status) }}
                            </div>
                        @endforeach
                    @endif

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
