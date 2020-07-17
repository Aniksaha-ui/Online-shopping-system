@extends("admin.master")

@section("form")
	<div id="page-wrapper">
      <div class="main-page">
        <div class="forms">
          <h2 class="title1">Forms</h2>
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4 style=" text-align: center;">New Subcatagory</h4>
            </div>
            <div class="form-body">
              <form method="POST">
              {{csrf_field()}} 

                <div class="form-group"> 
                  <label for="exampleInputEmail1">catagory name:</label>
                    <select name="catagory_id" class="form-control">
                     @foreach($catagory as $catagories)
                      <option value="{{$catagories->id}}">{{$catagories->c_name}}
                      </option>
                      @endforeach
                    </select>
              </div>


                   <div class="form-group"> <label for="exampleInputEmail1">Subcatagory name:</label> 
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter subcatagory name" name="s_name"></div>

             

                <div class="form-group" >
                 
                 <input type="submit" class="btn btn-default" value="Add new catagory" style="background-color: #a6a6a6;  width: 100%; padding:10px; color:black; ">
                 </div>

                    </form> 
            </div>
          </div>
        </div>
      </div>
    </div>
					
@endsection