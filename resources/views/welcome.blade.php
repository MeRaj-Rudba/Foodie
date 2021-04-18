@extends('layouts.app')


@section('content')
    <div class="main-container">
        <img src="/img/pizza_logo.png" alt="logo" class="logo">
        <h1 class="title">Foodie</h1>
        <p class="tag-line">BY FOODIE FOR FOODIE</p>
        <p class="mssg">{{ session('message') }}</p>

        <a class="order-btn" href="{{ route('pizzas.create') }}">Order a Pizza</a>
    </div>

@endsection
