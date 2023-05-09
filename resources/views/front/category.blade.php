@extends('front/layout')
@section('page_title','Category')
@section('container')
<style>
   .demo {
      padding: 30px;
      min-height: 280px;
   }

   .tab-content {
      padding: 10px;
   }

   @nav-link-hover-bg: #eeeeee;
   @nav-tabs-border-color: #dddddd;
   @border-radius-base: 5px;
   @screen-xs-max: 767px;


   //css to add hamburger and create dropdown
   .nav-tabs.nav-tabs-dropdown,
   .nav-tabs-dropdown {
      @media (max-width: @screen-xs-max) {
         border: 1px solid @nav-tabs-border-color;
         border-radius: @border-radius-base;
         overflow: hidden;
         position: relative;

         &::after {
            content: "☰";
            position: absolute;
            top: 8px;
            right: 15px;
            z-index: 2;
            pointer-events: none;
         }

         &.open {
            a {
               position: relative;
               display: block;
            }

            >li.active>a {
               background-color: @nav-link-hover-bg;
            }
         }


         li {
            display: block;
            padding: 0;
            vertical-align: bottom;
         }

         >li>a {
            position: absolute;
            top: 0;
            left: 0;
            margin: 0;
            width: 100%;
            height: 100%;
            display: inline-block;
            border-color: transparent;

            &:focus,
            &:hover,
            &:active {
               border-color: transparent;
            }
         }

         >li.active>a {
            display: block;
            border-color: transparent;
            position: relative;
            z-index: 1;
            background: #fff;

            &:focus,
            &:hover,
            &:active {
               border-color: transparent;
            }

         }
      }
   }
</style>
<section id="aa-product-category">
   <div class="container">
      <div class="row">
         <div class="col-md-3 col-sm-3 col-xs-3">
            <ul class="nav nav-tabs nav-stacked">
               @foreach($home_categories as $list)
               <li class=""><a href="#cat{{$list->id}}" data-toggle="tab">{{$list->category_name}}</a></li>
               @endforeach
               <!-- <li>
                  <a href="#tab_6_2" data-toggle="tab"> Walking </a>
               </li>
               <li>
                  <a href="#tab_6_3" data-toggle="tab"> Sitting </a>
               </li>
               <li>
                  <a href="#tab_6_4" data-toggle="tab"> Training </a>
               </li>
               <li>
                  <a href="#tab_6_5" data-toggle="tab"> Artistic </a>
               </li>
               <li>
                  <a href="#tab_6_6" data-toggle="tab"> Veterinarian </a>
               </li>
               <li>
                  <a href="#tab_6_7" data-toggle="tab"> Photography </a>
               </li>
               <li>
                  <a href="#tab_6_8" data-toggle="tab"> Other </a>
               </li> -->
            </ul>
         </div>
         <div class="col-md-9 col-sm-9 col-xs-9">
            <div class="tab-content">
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
</section>
@endsection