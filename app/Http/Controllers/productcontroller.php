<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Illuminate\support\Str;
use Image;
use App\product;


class productcontroller extends Controller
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
         $countries=DB::table('catagories')->pluck("c_name","id");
        return view("product.addproduct",compact('countries'));
    }

    public function getsub($id){
         $states=DB::table("subs")->where('c_id',$id)->pluck("s_name","id");
             return json_encode($states);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          if($request->hasFile('p_image')){
        $get_image = $request->file('p_image');
        $image = time().Str::random(10).'.'.$get_image->getClientOriginalExtension();
        Image::make($get_image)->resize(300,200)->save(public_path('image/product/'.$image));
    }

     else{
            $image = "default.png";
        }

        product::insert([
            'p_name'=>$request->p_name,
            'c_id'=>$request->country,
            's_id'=>$request->state,
            'p_price'=>$request->p_price,
            'slug'=>$request->p_slug,
            'p_quan'=>$request->p_quan,
            'p_alert'=>$request->p_alert,
            'p_image'=>'image/product/'.$image,
            'p_des'=>$request->p_des,
            'p_summary'=>$request->p_summary
             ]);
        return back();
    }


    public function manage(){
            $products=product::all();
            return view("product.manageproduct",compact('products'));
    }


    public function view(){

        $product=product::latest()->take(16)->get() ;
        return view('adminpages.newproduct',compact('product'));
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
        
    }

    public function edit($id)
    {
        $product = DB::table('products')
                ->select('*')
                ->where('id',$id)
                ->get();
                session(['id' => $id]);
                return view('product.productedit',['product'=>$product]);
                // ->join('product_image','products.p_id','product_image.id')
                
             //    echo "<pre>";
             // print_r($product) ;
             // return view("product.productedit",['product'=>$product]);        
    }

    public function edit1(Request $request)
    {
                $id = $request->session()->get('id');
                $product_image = product::findOrFail($id)->p_image;   

            if($request->hasFile('p_image')){
        $get_image = $request->file('p_image');
        $image = time().Str::random(10).'.'.$get_image->getClientOriginalExtension();
        Image::make($get_image)->resize(300,200)->save(public_path('image/product/'.$image));

         if(file_exists($product_image)){
                    unlink($product_image);
                }
    }

     else{
            $image = $product_image;
                //problem detect
        }

        product::findOrFail($id)->update([
            'p_name'=>$request->p_name,
            'slug'=>$request->p_slug,
            'p_price'=>$request->p_price,
            'p_quan'=>$request->p_quan,
            'p_alert'=>$request->p_alert,
            'p_image'=>'image/product/'.$image,
            'p_des'=>$request->p_des,
            'p_summary'=>$request->p_summary, 
            
             ]);
        return redirect()->back()->with('success','data insert successfully');


    }

    public function delete($id)
    {
         product::findOrFail($id)->delete();
         return back();
    }

 function getdescription($slug){
        $single=DB::table('products')
                ->select('*')
                ->where('slug',$slug)
                ->get();
               
        return view('product.des',compact('single'));
        
    }


    public function filterproduct($id){

              
         $catagory=DB::table('subs')
            ->join('products', 'subs.id', '=', 'products.s_id')
            ->select('products.*')
            ->where('products.p_name', 'like', '%' . $id . '%') 
             ->orWhere('products.slug', 'like', '%' . $id . '%')
             ->orWhere('subs.s_name', 'like', '%' . $id . '%')
            ->get();
            return view("adminpages.searchbycatagory",compact('catagory'));
    }


 
    

    

}
