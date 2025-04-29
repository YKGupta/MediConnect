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
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h2 class="heading">All Reported Emergencies</h2>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">

                    @if($emergencies->isEmpty())
                        <p>No emergencies reported.</p>
                    @else
                        @foreach ($emergencies as $e)
                            <div class="py-4 {{ !$loop->last ? 'border-b-2' : '' }} flex items-center justify-between">
                                <div class="details">
                                    <strong>User:</strong> {{ $e->user->name }} <br>
                                    <strong>Type:</strong> {{ $e->type }}<br>
                                    <strong>Location:</strong> {{ $e->location }}<br>
                                    <strong>Status:</strong> {{ ucfirst($e->status) }}<br>
                                </div>

                                <form method="POST" action="{{ route('emergency.update.status', $e->id) }}" class="flex flex-col gap-4">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select mt-2 rounded-lg">
                                        <option value="pending" @selected($e->status === 'pending')>Pending</option>
                                        <option value="assigned" @selected($e->status === 'assigned')>Assigned</option>
                                        <option value="resolved" @selected($e->status === 'resolved')>Resolved</option>
                                    </select>
                                    <x-primary-button class="ms-3">
                                        {{ __('Update Status') }}
                                    </x-primary-button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
