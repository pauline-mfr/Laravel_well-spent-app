@extends('template-bank')

@section('title')
Category : {{ $category }}
@endsection
 
@section('income-table')
<thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Date</th>
      <th scope="col">Title</th>
      <th scope="col">Amount</th>
    </tr>
  </thead>
  <tbody>
  @foreach($selected_category as $category_result)
    <tr>
      <th scope="row">{{ $line ++ }}</th>
      <td>{{ date('d-m-Y', strtotime($category_result->date)) }}</td>
      <td>{{ $category_result->title }}</td>
      <td>{{ $category_result->amount }} €</td>
    </tr>
    @endforeach
  </tbody>  
@endsection

@section('total')
<p class="btn btn-primary pl-4">{{ $total_year_cat }} €</p>
@endsection