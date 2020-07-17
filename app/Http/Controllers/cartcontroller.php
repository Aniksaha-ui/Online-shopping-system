<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\cart;
use PDF;
use DB;
use App\coupon;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Mail;
class cartcontroller extends Controller
{
 
        public function singlecart($id,request $request)
        {   
                $user_id=Auth::id();
                if($user_id==null){
                    return view("auth.login");
                }
         //jodi ei product age ekber add kora takhe tahole update korbe
              $cart_cheke=cart::where('p_id',$id)->where('user_id',$user_id)->count();

        if($cart_cheke){
                cart::where('p_id',$id)->where('user_id',Auth::id())->increment('quantity',1); 
                return redirect()->back()->with('success','data insert successfully');           
        }
        //naile insert korbe
        else{
          cart::insert([
                'p_id'=>$id,
                'user_id'=>$user_id,
                'quantity'=> 1,
        ]);
        }
        return back();
    }

public function viewcart($code=''){
        $mac=exec('getmac');
        $mac=strtok($mac,' ');
        $coupon=0;
        $total=0;
        $dis_amount=0;
        $dis_total=0;
        if($code==''){

                    $v =cart::where('user_id',Auth::id())->get();
        
            foreach ($v as $value) {
                $total += $value->product->p_price*$value->quantity;
            }


        $viewcart=cart::where('user_id',Auth::id())->get();
        $view=cart::where('user_id',Auth::id())->get();
        $v=cart::where('user_id',Auth::id())->get();
        $dis_total=$total;
        session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total]);

        return view('cart.viewcart',compact('viewcart','view','v','coupon','total','dis_amount','dis_total'));
  }
  else
  {

    $data = cart::where('user_id',Auth::id())->get();
        
            foreach ($data as $value) {
                $total += $value->product->p_price*$value->quantity;
            }


        if(coupon::where('coupon_code',$code)->exists()){
            if(Carbon::now()<= coupon::where('coupon_code',$code)->first()->coupon_validity){
                $coupon=coupon::where('coupon_code',$code)->first()->coupon_discount;
                $dis_amount=(($total*$coupon)/100);
                $dis_total=$total-$dis_amount;
                session(['dis_amount' => $dis_amount , 'total' => $total,'discount_total' => $dis_total]);
            }
            else
            {
                  $dis_total=$total;
            }
        }
        else{
            return redirect('/viewcart'); 
        }

        $viewcart=cart::where('user_id',Auth::id())->get();
        $view=cart::where('user_id',Auth::id())->get();
        $v=cart::where('user_id',Auth::id())->get();
        return view('cart.viewcart',compact('viewcart','view','v','code','coupon','value','total','dis_amount','dis_total'));



        }
}

  public function updatecart(Request $request)
  {
        foreach ($request->id as $key => $value) {
               cart::findOrFail($value)->update([
                
                    'quantity' => $request->quantity[$key]
                ]);

               }
               return back();  
        }



          public function deletecart($id){
                cart::findOrFail($id)->delete();
                return back();
  }

      public function pdfdownload(){

            $cart=cart::where('user_id',Auth::id())->get();
            $id=Auth::id();
            
            $total=0;
            $pdf=PDF::loadview('welcome',compact('cart','total','id'));
                $discount_total=session('discount_total');
                foreach ($cart as $value) {
                $total += $value->product->p_price*$value->quantity;
            }


            
        try{
            Mail::send('welcome',compact('cart','id','discount_total','total'), function($message)use($cart,$pdf,$discount_total,$total) {
            $message->to('sahaanik1045@gmail.com')
            ->subject("Your Order")
            ->attachData($pdf->output(), "invoice.pdf");
            });
        }catch(JWTException $exception){
            $this->serverstatuscode = "0";
            $this->serverstatusdes = $exception->getMessage();
        }
        if (Mail::failures()) {
             $this->statusdesc  =   "Error sending mail";
             $this->statuscode  =   "0";

        }else{

           $this->statusdesc  =   "Message sent Succesfully";
           $this->statuscode  =   "1";
        }
        return "OK";
        
    }






}
