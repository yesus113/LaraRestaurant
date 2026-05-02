<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\dayMenu;
use Illuminate\Http\Request;

class dayMenuController extends Controller
{
    //

    public function index()
    {
        //$dayMenus = dayMenu::all();

        return view('dayMenu.index');
    }
}
