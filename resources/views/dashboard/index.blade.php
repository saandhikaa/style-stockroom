@extends('layouts.dashboard')

@section('main')
    <h1>Welcome, {{ Auth::user()->name }}!</h1>
@endsection