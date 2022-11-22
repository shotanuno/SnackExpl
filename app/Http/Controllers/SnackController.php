<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use App\Models\Comment;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\SnackRequest;
use App\Http\Requests\SnackEditRequest;
use App\Http\Requests\SnackImageRequest;
use Illuminate\Pagination\Paginator;
use Cloudinary;

class SnackController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Snack $snack)
    {
        return view('snacks/index')->with([
            'snacks' => $snack->getPaginateByLimit()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('snacks/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SnackRequest $request, Snack $snack, Image $image)
    {
        $input_snack=$request['snack'];
        $snack->fill($input_snack)->save();
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image->image_path = $image_url;
        $snack->images()->save($image);
        
        return redirect('/snacks/' . $snack->id);
    }
    
    
    public function add(SnackImageRequest $request, Snack $snack, Image $image)
    {
        $image_url = Cloudinary::upload($request->file('image')->getRealPath())->getSecurePath();
        $image->image_path = $image_url;
        $snack->images()->save($image);
        
        return redirect('/snacks/' . $snack->id);
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Snack $snack)
    {
        $comment = Comment::where('snack_id', $snack->id)
            ->orderBy('created_at', 'DESC')->paginate(10);
        $raw_rating = Comment::where('snack_id', $snack->id)->average('rating');
        $rating = round($raw_rating, 1);
        // 上のコードをbladeファイル内に書く
        $image = Image::whereImageable_id($snack->id)->where('imageable_type', 'App\Models\Snack')->get();
        return view('snacks/show')->with([
            'snack' => $snack,
            'comments' => $comment,
            'rating' => $rating,
            'images' => $image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Snack $snack)
    {
        return view('snacks/edit')->with(['snack' => $snack]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(SnackEditRequest $request, Snack $snack)
    {
        $input_snack = $request['snack'];
        $snack->fill($input_snack)->save();
        
        return redirect('/snacks/' . $snack->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Snack $snack, Image $image, Comment $comment)
    {
        // Cloudinary::destroy($image->public_id); このコードによりcloudinary上の画像も削除される.
        // 後々imagesのテーブルにpublic_idのカラムを追加すべき.
        $snack->delete();
        $snack->images()->delete($image);
        $snack->comments()->delete($comment);
        return redirect('/');
    }
}
