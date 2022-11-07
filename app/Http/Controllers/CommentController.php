<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Snack;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;

class CommentController extends Controller
{
    
    public function index()
    {
        return view('comments.index')->with([
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
            'comment' => $comment,
            'bookmark_list' => auth()->user()->comments()->get()
            /* 'bookmark_list' => auth()->user()->comments() で終わらせると型としてはリレーションのままなのでget()によりコレクション型にしてデータを取得する */
        ]);
    }
    
    public function store(CommentRequest $request, Snack $snack, Comment $comment)
    {
        $input_comment = $request['comment'];
        $comment->fill($input_comment);
        $comment->snack_id = $snack->id;
        $comment->user_id = auth()->id();
        $comment->save();
        
        return redirect('/comments/' . $comment->id);
        
    }
    
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with([
            'comment' => $comment
            
        ]);
    }


    public function update(CommentRequest $request, Comment $comment, Snack $snack)
    {
        $input_comment = $request['comment'];
        $comment->fill($input_comment);
        /* snack_idへの記載はいらない */
        $comment->user_id = auth()->id();
        $comment->save();
        
        return redirect('/comments/' . $comment->id);
    }

    public function delete(Snack $snack, Comment $comment)
    {
        $comment->delete();
        return redirect('/snacks/' . $comment->snack->id);
        
    }
    
    public function bookmarked()
    {
        $comments = auth()->user()->comments()->orderBy('created_at', 'desc')->paginate(10);
        return view('comments.bookmarked')->with([
            'comments' => $comments
        ]);
    }
    
    public function bookmark(Request $request, Comment $comment)
    {
        $comment->users()->attach(auth()->user());
        return redirect('/comments/' . $comment->id);
    }
    
    public function unbookmark(Request $request, Comment $comment)
    {
        $comment->users()->detach(auth()->user());
        return redirect('/comments/' . $comment->id);
    }
    
    
}
