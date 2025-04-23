<h2>Nearby Facilities</h2>
<ul>
@foreach($facilities as $facility)
    <li>{{ $facility->name }} - {{ $facility->type }} - {{ $facility->contact }}</li>
@endforeach
</ul>
