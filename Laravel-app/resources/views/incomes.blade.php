@extends('template-bank')

@section('title')
Incomes
@endsection
 
@section('btn-add')
<a class="btn btn-outline-primary btn-sm fs-3" href="{{ route('incomes.create') }}">+</a>
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
  @foreach($incomes as $income)
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

@section('total')
<p class="btn btn-light pl-4">{{ $total_in }} €</p>
@endsection