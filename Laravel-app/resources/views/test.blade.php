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
        @if(session()->has('alert'))
      <div class="notification is-success">
          {{ session('alert') }}
      </div>
      @endif
        <div class="card">
        <header class="card-header">
            <p class="card-header-title">Movies</p>
        </header>
        <div class="card-content">
            <div class="content">
                <table class="table is-hoverable">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($movies as $movie)
                            <tr>
                                <td>{{ $movie->id }}</td>
                                <td><strong>{{ $movie->title }}</strong></td>
                                <!-- la méthode route qui génère une url peut être accompagnée d’un paramètre, par exemple route(‘movies.show’, $movie->id) permet de générer l’url de la forme …/movies/id -->
                                <td><a class="button is-primary" href="{{ route('movies.show', $movie->id) }}">See</a></td>
                                <td><a class="button is-warning" href="{{ route('movies.edit', $movie->id) }}">Edit</a></td>
                                <td>
                                <!-- les formulaire HTML ne supportent pas les verbes PUT, PATCH et DELETE, on doit utiliser le verbe POST et prévoir dans le formulaire un input caché qui indique le verbe à utiliser en réalité -->
                                    <form action="{{ route('movies.destroy', $movie->id) }}" method="post">
                                        @csrf
                                        @method('DELETE')
                                        <button class="button is-danger" type="submit">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
        </div>
    </main>
  </body>
</html>