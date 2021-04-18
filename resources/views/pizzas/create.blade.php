@extends('layouts.app')

@section('content')
    <div class="main-container container ">
        <h1 class="title">Create a new Pizza</h1>
        <form action="{{ route('pizzas.store') }}" method="post">
            @csrf
            <div class="form-inside">
                <label for="name">Your name</label>
                <input type="text" id="name" name="name">

                <label for="phone">Your Contact Number</label>
                <input type="text" id="phone" name="phone">

                <label for="address">Your Address</label>
                <input type="text" id="address" name="address">

                <label for="type">Choose Pizza type</label>
                <select name="type" id="type">
                    <option value="margherita">Margherita</option>
                    <option value="hawaiian">Hawaiian</option>
                    <option value="veg supreme">Veg Supreme</option>
                    <option value="volcano">Volcano</option>
                </select>

                <label for="base">Choose Pizza type</label>
                <select name="base" id="base">
                    <option value="cheesy crust">Cheesy Crust</option>
                    <option value="garlic crust">Garlic Crust</option>
                    <option value="thin & crispy">Thin & Crispy</option>
                    <option value="thick">Thick</option>
                </select>
                <fieldset>
                    <label for="">Extra topping</label><br />
                    <input type="checkbox" name="toppings[]" value="mushrooms"><span class="checkbox-item">Mushrooms</span><br />
                    <input type="checkbox" name="toppings[]" value="peppers"><span class="checkbox-item">Peppers</span><br />
                    <input type="checkbox" name="toppings[]" value="garlic"><span class="checkbox-item">Garlic</span><br />
                    <input type="checkbox" name="toppings[]" value="olives"><span class="checkbox-item">Olives</span><br />

                </fieldset>
            </div>



            <input class="order-btn" type="submit" value="Order Pizza">

        </form>
    </div>
@endsection
