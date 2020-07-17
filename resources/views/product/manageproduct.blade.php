@extends('admin.master')
@section('form')
        <div id="page-wrapper">
      <div class="main-page">

              <hr>
              <table class="table table-hover">
              <thead>
               <tr>
                    <th>product id</th>
                    <th>Product name </th>
                    <th>Catagory id</th>
                    <th>product price</th>
                    <th>product quantity</th>
                    <th>product image</th>
                    
                    <th>Action</th>
                </tr>
              </thead>
                  <tbody>
                    @foreach($products as $products)
                      <tr>
                      <th scope="row">{{$products->id}}
                        <td>{{$products->p_name}}</td>
                          <td>{{$products->c_id}}</td>
                          <td>{{$products->p_price}}</td>
                          <td>{{$products->p_quan}}</td>
                          <td><img style="width: 50px; border-radius: 60%" src="{{$products->p_image}}"></td>
                         <td>
                          <a href="{{URL('product/edit/'.$products->id)}}" class="btn btn-success">
                            <span class="glyphicon glyphicon-edit">Edit</span>  
                            <a href="{{URL('product/delete/'.$products->id)}}" class="btn btn-danger">
                            <span class="glyphicon glyphicon-trash">Delete</span>
                            

                          </td>
                          
                      </th>
                    </tr>

                    @endforeach
                  </tbody>
              </table>
              </div>
              </div>

      @endsection