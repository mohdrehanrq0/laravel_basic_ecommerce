@extends('layout')
@section('content')


<!-- Start Bradcaump area -->
<div class="ht__bradcaump__area" style="background: rgba(0, 0, 0, 0) url(images/bg/4.jpg) no-repeat scroll center center / cover ;">
    <div class="ht__bradcaump__wrap">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="bradcaump__inner">
                        <nav class="bradcaump-inner">
                          <a class="breadcrumb-item" href="index.html">Home</a>
                          <span class="brd-separetor"><i class="zmdi zmdi-chevron-right"></i></span>
                          <span class="breadcrumb-item active">Order Page</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- End Bradcaump area -->
<!-- cart-main-area start -->
<div class="cart-main-area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <form action="#">               
                    <div class="table-content table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">products</th>
                                    <th class="product-name">name of products</th>
                                    <th class="product-price">Payment Method</th>
                                    <th class="product-price">Payment Status</th>
                                    <th class="product-quantity">Status</th>
                                    <th class="product-subtotal">Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                   $order_count = 2;    
                                ?>
                                @if($order_count == 0)
                                    <tr>
                                        <td colspan="6"> <p>Please add some Product in a cart</p></td>
                                    </tr>
                                @endif
                                    @foreach($order as $order)
                                    
                                        <tr>
                                            <td class="product-thumbnail"><a href="#"><img src="upload/product/{{$order->image}}" alt="product img" /></a></td>
                                            <td class="product-name"><a href="#">{{$order->name}}</a>
                                                <ul  class="pro__prize">
                                                    <li class="old__prize">${{$order->mrp}}</li>
                                                    <li>${{$order->price}}</li>
                                                </ul>
                                            </td>
                                            <td class="product-price"><span class="amount">{{$order->payment_method}}</span></td>
                                            <td class="product-subtotal">{{$order->payment_status}}</td>
                                            <td class="product-subtotal">{{$order->order_status}}</td>
                                            <td class="product-subtotal">{{$order->address}}</td>
                                            
                                        </tr>
                                    @endforeach
                                
                                
                            </tbody>
                        </table>
                    </div>
                    {{-- <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="buttons-cart--inner">
                                <div class="buttons-cart">
                                    <a href="#">Continue Shopping</a>
                                </div>
                                <div class="buttons-cart checkout--btn">
                                    <a href="#">update</a> 
                                    <a href="#">checkout</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="row">
                        <div class="col-md-6 col-sm-12 col-xs-12"> --}}
                            {{-- <div class="ht__coupon__code">
                                <span>enter your discount code</span>
                                <div class="coupon__box">
                                    <input type="text" placeholder="">
                                    <div class="ht__cp__btn">
                                        <a href="#">enter</a>
                                    </div>
                                </div>
                            </div> --}}
                        {{-- </div>
                        <div class="col-md-6 col-sm-12 col-xs-12 smt-40 xmt-40">
                            <div class="htc__cart__total">
                                <h6>Order total</h6>
                                <div class="cart__desk__list">
                                    <ul class="cart__desc">
                                        <li>cart total</li>
                                        <li>tax</li>
                                        <li>shipping</li>
                                    </ul>
                                    <ul class="cart__price">
                                        <li>${{$subtotal}}.00</li>
                                        <li>0</li>
                                        <li>0</li>
                                    </ul>
                                </div>
                                <div class="cart__total">
                                    <span>order total</span>
                                    <span>${{$subtotal}}.00</span>
                                </div> --}}
                                {{-- <ul class="payment__btn">
                                    <li class="active"><a href="/order">order</a></li>
                                    <li><a href="/">continue shopping</a></li>
                                </ul> --}}
                            {{-- </div>
                        </div>
                    </div> --}}
                </form> 
            </div>
        </div>
    </div>
</div>
<!-- cart-main-area end -->
@endsection