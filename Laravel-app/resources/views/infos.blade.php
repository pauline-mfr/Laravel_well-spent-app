@extends('template')

@section('title')
Form
@endsection
 
@section('form')
    <form action="{{ url('users') }}" method="POST">
        @csrf
        <label for="nom">Enter your name : </label>
        <input type="text" name="name" id="name">
        <input type="submit" value="Send !">
    </form>
@endsection
