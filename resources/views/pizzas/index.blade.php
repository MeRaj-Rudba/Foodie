@extends('layouts.app')

@section('content')

    <div class="main-container ">
        <h1 class="title">Pizza Orders</h1>
        <div class="order-list">
            @foreach ($pizzas as $pizza)
            <a  href="{{ route('pizzas.show', $pizza->id) }}">
                <div class="order-item shadow">
                    <img src="/img/pizza.png" alt="">
                    <h4 class="order-link">
                        {{ $pizza->name }}
                    </h4>

                </div>
            </a>
            @endforeach


        </div>
    </div>
@endsection
