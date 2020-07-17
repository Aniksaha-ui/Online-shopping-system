@extends('admin.master')
@section('search by catagory')
<h2 class="title__line"></h2>
             <section class="htc__category__area ptb--100">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <div class="section__title--2 text-center">
                            <h2 class="title__line">Search by catagory</h2>
                            <p></p>
                        </div>
                    </div>
                </div>
               
                <div class="htc__product__container">
                    <div class="row">
                     @foreach($product as $item)
                      
                            <!-- Start Single Category -->
                            
                            <div class="col-md-4 col-lg-3 col-sm-4 col-xs-12">
                                <div class="category">
                                    <div class="ht__cat__thumb">
                                            <div class="row">
                                            <div class="column">
                    <img src="{{url($item->p_image)}}" alt="Snow" style="width:100%">
                        <li><a href="{{url('/product_description/'.$item->slug)}}"><i class="icon-shuffle icons"></i>{{$item->slug}}</a>
                                   <i class="fas fa-dollar-sign">tk.{{$item->p_price}}</i>        
                                         
                                             </div>


 
                                    </div>

                                    <div class="fr__hover__info">
                                        <ul class="product__action">
                                            <li>
                                            <a href="{{url('/single/cart/')}}/{{$item->id}}"><i class="icon-handbag icons"></i></a>

                                            
                                            <a href="wishlist.html"><i class="icon-heart icons"></i></a>
 
                                        </li>
                                        </ul>
                                    </div>
                                  
                                    </div>
                                </div>
                            </div>
                            
                         
                           @endforeach
                            <!-- End Single Category -->    
                        </div>
                         
                    </div>


                </div>
                        
        </section>
@endsection