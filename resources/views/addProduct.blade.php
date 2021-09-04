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
                          <span class="breadcrumb-item active">Add Product</span>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Bradcaump area -->

@if ($errors->any())
            @foreach ($errors->all() as $error)
                <div class="alert alert-danger" style="margin:10px 20px;">
                {{$error}}
                </div>
            @endforeach
@endif
@if(session('success'))
<div class="alert alert-success m-4">
    {{session('success')}}
</div>
@endif

<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Add Product</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="contact-form" action="addproductcontroller" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="name" placeholder="Your Product Name*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="number" name="price" placeholder="Enter your product price*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="number" name="mrp" placeholder="Enter your product MRP*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="number" name="stock" placeholder="Enter the stock available*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box message name">
                                    <textarea name="description" placeholder="Enter the Description of your product*" rows="5" style="width:100%"></textarea>
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box message name" style="margin:0px 20px;">
                                    <label for="">Select your product image</label>
                                    <input type="file" name="image" style="background:transparent;">
                                </div>
                            </div>
                            
                            <div class="contact-btn">
                                <button type="submit" class="fv-btn">Add</button>
                            </div>
                        </form>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div> 
        
        </div>
        
            
    </div>
</section>




@endsection