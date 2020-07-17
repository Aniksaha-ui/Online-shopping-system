@extends('admin.master')
@section('form')
        <div id="page-wrapper">
      <div class="main-page">

              <hr>
              <table class="table table-hover">
              <thead>
               <tr>
                    <th>sub catagory id</th>
                    <th>catagory</th>
                    <th>subcatagory name</th>
                    
                    <th>Action</th>
                </tr>
              </thead>
                  <tbody>
                    @foreach($subs as $sub)
                    <tr>
                      <th scope="row">{{$sub->id}}
                         <td>{{$sub->c_name}}</td>
                          <td>{{$sub->s_name}}</td>
                         
                          <td>
                          <a href="{{URL('sub/edit/'.$sub->id)}}" class="btn btn-success">
                            <span style="width: 50px; border-radius: 60% class="glyphicon glyphicon-edit">Edit</span>  
                            <a href="{{URL('sub/delete/'.$sub->id)}}" class="btn btn-danger">
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