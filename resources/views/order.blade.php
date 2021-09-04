@extends('layout')
@section('content')
<?php
use App\Http\Controllers\ProductsController;

$product = ProductsController::cartside();
$product_count = $product->count();

?>     

<!-- cart-main-area start -->

     <div class="checkout-wrap ptb--100">
         <form action="orderplace" method="post">
             @csrf
        <div class="container">
            <div class="row">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <div class="alert alert-danger my-2">
                            {{$error}}
                        </div>
                    @endforeach
                @endif

                <div class="col-md-8">

                    <div class="checkout__inner">
                        <div class="accordion-list">
                            <div class="accordion">
                               
                                <div class="accordion__title">
                                    Address
                                </div>
                                <div class="accordion__body">
                                    <div class="bilinfo">
                                        
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="single-input mt-0">
                                                        <textarea name="address" placeholder="Please Enter your full address " id="" rows="5"></textarea>
                                                    </div>
                                                </div>
                                               
                                            </div>
                                        
                                    </div>
                                </div>
                                <div class="accordion__title">
                                    Payment Method
                                </div>
                                <div class="accordion__body">
                                    <div class="shipmethod">
                                        
                                            <div class="single-input">
                                                <p>
                                                    <input type="radio" name="payment" value="Online Payment" id="ship-fast">
                                                    <label for="ship-fast">Online Payment</label>
                                                </p>
                                                
                                            </div>
                                            <div class="single-input">
                                                <p>
                                                    <input type="radio" name="payment" value="Cash on Delivery (COD)" id="ship-normal">
                                                    <label for="ship-normal">Cash on Delivery (COD)</label>
                                                </p>
                                                
                                            </div>
                                        
                                    </div>
                                </div>
                               
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="order-details">
                        <h5 class="order-details__title">Your Order</h5>
                        <div class="order-details__item">
                            <?php 
                                $subtotal = 0;
                                // foreach($product as $product){
                                    //print_r($product);
                                // }
                                //die();
                            ?>
                            @if($product_count == 0)
                                <tr>
                                    <td colspan="6"> <p>Please add some Product in a cart</p></td>
                                </tr>
                            @endif
                                @foreach($product as $product)
                                <?php
                                    $total = $product->price * $product->quantity;
                                    $subtotal += $total;
                                ?>
                                    <div class="single-item">
                                        <div class="single-item__thumb">
                                            <img src="upload/product/{{$product->image}}" alt="ordered item">
                                        </div>
                                        <div class="single-item__content">
                                            <a href="#">{{$product->name}}</a>
                                            <span class="price">${{$product->price}}</span>
                                        </div>
                                        <div class="single-item__remove">
                                            <a href="/cartremove/{{$product->cart_id}}"><i class="zmdi zmdi-delete"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                        
                        </div>
                        <div class="order-details__count">
                            <div class="order-details__count__single">
                                <h5>sub total</h5>
                                <span class="price">${{$subtotal}}.00</span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Tax</h5>
                                <span class="price">$0.00</span>
                            </div>
                            <div class="order-details__count__single">
                                <h5>Shipping</h5>
                                <span class="price">0</span>
                            </div>
                        </div>
                        <div class="ordre-details__total">
                            <h5>Order total</h5>
                            <span class="price">${{$subtotal}}.00</span>
                        </div>
                        <ul class="payment__btn" style="margin:0px;">
                            <li class="active"><button type="submit" style="width: 100%; border:none;"><a>Place Order</a></button></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
    <!-- cart-main-area end -->
@endsection