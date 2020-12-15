<?php

namespace App\Http\Controllers;

use App\Models\Pizza;

class PizzaController extends Controller
{

    // creating this constructor would for use to be logged in to do anything
    // which isn't ideal, better to set auth in specific routes instead
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {

        //$pizzas = Pizza::all();
        // $pizzas = Pizza::orderBy('name', 'desc')->get();
        // $pizzas = Pizza::where('name', 'mark')->get();
        $pizzas = Pizza::latest()->get();

        return view('pizzas.index', [
            'pizzas' => $pizzas,
        ]);
    }

    public function show($id)
    {
        $pizza = Pizza::findOrFail($id);
        // use the $id variable to query the db for a record
        return view('pizzas.show', ['pizza' => $pizza]);
    }

    public function create()
    {
        return view('pizzas.create');
    }

    // save pizza you have created
    public function store()
    {
        $pizza = new Pizza();
        $pizza->name = request('name');
        $pizza->type = request('type');
        $pizza->base = request('base');
        // toppings is an array and needs to be stored as JSON in the database
        // we must cast it in th Pizza model
        $pizza->toppings = request('toppings');
        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order!');
    }

    public function destory($id)
    {
        $pizza = Pizza::findOrFail($id);
        $pizza->delete();

        return redirect('/pizzas');
    }
}
