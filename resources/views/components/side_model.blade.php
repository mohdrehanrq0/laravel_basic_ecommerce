<?php
use App\Http\Controllers\ProductsController;

$product = ProductsController::cartside();
?>

<div class="body__overlay"></div>
<!-- Start Offset Wrapper -->
<div class="offset__wrapper">
    <!-- Start Search Popap -->
    <div class="search__area">
        <div class="container" >
            <div class="row" >
                <div class="col-md-12" >
                    <div class="search__inner">
                        <form action="#" method="get">
                            <input placeholder="Search here... " type="text">
                            <button type="submit"></button>
                        </form>
                        <div class="search__close__btn">
                            <span class="search__close__btn_icon"><i class="zmdi zmdi-close"></i></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Search Popap -->
    <!-- Start Cart Panel -->
    <div class="shopping__cart">
        <div class="shopping__cart__inner">
            <div class="offsetmenu__close__btn">
                <a href="#"><i class="zmdi zmdi-close"></i></a>
            </div>
            <div class="shp__cart__wrap">
                <?php 
                    $subtotal = 0;
                ?>
                @foreach($product as $product)
                <?php
                    $total = $product->price * $product->quantity;
                    $subtotal += $total;
                ?>
                <div class="shp__single__product">
                    <div class="shp__pro__thumb">
                        <a href="/cart">
                            <img src="/upload/product/{{$product->image}}" alt="product images">
                        </a>
                    </div>
                    <div class="shp__pro__details">
                        <h2><a href="/cart">{{$product->name}}</a></h2>
                        <span class="quantity">QTY: {{$product->quantity}}</span>
                        <span class="shp__price">${{$total}}</span>
                    </div>
                    <div class="remove__btn">
                        <a href="/cartremove/{{$product->cart_id}}" title="Remove this item"><i class="zmdi zmdi-close"></i></a>
                    </div>
                </div>
                @endforeach
            </div>
            <ul class="shoping__total">
                <li class="subtotal">Subtotal:</li>
                <li class="total__price">${{$subtotal}}.00</li>
            </ul>
            <ul class="shopping__btn">
                <li><a href="/cart">View Cart</a></li>
                <li class="shp__checkout"><a href="/order">Order</a></li>
            </ul>
        </div>
    </div>
    <!-- End Cart Panel -->
</div>
<!-- End Offset Wrapper -->