<?php

namespace App\Http\Controllers;

use App\Snack;
use App\Http\Requests\SnackRequest;

class SnackController extends Controller
{
    public function index(Snack $snack)
    {
        
        return view('snacks/index')->with([
            'snacks' => $snack->getPaginateByLimit(),
            'random' => Snack::inRandomOrder()->first()
            ]);
    }
    
    public function detail(Snack $snack)
    {
        return view('snacks/detail')->with(['snack' => $snack]);
    }
    
    public function create()
    {
        return view('snacks/create');
    }
    
    public function edit(Snack $snack)
    {
        return view('snacks/edit')->with(['snack' => $snack]);
    }
    
    public function update(SnackRequest $request, Snack $snack)
    {
        $input_snack = $request['snack'];
        $snack->fill($input_snack)->save();

        return redirect('/snacks/' . $snack->id);
    }
    
    public function store(SnackRequest $request, Snack $snack)
    {
        $input_snack = $request['snack'];
        $snack->fill($input_snack)->save();

        return redirect('/snacks/' . $snack->id);
    }
    
    public function delete(Snack $snack)
    {
        $snack->delete();
        return redirect('/');
    }
    
    
}

?>