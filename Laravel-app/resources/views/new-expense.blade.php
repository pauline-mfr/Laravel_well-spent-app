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
<div class="row position-absolute top-0 end-0  p-4 ">
<div class="col">
  <!-- BTN RETURN -->
  <a class="btn" href=" {{ URL::previous() }}"><i class="fas fa-arrow-circle-left text-light fs-2"></i></a>
</div>
<div class="col">
<!-- BTN HOME -->
<a class="btn" href=" {{ route('homepage') }}"><i class="fas fa-landmark text-light fs-2"></i></a>
</div>
</div>
<main>

<!-- EXPENSES FORM -->
<div class="expenses-form mx-auto w-50">
<h2>Add</h2>
    <form action="{{ route('expenses.store') }}" method="POST">
        @csrf
  <div class="mb-3">
    <label for="date" class="form-label text-primary">Date </label>
    <input type="date" step="any" name="date" class="form-control" >
    <label for="title" class="form-label text-primary">Title </label>
    <input type="text" step="any" name="title" class="form-control" >
    <label for="amount" class="form-label text-primary">Amount </label>
    <input type="number" step="any" name="amount" class="form-control"><br>
    <label for="new_category" class="form-label text-primary">New category</label>
    <input type="text" step="any" name="new_category" class="form-control"><br>

    <!-- TEST SELECT -->
    <select class="form-select" aria-label="Default select example" name="category">
      <option selected>Select a category</option>
    @foreach ($categories as $category)
       <option value="{{ $category->category }}">{{ $category->category }}</option>
    @endforeach 
    </select>

  </div>
  <div class="mb-3">
    <input type="submit" value="Add" name="submit" class="btn btn-primary">
    </div>
</form>
    </div>
</main>    
</body>
</html>