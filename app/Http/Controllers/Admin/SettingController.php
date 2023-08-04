<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Config;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $privateKey= Config::where('key_name',config('constants.config.ADMIN_PRIVATE_KEY'))->first();
       $addressKey= Config::where('key_name',config('constants.config.ADMIN_WALLET_ADDRESS_KEY'))->first();
       $withdrawalCharges=Config::where('key_name',config('constants.config.ADMIN_WITHDRAWAL_CHARGES'))->first();
        return view('admin.setting.index',compact('privateKey',"withdrawalCharges","addressKey"));
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
            'private_key' => 'required|string',
            'wallet_address'=>'required|string',
            'withdrawal_admin' => 'required|numeric',
          ]);
          
          $publicAddressKey=Config::where('key_name',config('constants.config.ADMIN_WALLET_ADDRESS_KEY'))->first();
          if(is_null($publicAddressKey)){
              $publicAddressKey=Config::create([
                'key_name'=>config('constants.config.ADMIN_WALLET_ADDRESS_KEY'),
                'key_value'=>$request->wallet_address,
              ]);
          }else{
            $publicAddressKey->key_value=$request->wallet_address;
            $publicAddressKey->save();
          }
          $privateKey=Config::where('key_name',config('constants.config.ADMIN_PRIVATE_KEY'))->first();
          if(is_null($privateKey)){
              $privateKey=Config::create([
                'key_name'=>config('constants.config.ADMIN_PRIVATE_KEY'),
                'key_value'=>$request->private_key,
              ]);
          }else{
            $privateKey->key_value=$request->private_key;
            $privateKey->save();
          }
          $withdrawalCharges=Config::where('key_name',config('constants.config.ADMIN_WITHDRAWAL_CHARGES'))->first();
          if(is_null($withdrawalCharges)){
            $withdrawalCharges=Config::create([
              'key_name'=>config('constants.config.ADMIN_WITHDRAWAL_CHARGES'),
              'key_value'=>$request->withdrawal_admin,
            ]);
        }else{
            $withdrawalCharges->key_value=$request->withdrawal_admin;
            $withdrawalCharges->save();
        }

        return redirect()->route('settings.index')->with('success'," Configuration Settings saved successfully");



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
