<?php

namespace App\Http\Controllers;

use App\Http\Requests\DishRequest;
use App\Models\Category;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) //GET category
    {
       $query = Dish::with('category'); //Dishes con una category
       if ($request->filled('category')){ //si en la request existe la category a filtrar bro
            $query->whereHas('category', function ($q) use ($request){ //relationship
                $q->where('name', $request->category);
            });
       }
       $dishes = $query->get(); //execute

        return view('dish.index', compact('dishes'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dishes = Dish::all();
        $categories = Category::all();
        return view('dish.create', compact('dishes', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DishRequest $request)
    {
        Dish::create($request->validated());
        return redirect()->route('dish.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $id)
    {
        //todo
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Dish $dish)
    {
        $categories = Category::pluck('id', 'name');
        return view('dish.edit', compact('dish', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DishRequest $request, Dish $dish)
    {
        $dish->update($request->validated());
        return redirect()->route('dish.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dish.index');
    }

}
