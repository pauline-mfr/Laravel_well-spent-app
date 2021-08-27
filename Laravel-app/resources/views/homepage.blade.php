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
  <header class="header-bloc">
  <div class="container rounded">
    <div class="row text-center py-5">
      <div class="header-left-part col-6">
        <h2 class="display-5">My account</h2>
        <p class="account-balance display-5">1 450 €</p>
      </div>
      <div class="header-right-part col-6"> 
      </div>
    </div>
  </div>
</header>
<p>{{'PHP'}}</p>
<div class="d-md-flex flex-md-equal w-100 ps-md-3">    
      <div class=" mx-auto" style="width: 80%; height: 0px;"></div>
    </div>
    <div class="me-md-3 px-3 px-md-5 text-center overflow-hidden">
      <div class="my-3 p-3">
        <h2 class="display-6">This month</h2>
      </div>
      <div class="shadow-sm mx-auto" style="width: 80%; height: 200px; border-radius: 21px 21px 0 0; background-color: #7B68ee"></div>
    </div>
  </div>

<div class="bloc-expenses mx-auto text-light">
  <div class="container">
    <div class="row">
    <div class="col-4">
      <p class="display-6">Incomes</p><br>
      <?php// $total_in = $manager->totalIncomes(); ?>
      <p class="display-6"><?//= $total_in?> €</p>
    </div>   
    <div class="col-4">
    <p class="display-6">Expenses</p><br>
    <?php// $total_ex = $manager->totalExpenses(); ?>
    <p class="display-6"><?//= $total_ex?> €</p>
    </div>
    <div class="col-4">
    <p class="display-6">Balance</p><br>
    <?php// $balance = $manager->balance(); ?>
    <p class="display-6"><?//= $balance?> €</p>
    </div>
    </div>
</div>
</div>

<!-- EXPENSES FORM -->
    <div class="expenses-form px-5 mt-5">
    <form action="homepage.php" method="POST">
    <div class="form-check">
  <input class="form-check-input" type="radio" value="income" name="amount_type">
  <label class="form-check-label" for="flexCheckDefault">Income</label>
</div>
<div class="form-check">
  <input class="form-check-input" type="radio" value="expense" name="amount_type">
  <label class="form-check-label" for="flexCheckChecked">Expense</label>
</div>
  <div class="mb-3">
    <label for="new_date" class="form-label text-primary">Date </label>
    <input type="date" step="any" name="new_date" class="form-control" >
    <label for="new_title" class="form-label text-primary">Title </label>
    <input type="text" step="any" name="new_title" class="form-control" >
    <label for="new_amount" class="form-label text-primary">Amount </label>
    <input type="number" step="any" name="new_amount" class="form-control"><br>
    <label for="new_category" class="form-label text-primary">New category</label>
    <input type="text" step="any" name="new_category" class="form-control"><br>
    <select class="form-select" aria-label="Default select example" name="category">
  <option selected>Select a category</option>
  <?php /* foreach($all_cat as $cat) {
    echo("<option value=".$cat['category'].">".$cat['category']."</option>");
  } */ ?>
</select>

  </div>
  <div class="mb-3">
    <input type="submit" value="Add" name="submit" class="btn btn-primary">
    <input type="submit" value="Refresh" name="refresh" class="btn btn-primary">
    </div>
</form>
    </div>

    <!-- INCOMES TABLE    -->
<div class="px-5">
<h2>Incomes</h2>
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

</table>
</div>

<!-- TOTAL INCOMES -->
<div class="px-5">
<p class="btn btn-light">Total incomes : <?//= $total_in?> €</p>
</div>

<!-- EXPENSES TABLE    -->
<div class="px-5">
<h2>Expenses</h2>
<table class="table table-dark table-striped">
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
<?php 
//if (isset($_SESSION['test'])) {
  //$to_display = $session->content();
 /*  $line = 0;
  $datas = $manager->getExpenses(); //repris de Victorya
  // TO DO : ORDER BY DATE
foreach($datas as $data) {
  $line ++;
  echo '
  <form action="homepage.php" method="POST">
    <tr>
      <th scope="row">'.$line.'</th>
      <td>'.$data['formated_date'].'</td>
      <td>'.$data['title'].'</td>
      <td>'. $data['amount'].' €</td>
      <td>'. $data['category'].'</td>
      <td>
        <button class="btn btn-light" type="submit" name="delete" value="'.$data['id'].'"><i class="far fa-trash-alt"></i></button>
      </td>
    </tr>
    </form>
    ';} */
    ?>
</tbody>
</table>
</div>

<!-- TOTAL EXPENSES -->
  <div class="px-5">
    <p class="btn btn-dark">Total expenses : <?//= $total_ex?> €</p>
</div>

<!-- TOTAL CATEGORIES  -->
<div class="my-5">
<h2 class="px-5">Categories</h2>
<ul class="list-group list-group-flush">
<?php
/* $sum_cat = $manager->sumCategories(); 
foreach($sum_cat as $cat) {
  if($cat['category'] == NULL) {
    $cat['category'] = 'Uncategorised';
  } echo("<ul><li class='list-group-item'>Total ".$cat['category'] . " = ". $cat['total_cat']." € <br></li></ul>");
}; */
?>
</div>

<!-- END OF HTML -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>