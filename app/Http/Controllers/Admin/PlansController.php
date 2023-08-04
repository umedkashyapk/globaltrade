<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Plan;

class PlansController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   $plansList=Plan::paginate(10);
        return view('admin.plans.index',compact('plansList'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.plans.create');
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
            'plan_name' => 'required',
            'plan_desc' => 'required',
            'no_of_months' => 'required|numeric',
            'monthly_roi' => 'required|numeric',
            'min_joining_token' => 'required|numeric',
          ]);
         $plan= Plan::create([
              'name'=>$request->plan_name,
              'description'=>$request->plan_desc,
              'no_of_months'=>$request->no_of_months,
              'monthly_roi'=>$request->monthly_roi,
              'min_joining_token'=>$request->min_joining_token
          ]);
          
              return redirect('admin/plans')->with('success',"New Plan created successfully");
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
       $plan=Plan::where('id',$id)->first();
       if(is_null($plan)){
        return redirect('admin/plans')->with('success',"No Plan exists");

       }
        return view('admin.plans.edit',compact('plan'));

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
        $request->validate([
            'plan_name' => 'required',
            'plan_desc' => 'required',
            'no_of_months' => 'required|numeric',
            'monthly_roi' => 'required|numeric',
            'min_joining_token' => 'required|numeric',
          ]);
         $plan= Plan::where('id',$id)->update([
              'name'=>$request->plan_name,
              'description'=>$request->plan_desc,
              'no_of_months'=>$request->no_of_months,
              'monthly_roi'=>$request->monthly_roi,
              'min_joining_token'=>$request->min_joining_token
          ]);
          
              return redirect('admin/plans/'.$id.'/edit')->with('success'," Plan updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {
        $plan= Plan::where('id',$id)->update([
            'active'=>$request->active
        ]);
       $status= $request->active==1?'Activated':"Deactivated";
        return redirect('admin/plans')->with('success'," Plan $status successfully");

    }
}
