<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5bf2af5d34.js" crossorigin="anonymous"></script>
    <link href="main.css" rel="stylesheet">
    <title>Bank App</title>
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#7B68EE" fill-opacity="1" d="M0,288L80,261.3C160,235,320,181,480,154.7C640,128,800,128,960,128C1120,128,1280,128,1360,128L1440,128L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
</svg>

<main>      
    
    <div class="text-center mb-5">    
        <h2 class="display-6">This month</h2>      
    </div>  

    <div class="container text-light" style="width: 80%; height: 250px; border-radius: 21px 21px 0 0; background-color: #7B68ee">
  <div class="row align-items-center mx-auto text-center pt-4">
    <div class="col">
    <a class="text-light text-decoration-none" href="{{ route('incomes.index') }}">
    <p class="display-6">Incomes</p><br>
    <p class="display-6">{{ $total_in }} €</p>
  </a>
    </div>
    <div class="col">
      <a class="text-light text-decoration-none" href="{{ route('expenses.index') }}">
        <p class="display-6">Expenses</p><br>
        <p class="display-6">{{ $total_ex }} €</p>
      </a>        
    </div>
    <div class="col">
    <p class="display-6">Balance</p><br>
    <p class="display-6">{{ $balance }} €</p>
    </div>
  </div>
 </div>

 <!-- TEST SELECT  -->
 <div class="container text-light mt-4 mb-5" style="width: 80%; height: 70px; border-radius: 21px 21px 0 0; background-color: #7B68ee">
 <p class="display-6">Check back</p>
 <form action="{{ route('expenses.month') }}" method="GET">
 <select class="form-select" aria-label="Default select example" name="selected_month">
      <option selected>Select a month</option>
    @foreach ($recorded_months as $recorded_month)
    
       <option value="{{ $recorded_month->month }} {{ date('y', strtotime($recorded_month->year)) }}"> {{ $recorded_month->month }} {{ date('y', strtotime($recorded_month->year)) }}</option>
       
    @endforeach 
    </select>
    <div class="mb-3">
    <input type="submit" value="Ok" name="submit" class="btn btn-primary">
    </div>
    <form>
</div>

</main>

<!-- END OF HTML -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>