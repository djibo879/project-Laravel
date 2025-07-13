@extends('base')

@section('title', 'Tous nos biens')

@section('content')
<div class="bg-light p-5 mb-5 text-center">
  <form action="" method="get" class="container d-flex gap-2">
    <input
      type="number"
      placeholder="Budget max"
      class="form-control"
      name="price"
      value="{{ $input['price'] ?? '' }}"
    >
    <input
      type="number"
      placeholder="surface min"
      class="form-control"
      name="surface"
      value="{{ $input['surface'] ?? '' }}"
    >
     <input
      type="number"
      placeholder="nombre de piece min"
      class="form-control"
      name="rooms"
      value="{{ $input['rooms'] ?? '' }}"
    >
    <input
      
      placeholder="mot clé"
      class="form-control"
      name="title"
      value="{{ $input['title'] ?? '' }}"
    >
    <button class="btn btn-primary btn-sn flex-grow-0">Rechercher</button>
  </form>
</div>



<div class="container">
    <div class="row">
        @forelse($properties as $property)
            <div class="col-3 mb-4">
                @include('property.card')
            </div>
            @empty
            <div class="col">
               Aucun article ne correspond a votre recherche 
            </div>
        @endforelse
    </div>

    <div class="my-4">
        
            {{ $properties->links() }}
        
    </div>
</div>

@endsection