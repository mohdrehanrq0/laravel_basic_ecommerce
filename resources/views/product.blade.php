@extends('layout')
@section('content')


<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url({{ asset('images/bg/4.jpg') }}) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="/">Home</a>
                          <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                          <a class="breadcrumb-item" href="/">Products</a>
                          <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                          <span class="breadcrumb-item active">{{$single->name}}</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

@if(session('success'))
    <div class="alert alert-success my-4">
        {{session('success')}}
    </div>
@endif



<!-- Start Product Details Area -->
<section class="htc__product__details bg__white ptb--100">
    <!-- Start Product Details Top -->
    <div class="htc__product__details__top">
        <div class="container">
            <div class="row">
                <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12">
                    <div class="htc__product__details__tab__content">
                        <!-- Start Product Big Images -->
                        <div class="product__big__images">
                            <div class="portfolio-full-image tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="img-tab-1">
                                    <img src="{{ asset('upload/product/'.$single->image) }}" alt="full-image">
                                </div>
                               
                            </div>
                        </div>
                        <!-- End Product Big Images -->
                        <!-- Start Small images -->
                        {{-- <ul class="product__small__images" role="tablist">
                            <li role="presentation" class="pot-small-img active">
                                <a href="#img-tab-1" role="tab" data-toggle="tab">
                                    <img src="{{ asset('upload/product/'.$single->image) }}" alt="small-image">
                                </a>
                            </li>
                            
                        </ul> --}}
                        <!-- End Small images -->
                    </div>
                </div>
                <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 smt-40 xmt-40">
                    <div class="ht__product__dtl">
                        <h2>{{$single->name}}</h2>
                       
                        
                        <ul  class="pro__prize">
                            <li class="old__prize">${{$single->mrp}}</li>
                            <li>${{$single->price}}</li>
                        </ul>
                        <p class="pro__info">{{$single->description}}</p>
                        <div class="ht__pro__desc">
                            <div class="sin__desc">
                                <p><span>Availability:</span>
                                @if ($single->qty == 0)
                                    <span style="color:red;">Not available</span>
                                @else
                                    In Stock
                                @endif
                                
                                </p>
                            </div>
                            <br>
                            <div class="stock-btn contact-box name" style="display:flex;">
                                <form action="/addtocart/{{$single->id}}" method="post" style="display:flex;white-space:nowrap;">
                                    @csrf
                                    <input type="number" class="cart-qty" placeholder="Quantity" min="1" required name="cartqty">&nbsp;&nbsp;
                                    <button type="submit" class="fv-btn">Add to cart</button>
                                </form>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                {{-- <a href="#" class="fv-btn" style="padding: 12px 30px">Buy</a> --}}
                            </div>
                            
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Product Details Top -->
</section>
<!-- End Product Details Area -->

    
@endsection