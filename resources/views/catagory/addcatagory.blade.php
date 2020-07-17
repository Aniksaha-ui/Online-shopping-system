@extends("admin.master")

@section("form")
	<div id="page-wrapper">
      <div class="main-page">
        <div class="forms">
          <h2 class="title1">Forms</h2>
          <div class="form-grids row widget-shadow" data-example-id="basic-forms"> 
            <div class="form-title">
              <h4 style=" text-align: center;">New catagory</h4>
            </div>
            <div class="form-body">
              <form method="POST">
              {{csrf_field()}} 

                   <div class="form-group"> <label for="exampleInputEmail1">catagory name:</label> 
                <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter catagory name" name="c_name"></div>

                <div class="form-group"> 
                
                <label for="exampleInputPassword1">catagory type:</label> 

                <input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter catagory type" name="c_type"> </div> 

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