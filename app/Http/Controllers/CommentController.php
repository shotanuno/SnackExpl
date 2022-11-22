<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Snack;
use Illuminate\Http\Request;
use App\Http\Requests\CommentRequest;
use Illuminate\Pagination\Paginator;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comments = Comment::paginate(10);
        return view('comments.index')->with([
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Comment $comment, Snack $snack)
    {
        return view ('comments.create')->with([
            'snack' => $snack
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CommentRequest $request, Comment $comment, Snack $snack)
    {
        $input_comment = $request['comment'];
        $comment->fill($input_comment);
        $comment->snack_id = $snack->id;
        $comment->user_id = auth()->user()->id;
        //laravel6.* 時点では48行目でuser()を書かなくても認識したので要注意
        $comment->save();
        
        return redirect('/comments/' . $comment->id);
        // コメントの詳細ページができたら、後々そちらに飛ぶよう編集
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        return view("comments.show")->with([
            'comment' => $comment
            // 後々ブックマークに関するコードを記載
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        return view('comments.edit')->with([
            'comment' => $comment
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CommentRequest $request, Comment $comment)
    {
        $input_comment = $request['comment'];
        $comment->fill($input_comment);
        $comment->user_id = auth()->user()->id;
        $comment->save();
        
        return redirect('/comments/' . $comment->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Comment $comment)
    {
        $comment->delete();
        return redirect('/snacks/' . $comment->snack->id);
        
    }
}
