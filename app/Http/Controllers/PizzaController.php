<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pizza;

class PizzaController extends Controller
{

    // public function __construct()
    // {
    //     this->middleware('auth')
    // }


    public function index()
    {

        //$pizzas=Pizza::all();
        //$pizzas = Pizza::orderBy('name')->get();
        //$pizzas = Pizza::where('type','hawaiian')->get();
        $pizzas = Pizza::latest()->get();

        return view(
            'pizzas.index',
            [
                'pizzas' => $pizzas
            ]
        );
    }
    public function show($id)
    {

        $pizza = Pizza::findOrFail($id);
        return view('pizzas.show', ['pizza' => $pizza]);
    }
    public function create()
    {
        return view('pizzas.create');
    }
    public function store()
    {

        //create an instance of the pizza model
        $pizza = new Pizza();
        //assigning the value to the pizza object
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        $pizza->address = request('address');
        $pizza->phone = request('phone');
        $pizza->toppings = request('toppings');

        //Price checking
        //CHECKING TYPE
        $pizzaPrice = 0;
        if (request('type') == 'margherita') {
            $pizzaPrice = 13;
        } elseif (request('type') == 'hawaiian') {
            $pizzaPrice = 15;
        } elseif (request('type') == 'veg supreme') {
            $pizzaPrice = 17;
        } elseif (request('type') == 'volcano') {
            $pizzaPrice = 20;
        }
        //CHECKING BASE
        $basePrice = 0;
        if (request('base') == 'cheesy crust') {
            $basePrice = 4;
        } elseif (request('base') == 'garlic crust') {
            $basePrice = 2;
        } elseif (request('base') == 'thin & crispy') {
            $basePrice = 3;
        } elseif (request('base') == 'thick') {
            $basePrice = 2;
        }

        //CHECKING TOPPINGS
        $toppingsNumber = 0;
        if (request('toppings')) {
            $toppingsNumber = count(request('toppings'));
        }
        $toppingsPrice = ($toppingsNumber * .50);
        $total = $pizzaPrice + $basePrice + $toppingsPrice;


        $pizza->amount = $total;
        //error_log($total);

        //saving the value to DB using save method 

        $pizza->save();



        return redirect('/')->with("message", "Thank you for your order ");
    }
    public function destroy($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
