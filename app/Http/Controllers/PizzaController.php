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
        // use the $id variable to query the db for a record
        return view('pizzas.show', ['id' => $id]);
    }

    public function create()
    {
        return view('pizzas.create');
    }

}
