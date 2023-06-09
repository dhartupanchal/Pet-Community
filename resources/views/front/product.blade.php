@extends('front/layout')
@section('page_title', $product[0]->name)

@section('container')
 <!-- catg header banner section -->
 <!-- <section id="aa-catg-head-banner">
   <div class="aa-catg-head-banner-area">
     <div class="container">
      <div class="aa-catg-head-banner-content">
        <h2>T-Shirt</h2>
        <ol class="breadcrumb">
          <li><a href="index.html">Home</a></li>         
          <li><a href="#">Product</a></li>
        </ol>
      </div>
     </div>
   </div>
  </section> -->
  <!-- / catg header banner section -->

  <!-- product category -->
  <section id="aa-product-details">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="aa-product-details-area">
            <div class="aa-product-details-content">
              <div class="row">
                <!-- Modal view slider -->
                <div class="col-md-5 col-sm-5 col-xs-12">                              
                  <div class="aa-product-view-slider">                                
                    <div id="demo-1" class="simpleLens-gallery-container">
                      <div class="simpleLens-container">
                        <div class="simpleLens-big-image-container"><a data-lens-image="{{asset('storage/media/'.$product[0]->image)}}" div class="simpleLens-lens-image"><img src="{{asset('storage/media/'.$product[0]->image)}}" class="simpleLens-big-image"></a></div>
                      </div>
                     <div class="simpleLens-thumbnails-container">
                        <a data-big-image="{{asset('storage/media/'.$product[0]->image)}}" data-lens-image="{{asset('storage/media/'.$product[0]->image)}}"  width="70 px">
                     </a>


                    @if(isset($product_images[$product[0]->id][0]))
                
                        @foreach($product_images[$product[0]->id] as $list)
                       
                        <a data-big-image="{{asset('storage/media/'.$list->images)}}" data-lens-image="{{asset('storage/media/'.$list->images)}}"><img src="{{asset('storage/media/'.$list->images)}}" width="70 px">
                         </a>

                        @endforeach

                    @endif
                    
                     </div>
                    </div>
                  </div>
                </div>
                <!-- Modal view content -->
                <div class="col-md-7 col-sm-7 col-xs-12">
                  <div class="aa-product-view-content">
                    <h3>{{$product[0]->name}}</h3>
                    <div class="aa-price-block">
                      <span class="aa-product-view-price">Rs. {{$product_attr[$product[0]->id][0]->price}}</span>
                       <p class="aa-product-avilability">Avilability:
                        <span>In Stock</span>
                      @if($product[0]->lead_time!='')
                               <p class="lead_time">
                                {{$product[0]->lead_time}}
                               </p>
                      @endif
                  
                    </div>
                    <p> {!! $product[0]->desc !!}</p>
                    <div class="aa-prod-quantity">
                      <form action="">
                        <select id="qty" name="qty">
                          @for($i=1;$i<11;$i++)
                            <option value="{{$i}}">{{$i}}</option>
                          @endfor
                        </select>
                      </fo
                      <p class="aa-prod-category">
                        Category: <a href="#"></a>
                      </p>
                    </div>
                    <div class="aa-prod-view-bottom">
                      <a class="aa-add-to-cart-btn" onclick="add_to_cart({{ $product[0]->id }})">Add To Cart</a>
                    </div>
                    <div id="add_to_cart_msg"></div>
                  </div>
                </div>
              </div>
            </div>
            <div class="aa-product-details-bottom">
              <ul class="nav nav-tabs" id="myTab2">
                
                <li><a href="#description" data-toggle="tab">Description</a></li> 
                <li><a href="#review" data-toggle="tab">Reviews</a></li> 

              </ul>

              <!-- Tab panes -->
              
              <div class="tab-content">
                <div class="tab-pane fade in active" id="description">
                  {!!$product[0]->desc!!}
                </div>
                <div class="tab-pane fade " id="review">
                 <div class="aa-product-review-area">
                   <h4>2 Reviews for T-Shirt</h4> 
                   <ul class="aa-review-nav">
                     <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                      <li>
                        <div class="media">
                          <div class="media-left">
                            <a href="#">
                              <img class="media-object" src="img/testimonial-img-3.jpg" alt="girl image">
                            </a>
                          </div>
                          <div class="media-body">
                            <h4 class="media-heading"><strong>Marla Jobs</strong> - <span>March 26, 2016</span></h4>
                            <div class="aa-product-rating">
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star"></span>
                              <span class="fa fa-star-o"></span>
                            </div>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                          </div>
                        </div>
                      </li>
                   </ul>
                   <h4>Add a review</h4>
                   <div class="aa-your-rating">
                     <p>Your Rating</p>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                     <a href="#"><span class="fa fa-star-o"></span></a>
                   </div>
                   <!-- review form -->
                   <form action="" class="aa-review-form">
                      <div class="form-group">
                        <label for="message">Your Review</label>
                        <textarea class="form-control" rows="3" id="message"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Name">
                      </div>  
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="example@gmail.com">
                      </div>

                      <button type="submit" class="btn btn-default aa-review-submit">Submit</button>
                   </form>
                 </div>
                </div>            
              </div>
            </div>
            <!-- Related product -->
            <div class="aa-product-related-item">
              <h3>Related Products</h3>
              <ul class="aa-product-catg aa-related-item-slider">
              @if(isset($related_product[0]))
                      @foreach($related_product as $productArr)
                        <li>
                          <figure>
                            <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                            <a class="aa-add-card-btn" href="javascript:void(0)" onclick="add_to_cart($productArr->id)">Add To Cart</a>
                            <figcaption>
                              <h4 class="aa-product-title"><a href="#">{{$productArr->name}}</a></h4>
                              <span class="aa-product-price">Rs {{ reset($related_product_attr[$productArr->id])[0]->mrp ?? null }}</span><span class="aa-product-price"><del></del></span>
                            </figcaption>
                          </figure>                          
                        </li> 
                       @endforeach  
                        @else
                        <li>
                            <figure>
                                No data found
                            </figure>
                        </li>
                        @endif     
                                                                         
              </ul>  
            </div>  
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- / product category -->
<form id="frmAddToCart">
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" id="pqty" name="pqty"/>
<input type="hidden" id="product_id" name="product_id"/>
</form>
 
@endsection