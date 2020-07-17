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
              <form method="POST" action="{{url('/updatesub')}}" enctype="multipart/form-data">
              {{csrf_field()}} 
               

                <div class="form-group"> 
                  <label for="exampleInputEmail1">catagory name:</label>
                    <select name="c_id" class="form-control">
                     @foreach($catagory_name as $catagory_name)
                      <option value="{{$catagory_name->id}}">{{$catagory_name->c_name}}
                      </option>
                      @endforeach
                    </select>
              </div>

                

              @foreach($catagory as $catagory)
                  <div class="form-group"> 
                  <label for="exampleInputEmail1">subcatagory name:</label> 
                <input type="text" value="{{$catagory->s_name}}" class="form-control" id="exampleInputEmail1" placeholder="catagory type" name="s_name"></div>

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