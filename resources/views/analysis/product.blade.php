<!DOCTYPE html>
@extends('admin.master')
@section('search by catagory')
      <div class="clearfix"></div>
        <h1>Most Selling product</h1>
  
    
       

        <div style="width: 50%;margin:  auto;">
            {!! $chart->container() !!}
        </div>
          
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js" ></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js" charset="utf-8"></script>
  
        {!! $chart->script() !!}
  
        
        @endsection