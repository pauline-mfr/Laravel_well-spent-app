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
    <!-- SESSION -->
  @if(session()->has('user-alert'))
  <div class="alert alert-primary" role="alert">
    {{ session('user-alert') }}
</div>
@endif

  <div class="container-fluid px-5">
  <div class="row">
    <div class="col-8">
      <h2>@yield('title')</h2>
    </div>
    <div class="col-3">
        @yield('select')
    </div>
    </div>
    <div class="col-1">
        @yield('btn-add')
    </div>
</div>

<!-- TABLE -->
<table class="table table-light table-striped">
    @yield('table')    
</table>  

<!-- TOTAL -->
 @yield('total')


<!-- CATEGORIES -->
@yield('categories')

</main>
    
</body>
</html>