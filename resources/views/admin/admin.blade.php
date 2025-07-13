<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhLTQi8RAbdZLlL6o3vVMWSktQ0p6b7In1ZL3Jr5Yb6E6Go1IaFkw7cmDA6j6gD" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/css/tom-select.bootstrap5.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/tom-select@2.2.2/dist/js/tom-select.complete.min.js"></script>
      
    <script src="https://unpkg.com/htmx.org@1.9.5"></script>
    <title>@yield('title')|Administration</title>
<style>
  @layer reset{
    button{
      all: unset;
    }
  }
</style>
  </head>
<body>
    <nav class="navbar navbar-expand-lg bg-danger navbar-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="/">Ma maison</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarNav" aria-controls="navbarNav"
            aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    @php
    $route = request()->route()->getName();
    @endphp 
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
       <li class="nav-item">
  <a href="{{ route('admin.property.index') }}"
     @class(['nav-link', 'active' => str_contains($route, 'property.')])>
    Gérer les biens
  </a>
</li>
<li class="nav-item">
  <a href="{{ route('admin.option.index') }}"
     @class(['nav-link', 'active' => str_contains($route, 'option.')])>
    Gérer les options
  </a>
</li>
      </ul>
      <div class="ms-auto">
        @auth
        <ul class="navbar-nav">
    <li class="nav-item">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            @method('delete')
            <button class="nav-link">Se déconnecter</button>
        </form>
    </li>
</ul>
@endauth
      </div>
    </div>

  </div>
</nav>
    <div class="container mt-5">

     @include('shared.flash')

        @yield('content')
    </div>
    <script>
        new TomSelect('select[multiple]', {
    plugins: {
        remove_button: {
            title: 'Supprimer'
        }
    }
});
    </script>
</body>
</html>