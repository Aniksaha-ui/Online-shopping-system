@extends('admin.master')
@section('form')
<script src="https://js.stripe.com/v3/"></script
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script> 
		<div id="page-wrapper">
      <div class="main-page">
        <div class="table-responsive checkout-right animated wow slideInUp" data-wow-delay=".1s">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>User id</th>
                        <th>Total Product</th>
                        <th>Discount without total</th>
                         <th>Discount with total</th>
                    </tr>

                </thead>
              
                <td class="invert">{{$user_id}}</td>
                
  
               <td class="invert">{{$data}}</td>
                
                <td class="invert">{{$total}}</td>
               <td class="invert">{{$discount_total}}</td>
                        
            </table>
        </div>
        <br>
        <script src="https://js.stripe.com/v3/"></script>
        <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">

              <h4 style=" text-align: center;">Payment Information</h4>
            </div>
            <div class="form-body">
              
              <form action="{{url('\stripe')}}" method="post" id="payment-form">
              {{csrf_field()}} 
             
                      <h4 style=" text-align: center;">Shipping Address</h4>
                      
                   <div class="form-group"> <label for="exampleInputEmail1">first name</label> 
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter catagory name" name="f_name"></div>

                <div class="form-group"> 
                
                <label for="exampleInputPassword1">Last name</label> 

                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter catagory type" name="l_name"> </div> 
                <div class="form-group"> 
                <label for="exampleInputPassword1">Company Name</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter catagory type" name="company"> </div> 

                  <div class="form-group"> 
                <label for="exampleInputPassword1">Enter your Address</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter catagory type" name="address"> </div> 

                  <div class="form-group"> 
                <label for="exampleInputPassword1">House No</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter catagory type" name="House"> </div>

                  <div class="form-group"> 
                <label for="exampleInputPassword1">Phone No/Mobile No</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter catagory type" name="phone"> </div> 

                    <div class="form-group"> 
                <label for="exampleInputPassword1">Email</label>
                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter catagory type" name="email"> </div> 
                <br>
                <h1>Card Information</h1>
                <div class="form-row">
                <label for="card-element">
                  Credit or debit card
                </label>
                <div id="card-element">
                  <!-- A Stripe Element will be inserted here. -->
                </div>

                <!-- Used to display form errors. -->
                <div id="card-errors" role="alert"></div>
              </div>

              <button>Confirm</button>
              <button><a href="{{url('/pdf/download')}}">PDF</a></button>

                  
                
                    </form> 
            </div>


                <style>
                    .StripeElement {
  box-sizing: border-box;

  height: 40px;

  padding: 10px 12px;

  border: 1px solid transparent;
  border-radius: 4px;
  background-color: white;

  box-shadow: 0 1px 3px 0 #e6ebf1;
  -webkit-transition: box-shadow 150ms ease;
  transition: box-shadow 150ms ease;
}

.StripeElement--focus {
  box-shadow: 0 1px 3px 0 #cfd7df;
}

.StripeElement--invalid {
  border-color: #fa755a;
}

.StripeElement--webkit-autofill {
  background-color: #fefde5 !important;
}
                </style>



<script>
    var stripe = Stripe('pk_test_hRUgpyO5XNWV4r0PKKyxTuTA00rYmp3AGq');

// Create an instance of Elements.
var elements = stripe.elements();

// Custom styling can be passed to options when creating an Element.
// (Note that this demo uses a wider set of styles than the guide below.)
var style = {
  base: {
    color: '#32325d',
    fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
    fontSmoothing: 'antialiased',
    fontSize: '16px',
    '::placeholder': {
      color: '#aab7c4'
    }
  },
  invalid: {
    color: '#fa755a',
    iconColor: '#fa755a'
  }
};

// Create an instance of the card Element.
var card = elements.create('card', {style: style});

// Add an instance of the card Element into the `card-element` <div>.
card.mount('#card-element');

// Handle real-time validation errors from the card Element.
card.on('change', function(event) {
  var displayError = document.getElementById('card-errors');
  if (event.error) {
    displayError.textContent = event.error.message;
  } else {
    displayError.textContent = '';
  }
});

// Handle form submission.
var form = document.getElementById('payment-form');
form.addEventListener('submit', function(event) {
  event.preventDefault();

  stripe.createToken(card).then(function(result) {
    if (result.error) {
      // Inform the user if there was an error.
      var errorElement = document.getElementById('card-errors');
      errorElement.textContent = result.error.message;
    } else {
      // Send the token to your server.
      stripeTokenHandler(result.token);
    }
  });
});

// Submit the form with the token ID.
function stripeTokenHandler(token) {
  // Insert the token ID into the form so it gets submitted to the server
  var form = document.getElementById('payment-form');
  var hiddenInput = document.createElement('input');
  hiddenInput.setAttribute('type', 'hidden');
  hiddenInput.setAttribute('name', 'stripeToken');
  hiddenInput.setAttribute('value', token.id);
  form.appendChild(hiddenInput);

  // Submit the form
  form.submit();
}
</script>









    </div>
</div>

@endsection