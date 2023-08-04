<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Address;


class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $currentUser=$request->user();
       $loggedInUser=User::where('id', $currentUser->id)->first();
       
        return view('profile.index',['loggedInUser'=>$loggedInUser,'type'=>'']);
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
        $data=$request->all();
        try{
            $currentUser=$request->user();
           
            $errors = [
                'first-name'    =>  'required',
                'last-name'     =>  'required',
                'mobile'        =>  'required',
               ];
                $this->validate($request, $errors);
               
                $updatedUserInfo = User::where('id',$currentUser->id)->update([
                    'first_name'    =>  $data['first-name'],
                    'last_name'     =>  $data['last-name'],
                    'mobile_number'        =>  $data['mobile'],
                ]);
                return \Response::json(['success'=>"Profile Information updated successfully"],200);

            
                

            }catch(\Exception $e){
                return \Response::json(['error'=>$e->getMessage()],419);
        
            }
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
    public function showTab(Request $request,$type)
    {
        $currentUser=$request->user();
        $loggedInUser=User::where('id', $currentUser->id)->first();
        
         return view('profile.index',['loggedInUser'=>$loggedInUser,"type"=>$type]);
    }
}
