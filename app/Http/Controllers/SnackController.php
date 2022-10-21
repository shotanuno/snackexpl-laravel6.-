<?php

namespace App\Http\Controllers;

use App\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    public function index(Snack $snack)
    {
        return view('snacks/index')->with(['snacks' => $snack->getPaginateByLimit()]);
    }
    
    public function show(Snack $snack)
    {
        return view('snacks/show')->with(['snack' => $snack]);
    }
    
    public function create()
    {
        return view('snacks/create');
    }
    
}

?>