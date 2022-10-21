<?php

namespace App\Http\Controllers;

use App\Snack;
use Illuminate\Http\Request;

class SnackController extends Controller
{
    public function index(Snack $snack)
    {
        return $snack->get();
    }
}
