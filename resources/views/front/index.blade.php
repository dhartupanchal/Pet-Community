@extends('front/layout')
@section('page_title','Home Page')

@section('container')

<section id="aa-slider">
  <div class="aa-slider-area">
    <div id="sequence" class="seq">
      <div class="seq-screen">
        <ul class="seq-canvas">
          <!-- single slide item -->
          @foreach($home_banner as $list)
          <li>
            <div class="seq-model">
              <img data-seq src="{{asset('storage/media/banner/'.$list->image)}}" />
            </div>
            @if($list->btn_txt!='')
            <div class="seq-title">
              <a data-seq target="_blank" href="{{$list->btn_link}}" class="aa-shop-now-btn aa-secondary-btn">{{$list->btn_txt}}</a>
            </div>
            @endif
          </li>
          @endforeach
        </ul>
      </div>
      <!-- slider navigation btn -->
      <fieldset class="seq-nav" aria-controls="sequence" aria-label="Slider buttons">
        <a type="button" class="seq-prev" aria-label="Previous"><span class="fa fa-angle-left"></span></a>
        <a type="button" class="seq-next" aria-label="Next"><span class="fa fa-angle-right"></span></a>
      </fieldset>
    </div>
  </div>
</section>
<!-- / slider -->
<!-- Start Promo section -->
<section id="aa-promo">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="aa-promo-area">
          <div class="row">
            <div class="col-md-12 no-padding">
              <div class="aa-promo-right">
                @foreach($home_categories as $list)
                <div class="aa-single-promo-right">
                  <div class="aa-promo-banner">
                    <img src="{{asset('storage/media/category/'.$list->category_image)}}" alt="img">
                    <div class="aa-prom-content">
                      <h4><a href="{{url('category/'.$list->category_slug)}}">{{$list->category_name}}</a></h4>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Promo section -->
<!-- Products section -->
<section id="aa-product">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-product-area">
            <div class="aa-product-inner">
              <!-- start prduct navigation -->
              <ul class="nav nav-tabs aa-products-tab">
                @foreach($home_categories as $list)
                <li class=""><a href="#cat{{$list->id}}" data-toggle="tab">{{$list->category_name}}<a></li>
                @endforeach
              </ul>
              <!-- Tab panes -->
              <div class="tab-content"> <br>
                <!-- Start men product category -->
                @php
                $loop_count=1;
                @endphp
                @foreach($home_categories as $list)
                @php
                $cat_class="";
                if($loop_count==1){
                $cat_class="in active";
                $loop_count++;
                }

                @endphp
                <div class="tab-pane fade {{$cat_class}}" id="cat{{$list->id}}">
                  <ul class="aa-product-catg">
                    @if(isset($home_categories_product[$list->id][0]))
                    @foreach($home_categories_product[$list->id] as $productArr)
                    <li>
                      <figure>
                        <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                        <a class="aa-add-card-btn" href="{{url('product/'.$productArr->slug)}}" onclick="add_to_cart('{{$productArr->id}}')"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                        <figcaption>
                          <h4 class="aa-product-title"><a href="#">{{$productArr->name}}</a></h4>
                          <span class="aa-product-price">Rs {{ reset($home_product_attr[$productArr->id])[0]->mrp ?? null }}</span><span class="aa-product-price"><del></del></span>
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
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / Products section -->
<!-- banner section -->
<section id="aa-banner">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
         
        </div>
      </div>
    </div>
  </div>
</section>
<!-- popular section -->
<section id="aa-popular-category">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="row">
          <div class="aa-popular-category-area">
            <!-- start prduct navigation -->
            <ul class="nav nav-tabs aa-products-tab">
              <li class="active"><a href="#tranding" data-toggle="tab">Tranding</a></li>
            </ul>
            <!-- Tab panes -->
            <div class="tab-content">
              <!-- Start men tranding category -->
              <div class="tab-pane fade in active" id="tranding">
                <ul class="aa-product-catg aa-tranding-slider">
                  <!-- start single product item -->

                  @if(isset($home_tranding_product[$list->id][0]))
                  @foreach($home_tranding_product[$list->id] as $productArr)
                  <li>
                    <figure>
                      <a class="aa-product-img" href="{{url('product/'.$productArr->slug)}}"><img src="{{asset('storage/media/'.$productArr->image)}}" alt="{{$productArr->name}}"></a>
                      <a class="aa-add-card-btn" href="{{url('product/'.$productArr->slug)}}"><span class="fa fa-shopping-cart"></span>Add To Cart</a>
                      <figcaption>
                        <h4 class="aa-product-title"><a href="#">{{$productArr->name}}</a></h4>
                        <span class="aa-product-price">Rs {{ $home_product_attr[$productArr->id][0]->mrp ?? null}}</span><span class="aa-product-price"><del></del></span>
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
              <!-- / popular product category -->

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- / popular section -->

<input type="hidden" id="qty" value="1" <form id="frmAddToCart">
<meta name="csrf-token" content="{{ csrf_token() }}">
<input type="hidden" id="pqty" name="pqty" />
<input type="hidden" id="product_id" name="product_id" />
</form>

@endsection