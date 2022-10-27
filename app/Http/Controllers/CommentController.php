<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Snack;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    
    public function index(Comment $comment)
    {
        return view('comments/index')->with([
        $i = new Comment(),
        'comments' => $i->getPaginateByLimit(),
        'random' => Snack::inRandomOrder()->first()
        ]);
        
    }

    
    public function create(Comment $comment)
    {

    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show(Comment $comment)
    {
        
    }

    
    public function edit(Comment $comment)
    {
        //
    }


    public function update(Request $request, Comment $comment)
    {
        //
    }

    
}
