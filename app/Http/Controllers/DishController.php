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
     * Display a listing of the resource or filter by category.
     */

public function index(Request $request)
{
    $categories = Category::all();
    $categoryId = $request->query('category_id');
    $search = trim((string) $request->query('search', ''));

    $dishes = Dish::with('category')
        ->when($categoryId, fn ($query) => $query->where('category_id', $categoryId))
        ->when($search !== '', function ($query) use ($search) {
            $query->where(function ($query) use ($search) {
                $query->where('name', 'like', "%{$search}%")
                    ->orWhere('description', 'like', "%{$search}%")
                    ->orWhereHas('category', fn ($query) => $query->where('name', 'like', "%{$search}%"));
            });
        })
        ->latest()
        ->get();

    return view('dish.index', compact('dishes', 'categories'));
}

public function filterByCateg($categId)
{
    return Dish::where('category_id', $categId)->with('category')->get();
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
        return redirect()->route('dish.index')->with('success', 'Dish created');
    }

    /**
     * Display the specified resource.
     */
    public function show(Dish $dish)
    {
        // Cargamos la relación 'category' para que esté disponible en la vista
        $dish->load('category');
        return view('dish.show', compact('dish'));
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
        return redirect()->route('dish.index')->with('success', 'Dish updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Dish $dish)
    {
        $dish->delete();
        return redirect()->route('dish.index')->with('danger', 'Dish created');
    }
}
