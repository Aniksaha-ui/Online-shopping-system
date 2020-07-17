<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catagory;
use DB;
use Session;

class catagorycontroller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('catagory.addcatagory');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        catagory::insert([
                'c_name'=>$request->c_name,
                'c_type'=>$request->c_type
        ]);
        return back();
    }


    public function manageproduct(){

        $catagory=catagory::all();
        return view('catagory.managecatagory',compact('catagory'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
                  $catagory = DB::table('catagories')
                ->select('*')
                ->where('id',$id)
                ->get();
                session(['id' => $id]);
                return view('catagory.catagoryedit',compact('catagory'));
    }

    public function edit1(Request $request){
        $id=$request->session()->get('id');

        catagory::findOrFail($id)->update([
            'c_name'=>$request->c_name,
            'c_type'=>$request->c_type,
             ]);
        return redirect()->back()->with('success','data insert successfully');
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
    public function delete($id)
    {
         catagory::findOrFail($id)->delete();
     
         return back();
    }







 


}
