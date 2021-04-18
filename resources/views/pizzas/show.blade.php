@extends('layouts.app')

@section('content')
    <div class="main-container pizza-details">
        <div class="order-details shadow">
            <h4><strong>Order for:</strong> {{ $pizza->name }}</h4>
            <p><strong>Phone:</strong> {{ $pizza->phone }}</p>
            <p><strong>Address:</strong> {{ $pizza->address }}</p>
            <p class="price"><strong>Payable Amount:</strong> {{ $pizza->amount }}$</p>

            <p class="type"><strong>Type: </strong>{{ $pizza->type }}</p>
            <p class="base"><strong>Base:</strong> {{ $pizza->base }}</p>
            <p class="toppings"><strong>Extra Toppings:</strong></p>
            <ul>
                @if ($pizza->toppings)
                    @foreach ($pizza->toppings as $topping)
                        <li>{{ $topping }}</li>
                    @endforeach
                @endif

            </ul>
            <form action="{{ route('pizzas.destroy', $pizza->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="order-btn">Complete Order</button>
            </form>
            <div class="order-back">
                <a class="order-btn" href="/pizzas" class="back">
                    Back to all pizzas </a>
            </div>
        </div>
        
    </div>
    
        @endsection
