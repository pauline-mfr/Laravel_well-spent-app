@extends('template')

@section('title')
Expenses
@endsection 

@section('content')
<p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
@endsection

@section('button')
Add
@endsection


@section('form')
    <br>
    <div class="container">
        <div class="row card text-white bg-dark">
            <h4 class="card-header">New Expense</h4>
            <div class="card-body">
                <!-- action = nom de la route + helper route -->
                <form action="{{ route('amount.create') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <input type="date" class="form-control  @error('date') is-invalid @enderror" name="date" id="date">
                        @error('date')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input class="form-control  @error('title') is-invalid @enderror" name="title" id="title" placeholder="Title">
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="number" class="form-control  @error('amount') is-invalid @enderror" name="amount" id="amount" placeholder="Amount">
                        @error('amount')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-secondary">Add</button>
                </form>
            </div>
        </div>
    </div>
@endsection