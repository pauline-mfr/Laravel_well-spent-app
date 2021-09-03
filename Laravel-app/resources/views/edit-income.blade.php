<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5bf2af5d34.js" crossorigin="anonymous"></script>
    <link href="main.css" rel="stylesheet">
    <title>Index</title>
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#7B68EE" fill-opacity="1" d="M0,288L80,261.3C160,235,320,181,480,154.7C640,128,800,128,960,128C1120,128,1280,128,1360,128L1440,128L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
</svg>
<main>

<!-- INCOMES FORM -->
<div class="expenses-form mx-auto w-50">
    <h2>Edit</h2>
    <form action="{{ route('incomes.update', $income->id) }}" method="POST">
        @csrf
        @method('put')
  <div class="mb-3">
    <input type="hidden" name="is_income" value="1";>
    <label for="date" class="form-label text-primary">Date </label>
    <input type="date" step="any" name="date" class="form-control" value="{{ old('date', $income->date) }}" >
    <label for="title" class="form-label text-primary">Title </label>
    <input type="text" step="any" name="title" class="form-control" value="{{ old('title', $income->title) }}">
    <label for="amount" class="form-label text-primary">Amount </label>
    <input type="number" step="any" name="amount" class="form-control" value="{{ old('amount', $income->amount) }}"><br>
    <label for="category" class="form-label text-primary">New category</label>
    <input type="text" step="any" name="category" class="form-control" value="{{ old('category', $income->category) }}"><br>

  </div>
  <div class="mb-3">
    <input type="submit" value="Edit" name="submit" class="btn btn-primary">
    </div>
</form>
    </div>
</main>    
</body>
</html>