<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\catagory;
use App\sub;
use DB;
class subcatagorycontroller extends Controller
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
          $catagory=catagory::all();
        return view("subproduct.addsubproduct",compact('catagory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         sub::insert([
                'c_id'=>$request->catagory_id,
                's_name'=>$request->s_name
        ]);
        return back();
    }


    public function manage(){

      
              $subs= DB::table('catagories')
            ->join('subs', 'catagories.id', '=', 'subs.c_id')
            ->select('subs.id','subs.s_name' ,'catagories.c_name')
            ->get();


        return view("subproduct.managesub",compact('subs'));
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

            $catagory_name=catagory::all();

          $catagory = DB::table('subs')
                ->select('*')
                ->where('id',$id)
                ->get();
                session(['id' => $id]);
                return view('subproduct.subedit',compact('catagory','catagory_name'));
    }


        public function edit1(Request $request){
        $id=$request->session()->get('id');

        sub::findOrFail($id)->update([
            
            'c_id'=>$request->c_id,
            's_name'=>$request->s_name,
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
    public function destroy($id)
    {
        //
    }


    public function delete($id)
    {
         sub::findOrFail($id)->delete();
         return back();
    }
}
