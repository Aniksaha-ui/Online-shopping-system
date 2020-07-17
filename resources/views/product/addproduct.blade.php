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
              <form method="POST" enctype="multipart/form-data">
              {{csrf_field()}} 
                   <div class="form-group"> 
                   <label for="exampleInputEmail1">product name:</label> 
                <input type="text" class="form-control" id="product_name" placeholder="product name" name="p_name"></div>

                <div class="form-group"> 
                   <label for="exampleInputEmail1">slug:</label> 
                <input type="text" class="form-control" id="slug" placeholder="product name" name="p_slug"></div>

              <div class="form-group">
                <label for="country">Select catagory:</label>
                <select name="country" class="form-control" style="width:250px">
                    <option value="">--- Select Country ---</option>
                    @foreach ($countries as $key => $value)
                    <option value="{{ $key }}">{{ $value }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="state">Select State:</label>
                <select name="state" class="form-control"style="width:250px">
                <option>--State--</option>
                </select>
            </div>



                  <div class="form-group"> 
                  <label for="exampleInputEmail1">product price:</label> 
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="product price" name="p_price"></div>
<div class="form-group"> 

                  <label for="exampleInputEmail1">product quantity:</label> 
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="product quantity" name="p_quan"></div>
<div class="form-group"> 
                  <label for="exampleInputEmail1">alert Quantity:</label> 
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="alert" name="p_alert"></div>

<div class="form-group"> 
                  <label for="exampleInputEmail1">product image:</label> 
                <input type="file" class="form-control" id="exampleInputEmail1" placeholder="product price" name="p_image"></div>
      <div class="form-group"> 
                  <label for="exampleInputEmail1">product description:</label> 
                <textarea class="form-control my-editor" id="my-editor" placeholder="product description" name="p_des"></textarea>
</div>

<div class="form-group"> 
                  <label for="exampleInputEmail1">product summary:</label> 
                                <textarea class="form-control my-editor" id="my-editor" placeholder="product description" name="p_summary"></textarea>
                              </div>
<div class="form-group">      
                 <input type="submit" class="btn btn-default" value="Add new catagory" style="background-color: #a6a6a6;  width: 100%; padding:10px; color:black; ">
                 </div>
<div class="form-group"> 
                    </form> 
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection