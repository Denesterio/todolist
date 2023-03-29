<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Todo;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $todos = Todo::public()->with('user')->get();
        if (Auth::check()) {
            $todos = $todos->merge(Auth::user()->todos);
        }
        return view('main', compact('todos'));
    }
}
