
@extends('admin.master')
@section('form')
<form action="{{route('updatecart')}}"" method="post">
@csrf
<style type="text/css">
	.buttonfor {
  display: inline-block;
  padding: 15px 25px;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: none;
  color: #fff;
  background-color: #4CAF50;
  border: none;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.buttonfor:hover {background-color: #3e8e41}

.buttonfor:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
}
</style>
<div id="page-wrapper">
      <div class="main-page">
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".1s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Quantity</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>subtotal</th>
                        <th>Remove</th>


                    </tr>
                </thead>
                @foreach($viewcart as $viewcart)
                    <tr class="rem1">
                        <input type="hidden" name="id[{{$viewcart->id}}]" value="{{$viewcart->id}}">
                        <td class="invert-image"><a href=""><img src="{{url($viewcart->product->p_image)}}" alt=" " class="img-responsive" /></a></td>
                        <td class="invert">
                             <div class="quantity"> 
                                <div class="quantity-select">                           
                                    
                                   <div class="product-quantity"><input type="number" id="quantity{{$viewcart->id}}" min="1" name="quantity[{{$viewcart->id}}]" value="{{$viewcart->quantity}}" ></div>
                                    
                                </div>
                            </div>
                        </td>
                        <td class="invert">{{$viewcart->product->p_name}}</td>
                        <td class="invert" id="amount{{$viewcart->id}}">{{$viewcart->product->p_price}}</td>
                        <td class="invert" id="subtotal{{$viewcart->id}}">{{$viewcart->product->p_price*$viewcart->quantity}}</td>
                        <td class="invert-closeb">
                                  <a href="{{url('/delete/cart/')}}/{{$viewcart->id}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash">Delete</span>
                          
                        </td>
 
                    </tr>
                         @endforeach              
            </table>
        </div>
        <div class="checkout-left"> 

          <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".1s">
                    <a class="buttonfor" href="{{url('/view')}}"><span aria-hidden="false"></span>back to shopping </a>
                </div>
                <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".1s">
                <button class="buttonfor" type="submit"><span aria-hidden="true"></span>Update cart{{$coupon}}</button>
                </div>
                  <div class="checkout-right-basket animated wow slideInRight" data-wow-delay=".1s">
                <button class="buttonfor"><span aria-hidden="true"></span><a href="{{url('/checkout')}}">Checkout</a></button>
                </div>

                
                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".1s">
                    <h4>Discount_total</h4>

                    <ul>
                        <li>Discount percentage<i>-</i><span>{{$coupon}}</span></li>
                    <li>Discount amount<i>-</i><span>{{$dis_amount}}</span></li>
                        
                        <li>Total after discount<i>-</i><span>{{$dis_total}}</span></li>
                        
                        
                    </ul>
                   


                </div>

                <div class="checkout-left-basket animated wow slideInLeft" data-wow-delay=".1s">
                    <h4>Product price(single)</h4>
                    @foreach($view as $view)
                    <ul>
                        <li>{{$view->product->p_name}}<i>-</i><span>{{$view->product->p_price*$view->quantity}}</span></li>

                        
                  
                    @endforeach
                    <li>subtotal<i>-</i><span>{{$total}}</span></li>
                    </ul>
                 
                </div>
             <!--    <div><a class="button" style="position: center;" href="{{url('/pdf/download')}}">PDF</a></button></div>
                <div><a class="button" style="position: center;" href="{{url('/excel/download')}}">Excel file</a></button></div> -->


                <div class="clearfix"> </div>

            </div>
            <div style="display: block; background: #ebebeb none repeat scroll 0 0;   box-sizing: border-box;font-family: 'Old Standard TT', serif;color: #666666;font-weight: 400; font-size: 14px;line-height: 24px;-webkit-font-smoothing: antialiased;    color: #fff;text-shadow: none;" class="input">
                        <li><input id="coupon" class="form-control" type="text" value="{{$code ?? ''}}" name="coupon"></li>
                        <a class="couponbtn" style="cursor: pointer;">Enter coupon code</a>
                </div>


    </div>
</div>  
</form>
<!-- //check out -->
@section('footer_js')
<script>
    jQuery(document).ready(function(){
        @foreach($v as $cart)
        jQuery('#quantity{{$cart->id}}').change(function(){
            var quantity{{$cart->id}}=jQuery('#quantity{{$cart->id}}').val();
            var amount{{$cart->id}}=jQuery('#amount{{$cart->id}}').html();
            jQuery('#subtotal{{$cart->id}}').html(quantity{{$cart->id}}*amount{{$cart->id}});

        })
        @endforeach

        jQuery('.couponbtn').click(function(){
          var coupon_code=  jQuery('#coupon').val();
          window.location.href="{{url('/viewcart')}}/"+coupon_code;
        })
   
    })
</script>
@endsection

@endsection