@extends('template-bank')

@section('title')
{{ $short_date }}<br>



@endsection

@section('amount-bloc')

    <div class="container text-light" style="width: 80%; height: 250px; border-radius: 21px 21px 0 0; background-color: #7B68ee">
  <div class="row align-items-center mx-auto text-center pt-4">
    <div class="col">
    <a class="text-light text-decoration-none" href="{{ route('incomes.index') }}">
    <p class="display-6">Incomes</p><br>
    <p class="display-6">{{ $total_month_in }} €</p>
  </a>
    </div>
    <div class="col">
      <a class="text-light text-decoration-none" href="{{ route('expenses.index') }}">
        <p class="display-6">Expenses</p><br>
        <p class="display-6">{{ $total_month_ex }} €</p>
      </a>        
    </div>
    <div class="col">
    <p class="display-6">Balance</p><br>
    <p class="display-6">{{ $month_balance }} €</p>
    </div>
  </div>
 </div>
@endsection

@section('income-table')
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
    @foreach($month_incomes as $income)
    <tr>
      <th scope="row">{{ $line ++ }}</th>
      <td>{{ date('d-m-Y', strtotime($income->date)) }}</td>
      <td>{{ $income->title }}</td>
      <td>{{ $income->amount }} €</td>
      <td>{{ $income->category }}</td>
      <td>
        <div class="row">
          <div class="col-2">
      <a class="btn" href="{{ route('incomes.edit', $income->id) }}"><i class="fas fa-edit"></i></a>
</div>
<div class="col-10">
        <form action=" {{ route('incomes.destroy', $income->id) }} " method="post">
          @csrf
          @method('DELETE')
          <button class="btn" type="submit"><i class="far fa-trash-alt"></i></button>
        </form>
</div>
</div>
      </td>
    </tr>
    @endforeach
  </tbody>  
@endsection

@section('expense-table')
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
    @foreach($month_expenses as $expense)
    <tr>
      <th scope="row">{{ $line ++ }}</th>
      <td>{{ date('d-m-Y', strtotime($expense->date)) }}</td>
      <td>{{ $expense->title }}</td>
      <td>{{ $expense->amount }} €</td>
      <td>{{ $expense->category }}</td>
      <td>
      <div class="row">
<div class="col-2">
  <a class="btn" href="{{ route('expenses.edit', $expense->id) }}"><i class="fas fa-edit"></i></a>  
</div>
<div class="col-10">
        <form action=" {{ route('expenses.destroy', $expense->id) }} " method="post">
          @csrf
          @method('DELETE')
          <button class="btn" type="submit"><i class="far fa-trash-alt"></i></button>
        </form>
</div>
</div>
      </td>
    </tr>
    @endforeach
  </tbody>  
@endsection

@section('categories')
<div class="container-fluid mt-4">
  <div class="row">
    <div class="col">
      <h2 class="display-6">Categories</h2>
    </div>
</div>
    <div class="row">
      <ul class="list-group list-group-flush">    
    @foreach ($sum_month_categories as $sum_month_cat)    
      <li class="list-group list-group-item">{{ $sum_month_cat->category }} = {{ $sum_month_cat->total_cat }} €</li>  
    @endforeach  
</ul>
</div>
@endsection