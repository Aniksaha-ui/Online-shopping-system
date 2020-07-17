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
              <form method="POST" action="{{url('/updatecatagory')}}" enctype="multipart/form-data">
              {{csrf_field()}} 
              @foreach($catagory as $catagory)
                   <div class="form-group"> 
                   <label for="exampleInputEmail1">catagory name:</label> 
                <input type="text" value="{{$catagory->c_name}}" class="form-control" id="exampleInputEmail1" placeholder="catagory" name="c_name"></div>
                  <div class="form-group"> 
                  <label for="exampleInputEmail1">catagory type:</label> 
                <input type="text" value="{{$catagory->c_type}}" class="form-control" id="exampleInputEmail1" placeholder="catagory type" name="c_type"></div>

<div class="form-group">      
                 <input type="submit" class="btn btn-default" value="Update" style="background-color: #a6a6a6;  width: 100%; padding:10px; color:black; ">
                 </div>
<div class="form-group"> s
                    </form> 
                    @endforeach
            </div>
          </div>
        </div>
      </div>
    </div>
          

@endsection