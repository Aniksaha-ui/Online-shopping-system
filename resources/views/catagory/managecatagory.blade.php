@extends('admin.master')
@section('form')
        <div id="page-wrapper">
      <div class="main-page">

              <hr>
              <table class="table table-hover">
              <thead>
               <tr>
                    <th>catagory id</th>
                    <th>Catagory name</th>
                    <th>catagory type</th>
                    <th>Action</th>
                </tr>
              </thead>
                  <tbody>
                    @foreach($catagory as $catagory)
                    <tr>
                      <th scope="row">{{$catagory->id}}
                          <td>{{$catagory->c_name}}</td>
                          <td>{{$catagory->c_type}}</td>
                          <td>
                          <a href="{{URL('catagory/edit/'.$catagory->id)}}" class="btn btn-success">
                            <span style="width: 50px; border-radius: 60% class="glyphicon glyphicon-edit">Edit</span>  
                            <a href="{{URL('catagory/delete/'.$catagory->id)}}" class="btn btn-danger">
                            <span  class="glyphicon glyphicon-trash">Delete</span>
                            

                          </td>
                          
                      </th>
                    </tr>
                    @endforeach
                  </tbody>
              </table>
              </div>
              </div>

      @endsection