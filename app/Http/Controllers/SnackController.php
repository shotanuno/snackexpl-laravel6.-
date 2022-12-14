<?php

namespace App\Http\Controllers;

use App\Snack;
use App\Comment;
use App\Image;
use Cloudinary;
use Illuminate\Http\Request;
use App\Http\Requests\SnackRequest;

class SnackController extends Controller
{
    public function index(Snack $snack)
    {
        
        return view('snacks/index')->with([
            'snacks' => $snack->getPaginateByLimit()
            ]);
    }
    
    public function random(){
        $random = Snack::inRandomOrder()->first();
        return redirect("/snacks/" . $random->id);
    }
    
    public function detail(Snack $snack)
    {
        $comment = Comment::where("snack_id", $snack->id)
        ->orderBy("created_at", "DESC")->limit(10)->get();
        $rating = Comment::where("snack_id", $snack->id)->average("rating");
        $image = Image::whereImageable_id($snack->id)->where('imageable_type', 'App\Snack')->get();
        return view('snacks/detail')->with([
            'snack' => $snack,
            'comments' => $comment,
            'images' => $image,
            'rating' => $rating
            ]);
    }
    
    public function create()
    {
        return view('snacks/create');
    }
    
    public function edit(Snack $snack)
    {
        return view('snacks/edit')->with(['snack' => $snack]);
    }
    
    public function update(Request $request, Snack $snack)
    {
        $input_snack = $request['snack'];
        $snack->fill($input_snack)->save();
        
        return redirect('/snacks/' . $snack->id);
    }
    
    public function add(Request $request, Snack $snack, Image $image)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image->image_path = $image_url;
        $snack->images()->save($image);
        
        return redirect('/snacks/' . $snack->id);
    }
    
    public function store(SnackRequest $request, Snack $snack, Image $image)
    {
        $input_snack = $request['snack'];
        $snack->fill($input_snack)->save();
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image->image_path = $image_url;
        $snack->images()->save($image);
        /*
        | image_id???????????????????????????????????????????????????OK.
        | image_path???$snack?????????????????????????????????????????????????????????????????????.
        |
        | ???????????????????????????????????????????????????Snack????????????image????????????????????????
        | ????????????imageable_id,imageable_type???image????????????????????????????????????.
        |
        | ??????????????????:Snack????????????image??????????????????created_at,updated_at???
        | ???????????????????????????????????????image????????????????????????????????????????????????
        | ?????????????????????.
        | 
        | $snack->images()->save($image);????????????:
        | snack???image???????????????$image?????????
        */
        
        return redirect('/snacks/' . $snack->id);
    }
    
    public function delete(Snack $snack, Image $image, Comment $comment)
    {
        $snack->delete();
        $snack->images()->delete($image);
        $snack->comments()->delete($comment);
        return redirect('/');
    }
    
    
}

?>