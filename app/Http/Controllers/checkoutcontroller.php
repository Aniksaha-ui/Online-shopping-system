<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\cart;
use App\billings; 
use App\shipping;
use App\product;
use App\sale;
class checkoutcontroller extends Controller
{
   
    public function checkout(){
             $total=0;
            $user_id=Auth::id();

            // dd($user_id);
            $cart=cart::where('user_id',Auth::id())->get();
            $discount_total=session('discount_total');
            $data=cart::where('user_id',Auth::id())->count();
            $v =cart::where('user_id',Auth::id())->get();
        
            foreach ($v as $value) {
                $total += $value->product->p_price*$value->quantity;
            }
            $subtotal=$total-$discount_total;

            $user_info=shipping::where('user_id',$user_id)->latest()->take(1)->get();

            

        return view('checkout.checkout',compact('user_id','total','discount_total','data','subtotal','user_info'));

    }

    public function stripe(){

    
        $user_shipping=shipping::where('user_id',$user_id)->latest()->first();
       

    	return view('checkout.checkout',compact('user_shipping'));
    }


    public function stripepost(Request $request){

       
    		$cart=cart::where('user_id',Auth::id())->get();	
    		$shipping_id=shipping::insertGetId([
    			
    			'user_id'=>Auth::id(),
    			'fname'=>$request->f_name,
    			'lname'=>$request->l_name,
    			'company'=>$request->company,
    			'address'=>$request->address,
    			'house_no'=>$request->House,
    			'phone'=>$request->phone,
    			'email'=>$request->email,
                'payment_status'=>'visa',
    		
    		]);
    		$discount_total=session('discount_total');

    		$sale_id=sale::insertGetId([

    			'user_id'=>Auth::id(),
    			'shipping_id'=>$shipping_id,
    			'total'=>$discount_total,

    		]);

    		foreach ($cart as $item) {
    			$billings=billings::insert([

    				'sale_id'=>$sale_id,
    				'user_id'=>Auth::id(),
    				'product_id'=>$item->product->id,
    				'product_quantity'=>$item->quantity,
    				'product_price'=>$item->product->p_price,
    				'payment_method'=>'Null'
    			]);


    			product::findOrfail($item->p_id)->decrement('p_quan',$item->quantity);
    			$item->delete();
    		}


    		\Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $charge=\Stripe\Charge::create ([

                "amount" => 100 * $discount_total,
                "currency" => "usd",
                "source" =>'tok_visa',
                "description" => "Test payment from itsolutionstuff.com." 

        ]);

        	return redirect('/view');







    }

}
