@extends('template')

@section('content')
    <form action="{{ route('teams.store') }}" method="POSt">
        @csrf
        @inputTextBox('title')
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    <p>Team {{ $points }}</p>
@endsection
