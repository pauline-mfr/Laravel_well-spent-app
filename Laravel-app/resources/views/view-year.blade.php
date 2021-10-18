<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/5bf2af5d34.js" crossorigin="anonymous"></script>
    
    
    <title>Bank App</title>
</head>
<body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#7B68EE" fill-opacity="1" d="M0,288L80,261.3C160,235,320,181,480,154.7C640,128,800,128,960,128C1120,128,1280,128,1360,128L1440,128L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
</svg>
<!-- BTN HOME -->
<a class="btn" href=" {{ route('homepage') }}"><i class="fas fa-home position-absolute top-0 end-0 text-light p-4 fs-2"></i></a>
<main>      
    
    <div class="text-center mb-5">    
        <h2 class="display-6">This year</h2>      
    </div>  

    <div class="container text-light" style="width: 80%; height: 250px; border-radius: 21px 21px 0 0; background-color: #7B68ee">
  <div class="row align-items-center mx-auto text-center pt-4">
    <div class="col">
    <a class="text-light text-decoration-none" href="">
    <p class="display-6">Incomes</p><br>
    <p class="display-6">{{ $total_year_in }} €</p>
  </a>
    </div>
    <div class="col">
      <a class="text-light text-decoration-none" href="">
        <p class="display-6">Expenses</p><br>
        <p class="display-6">{{ $total_year_ex }} €</p>
      </a>        
    </div>
</div><br>
<div class="row text-center">
    <div class="col">
    <p class="display-6"><i class="fas fa-hand-holding-usd"></i> So far you have saved : {{ $year_balance }} €</p>
    </div>
  </div>
 </div>

 <!-- CATEGORIES -->
 <div class="px-5">
<div class="container-fluid mt-4">
  <div class="row">
    <div class="col">
      <h2 class="display-6">Categories</h2>
    </div>
</div>
    <div class="row">
    <ul class="list-group list-group-flush">    
    @foreach ($sum_year_categories as $sum_year_cat)    
      <li class="list-group list-group-item">Total {{ $sum_year_cat->category }} = {{ $sum_year_cat->total_year_cat }} €</li>  
    @endforeach  
</ul>
</div>
</div>

</main>

<!-- END OF HTML -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


