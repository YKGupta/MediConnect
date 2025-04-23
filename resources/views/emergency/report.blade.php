<form action="/emergency/report" method="POST">
    @csrf
    <label>Type of Emergency</label>
    <input type="text" name="type" required>

    <label>Your Location</label>
    <input type="text" name="location" required>

    <button type="submit">Report Emergency</button>
</form>
