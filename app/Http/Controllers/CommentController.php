<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Snack;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    
    public function index()
    {
        $random = Snack::inRandomOrder()->first();
        return view('comments.index')->with([
            'random' => $random,
            $i = new Comment(),
            'comments' => $i->getPaginateByLimit()
        ]);
        
    }

    
    public function create(Comment $comment)
    {
        return view("comments/create")->with([
            'comments' => Comment::get(),
            'snacks' => Snack::get()
        ]);
    }

    public function detail(Comment $comment)
    {
        return view("comments.detail")->with([
            'comment' => $comment
        ]);
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
