<div class="card">
    @php
        $picture = $property->getPicture();
    @endphp

    <img
        src="{{ $picture ? asset('storage/' . $picture->filename) : asset('images/default.jpg') }}"
        alt="Photo du bien {{ $property->title }}"
        class="w-100"
    >

    <div class="card-body">
        <h5 class="card-title text-danger">
            <a href="{{ route('property.show', ['slug' => $property->getSlug(), 'property' => $property]) }}"class="text-dark">
                {{ $property->title }}
            </a>
        </h5>

        <p class="card-text">
            {{ $property->surface }}m² - {{ $property->city }} ({{ $property->postal_code }})
        </p>

        <div class="text-danger fw-bold" style="font-size: 1.4rem;">
            {{ number_format($property->price, 0, ',', ' ') }} $
        </div>
    </div>
</div>