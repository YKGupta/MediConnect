<h2>All Reported Emergencies</h2>

@foreach ($emergencies as $emergency)
    <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
        <strong>{{ $emergency->type }}</strong><br>
        Location: {{ $emergency->location }}<br>
        Status: {{ $emergency->status }}<br>
        Reported by: User #{{ $emergency->user_id }}

        <form method="POST" action="/admin/emergencies/{{ $emergency->id }}/status">
            @csrf
            <select name="status">
                <option value="pending" {{ $emergency->status === 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="assigned" {{ $emergency->status === 'assigned' ? 'selected' : '' }}>Assigned</option>
                <option value="resolved" {{ $emergency->status === 'resolved' ? 'selected' : '' }}>Resolved</option>
            </select>
            <button type="submit">Update</button>
        </form>
    </div>
@endforeach
