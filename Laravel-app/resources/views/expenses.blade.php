@extends('template-bank')

@section('title')
Expenses
@endsection

@section('select')
<form class="form-select" name="selected_cat">
            <select onchange="window.location.href = this.value">
                <option value="{{ route('expenses.index') }}" >All categories</option>
                @foreach($categories as $category)
      
  <option value="{{ route('expenses.category', $category->category) }}" 
    >


                      {{ $category->category }}
                    </option>
                @endforeach
            </select>
</form>
@endsection

@if(isset($selected))
<p>{{ $selected }}</p>
@endif

@section('btn-add')
<a class="btn btn-outline-primary btn-sm fs-3" href="{{ route('expenses.create') }}">+</a>
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
    @foreach($expenses as $expense)
    <tr>
      <th scope="row">{{ $line ++ }}</th>
      <td>{{ date('d-m-Y', strtotime($expense->date)) }}</td>
      <td>{{ $expense->title }}</td>
      <td>{{ $expense->amount }} €</td>
      <td>{{ $expense->category }}</td>
      <td>
      <div class="row">
<div class="col-2">
  <a class="btn" href="{{ route('expenses.edit', $expense->id) }}"><i class="fas fa-edit text-light"></i></a>  
</div>
<div class="col-10">
        <form action=" {{ route('expenses.destroy', $expense->id) }} " method="post">
          @csrf
          @method('DELETE')
          <button class="btn" type="submit"><i class="far fa-trash-alt text-light"></i></button>
        </form>
</div>
</div>
      </td>
    </tr>
    @endforeach
  </tbody>  
@endsection

@section('total')
<p class="btn btn-light pl-4">{{ $total_ex }} €</p>
@endsection

@section('categories')
<!-- CATEGORIES -->
<div class="container-fluid mt-4">
  <div class="row">
    <div class="col">
      <h2>Categories</h2>
    </div>
</div>
    <div class="row">
      <ul class="list-group list-group-flush">    
    @foreach ($sum_categories as $sum_cat)    
      <li class="list-group list-group-item">Total {{ $sum_cat->category }} = {{ $sum_cat->total_cat }} €</li>  
    @endforeach  
</ul>
</div>
@endsection