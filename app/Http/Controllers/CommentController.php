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

    
    public function create(Snack $snack)
    {
        return view("comments.create")->with([
            'snack' => $snack,
            'comment' => Comment::get()
        ]);
    }

    public function detail(Comment $comment)
    {
        return view("comments.detail")->with([
            'comment' => $comment
        ]);
    }
    
    public function store(CommentRequest $request, Snack $snack)
    {
        $comment = new Comment();
        $input_comment = $request['comment'];
        $comment->fill($input_comment);
        $comment->snack_id = $snack->id;
        $comment->save();
        
        return redirect('/comments/' . $comment->id);
        
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
