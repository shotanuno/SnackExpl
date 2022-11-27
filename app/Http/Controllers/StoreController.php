<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\Image;
use Illuminate\Http\Request;
use App\Http\Requests\StoreRequest;
use App\Http\Requests\StoreEditRequest;
use Illuminate\Pagination\Paginator;
use Cloudinary;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $store = Store::get();
        return view('stores.index')->with([
            'stores' => $store,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stores.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRequest $request, Store $store, Image $image)
    {
        $input_store =$request['store'];
        $store->fill($input_store)->save();
        $result = $request->file('image')->storeOnCloudinary();
        $image->public_id = $result->getPublicId();
        $image->image_path = $result->getSecurePath();
        $store->images()->save($image);
        
        return redirect('/stores/' . $store->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Store $store)
    {
        $image = Image::whereImageable_id($store->id)->where('imageable_type', 'App\Models\Store')->first();
        return view('stores.show')->with([
            'store' => $store,
            'image' => $image
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('stores.edit')->with([
            'store' => $store
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreEditRequest $request, Store $store)
    {
        $input_store = $request['store'];
        $store->fill($input_store)->save();
        
        return redirect('/stores/' . $store->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
