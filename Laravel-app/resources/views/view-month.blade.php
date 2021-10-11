@extends('template-bank')

@section('title')
View Month
@endsection


@section('table')
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
  le mois choisi = {{  $selected_month }}<br>
@endsection

@section('total')
@endsection

@section('categories')
@endsection