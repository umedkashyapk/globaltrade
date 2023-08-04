<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ticket;

class SupportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->has('page') ? $request->get('page') : 1;
        $limit = $request->has('limit') ? $request->get('limit') : 10;
        $ticketQuery =  Ticket::query();
       
        // if($request->has('search_text')){
        //     $searchText=$request->search_text;
        //     $usersQuery->where('first_name','like', '%'.$searchText.'%')
        //         ->orWhere('last_name','like', '%'.$searchText.'%')
        //         ->orWhere('email','like', '%'.$searchText.'%')
        //         ->orWhere('mobile_number','like', '%'.$searchText.'%');
        // }//@e search_text if
        if($request->has('filter_status')){
            if($request->filter_status !='any'){
            $ticketQuery->where('status',$request->filter_status);
            }
        }
        $tickets =$ticketQuery->orderBy('created_at','desc')->offset(($page - 1) * $limit)->paginate($limit);
        return view('admin.support.pending',['tickets'=>$tickets,'request'=>$request]);

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Ticket::where('id',$id)->update([
            "status"=>1
        ]);
        return redirect()->back()->with("success","Ticket closed successfully");
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
