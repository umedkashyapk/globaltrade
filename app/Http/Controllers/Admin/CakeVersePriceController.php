<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class CakeVersePriceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
         $cakeVersePrice= Config::where('key_name',config('constants.config.CAKE_VERSE_PRICE'))->first();
        return view('admin.cake-verse.index',compact("cakeVersePrice"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'cake_verse_price' => 'required',
           
          ]);
          
          $cakeVersePrice=Config::where('key_name',config('constants.config.CAKE_VERSE_PRICE'))->first();
          if(is_null($cakeVersePrice)){
              $cakeVersePrice=Config::create([
                'key_name'=>config('constants.config.CAKE_VERSE_PRICE'),
                'key_value'=>$request->cake_verse_price,
              ]);
          }else{
            $cakeVersePrice->key_value=$request->cake_verse_price;
            $cakeVersePrice->save();
          }
        
        return redirect()->route('cake-verse.index')->with('success',"Cake Verse Price saved successfully");



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
