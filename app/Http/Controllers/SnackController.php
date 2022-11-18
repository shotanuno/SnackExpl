<?php

namespace App\Http\Controllers;

use App\Models\Snack;
use Illuminate\Http\Request;
use App\Http\Requests\SnackRequest;
use App\Http\Requests\SnackEditRequest;

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
    public function store(SnackRequest $request, Snack $snack)
    {
        $input_snack=$request['snack'];
        $snack->fill($input_snack)->save();
        //この後の行にimageにかんするコードを記述
        
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
        return view('snacks/show')->with([
            'snack' => $snack
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
    public function delete(Snack $snack)
    {
        $snack->delete();
        // この行に、imageとcommentを削除するコードを記述
        return redirect('/');
    }
}
