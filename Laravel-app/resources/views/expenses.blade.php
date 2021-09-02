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
  @if(session()->has('user-alert'))
  <div class="alert alert-primary" role="alert">
    {{ session('user-alert') }}
</div>
@endif
  <!-- EXPENSES TABLE    -->
  <div class="container-fluid px-5">
  <div class="row">
    <div class="col-11">
      <h2>Expenses</h2>
    </div>
    <div class="col-1">
      <a class="btn btn-outline-primary btn-sm fs-3" href="{{ route('expenses.create') }}">+</a>
    </div>
</div>
<table class="table table-light table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Amount</th>
      <th scope="col">Category</th>
      <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    @foreach($expenses as $expense)
    <tr>
      <th scope="row">{{ $line ++ }}</th>
      <td>{{ $expense->date }}</td>
      <td>{{ $expense->title }}</td>
      <td>{{ $expense->amount }} €</td>
      <td>{{ $expense->category }}</td>
      <td>
      <a class="btn" href="{{ route('expenses.edit', $expense->id) }}"><i class="fas fa-edit"></i></a>
        <form action=" {{ route('expenses.destroy', $expense->id) }} " method="post">
          @csrf
          @method('DELETE')
          <button class="btn" type="submit"><i class="far fa-trash-alt"></i></button>
        </form>
      </td>
    </tr>
    @endforeach
  </tbody>  
</table>  

<!-- TOTAL EXPENSES -->
<p class="btn btn-light pl-4">Total : {{ $total_ex }} €</p>

<!-- CATEGORIES -->
<div class="container-fluid mt-4">
  <div class="row">
    <div class="col">
      <h2>Categories</h2>
    </div>
</div>


    <div class="row">
    @foreach ($sum_categories as $sum_cat)
        <p>{{$sum_cat->sum('amount')}} €</p>
  
    @endforeach  

</div>

</main>
    
</body>
</html>