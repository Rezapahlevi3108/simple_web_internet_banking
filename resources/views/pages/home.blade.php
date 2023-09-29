@extends('layouts.main')

@section('content')

    @if (Auth::check())    
        <div class="card shadow border-0 w-25 p-4 mx-auto mt-5">
            <p>Saldo Anda</p>
            <h1>Rp {{ number_format($user->balance, 2) }}</h1>
        </div>
    @else
        <h1 class="text-center mt-5">Welcome to Home Page</h1>
    @endif

@endsection