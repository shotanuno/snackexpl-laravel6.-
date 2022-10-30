<?php

namespace App\Http\Controllers;

use App\Snack;
use App\Comment;
use App\Image;
use Cloudinary;
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
        return view('snacks/detail')->with([
            'snack' => Snack::inRandomOrder()->first()
            ]);
    }
    
    public function detail(Snack $snack)
    {
        $comment = Comment::where("snack_id", $snack->id)
        ->orderBy("created_at", "DESC")->limit(10)->get();
        $image = Image::whereImageable_id($snack->id)->where('imageable_type', 'App\Snack')->first();
        return view('snacks/detail')->with([
            'snack' => $snack,
            'comments' => $comment,
            'image' => $image
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
    
    public function update(SnackRequest $request, Snack $snack)
    {
        $input_snack = $request['snack'];
        $snack->fill($input_snack)->save();
        
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
        | image_idは自動採番によって割り振られるからOK.
        | image_pathは$snackの方にデータが無いため独自に取得する必要がある.
        |
        | ポリモーフィックリレーションによりSnackモデルはimageメソッドを持って
        | いるためimageable_id,imageable_typeはimageメソッドにより保存できる.
        |
        | 注意すべき点:Snackモデルのimageメソッドにはcreated_at,updated_atの
        | データも含んでいるので仮にimageテーブルに上記のカラムがない場合
        | エラーが起きる.
        | 
        | $snack->images()->save($image);　の意味:
        | snackのimageメソッドを$imageに保存
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