@extends('admin.master')
@section('form')
 <div id="page-wrapper">
      <div class="main-page">
        <div class="forms">
          <h2 class="title1">Forms</h2>
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4>New product Form:</h4>
            </div>
            <div class="form-body">
              <form method="POST" action="{{url('/updateproduct')}}" enctype="multipart/form-data">
              {{csrf_field()}} 
              @foreach($product as $product)
                   <div class="form-group"> 
                   <label for="exampleInputEmail1">product name:</label> 
                <input type="text" value="{{$product->p_name}}" id="product_name" class="form-control" id="exampleInputEmail1" placeholder="product name" name="p_name"></div>

                <div class="form-group"> 
                   <label for="exampleInputEmail1">Slug:</label> 
                <input type="text" value="{{$product->slug}}" id="slug" class="form-control" id="exampleInputEmail1" placeholder="product name" name="p_slug"></div>





                  <div class="form-group"> 
                  <label for="exampleInputEmail1">product price:</label> 
                <input type="text" value="{{$product->p_price}}" class="form-control" id="exampleInputEmail1" placeholder="product price" name="p_price"></div>
<div class="form-group"> 

                  <label for="exampleInputEmail1">product quantity:</label> 
                <input type="text" value="{{$product->p_quan}}" class="form-control" id="exampleInputEmail1" placeholder="product quantity" name="p_quan"></div>
<div class="form-group"> 
                  <label for="exampleInputEmail1">alert Quantity:</label> 
                <input type="text" class="form-control" value="{{$product->p_alert}}" id="exampleInputEmail1" placeholder="alert" name="p_alert"></div>



<div class="form-group"> 
                  <label for="exampleInputEmail1">Image preview:</label> 
                  <input type="file" onchange="document.getElementById('image').src = window.URL.createObjectURL(this.files[0])" name="p_image">
                  <img style="width: 150px; border-radius: 60%" id="image" src="{{URL($product->p_image)}}">



                 <div class="form-group"> 
                  <label for="exampleInputEmail1">product description:</label> 
                <textarea class="form-control my-editor" value="{{$product->p_des}}" id="my-editor" placeholder="product description" name="p_des"></textarea>
				</div>



							<div class="form-group"> 
                  <label for="exampleInputEmail1">product summary:</label> 
                                <textarea class="form-control" value="{{$product->p_summary}}" placeholder="product description" name="p_summary"></textarea>
                              </div>



<div class="form-group">      
                 <input type="submit" class="btn btn-default" value="Update" style="background-color: #a6a6a6;  width: 100%; padding:10px; color:black; ">
                 </div>
<div class="form-group"> 
                    </form> 
                    @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
  <!--  <script type="text/javascript">
   	   $('#product_name').keyup(function() {
            $('#slug').val($(this).val().toLowerCase().split(',').join('').replace(/\s/g,"-"));
        });

   </script>     -->   

@endsection