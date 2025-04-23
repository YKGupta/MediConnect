<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2>All Reported Emergencies</h2>

                    @if($emergencies->isEmpty())
                        <p>No emergencies reported.</p>
                    @else
                        @foreach ($emergencies as $e)
                            <div class="border-b-2 py-2">
                                <strong>User:</strong> {{ $e->user->name }} <br>
                                <strong>Type:</strong> {{ $e->type }}<br>
                                <strong>Location:</strong> {{ $e->location }}<br>
                                <strong>Status:</strong> {{ ucfirst($e->status) }}<br>

                                <form method="POST" action="{{ route('emergency.update.status', $e->id) }}">
                                    @csrf
                                    @method('PUT')
                                    <select name="status" class="form-select mt-2">
                                        <option value="pending" @selected($e->status === 'pending')>Pending</option>
                                        <option value="assigned" @selected($e->status === 'assigned')>Assigned</option>
                                        <option value="resolved" @selected($e->status === 'resolved')>Resolved</option>
                                    </select>
                                    <button type="submit" class="btn btn-primary mt-2">Update Status</button>
                                </form>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
