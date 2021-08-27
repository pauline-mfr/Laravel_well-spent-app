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
  <div class="card">
        <header class="card-header">
            <p class="card-header-title">Add a movie</p>
        </header>
        <div class="card-content">
            <div class="content">
                <form action="{{ route('movies.store') }}" method="POST">
                    @csrf
                    <div class="field">
                        <label class="label">Title</label>
                        <div class="control">
                          <input class="input @error('title') is-danger @enderror" type="text" name="title" value="{{ old('title') }}" placeholder="Titre du film">
                        </div>
                        @error('title')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Year</label>
                        <div class="control">
                          <input class="input" type="number" name="year" value="{{ old('year') }}" min="1950" max="{{ date('Y') }}">
                        </div>
                        @error('year')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <label class="label">Description</label>
                        <div class="control">
                            <textarea class="textarea" name="description" placeholder="Description">{{ old('description') }}</textarea>
                        </div>
                        @error('description')
                            <p class="help is-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="field">
                        <div class="control">
                          <button type="submit" class="button is-link">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </body>
</html>