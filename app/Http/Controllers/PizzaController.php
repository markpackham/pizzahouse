<?php

namespace App\Http\Controllers;

use App\Models\Pizza;

class PizzaController extends Controller
{

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
        $pizza->save();

        return redirect('/')->with('mssg', 'Thanks for your order!');
    }
}
