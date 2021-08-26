<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Movies</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.9.0/css/bulma.min.css">
    @yield('css')
  </head>
  <body>
    <main class="section">
        <div class="container">
        <div class="card">
        <header class="card-header">
            <p class="card-header-title">Movies</p>
        </header>        
    <div class="card">
        <header class="card-header">
            <p class="card-header-title">Titre : {{ $movie->title }}</p>
        </header>
        <div class="card-content">
            <div class="content">
                <p>Year of release : {{ $movie->year }}</p>
                <hr>
                <p>{{ $movie->description }}</p>
            </div>
        </div>
    </div>
    </main>
  </body>
</html>