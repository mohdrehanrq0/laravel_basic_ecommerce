@extends ('layout')
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
                          <span class="breadcrumb-item active">Login</span>
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

@if(session('error'))
    {{-- @foreach(session('msg') as $msg) --}}
            <div class="alert alert-danger">
                {{session('error')}}
            </div>
    {{-- @endforeach --}}
@endif
@if(session('msg'))
    {{-- @foreach(session('msg') as $msg) --}}
            <div class="alert alert-success">
                {{session('msg')}}
            </div>
    {{-- @endforeach --}}
@endif




<!-- Start Contact Area -->
<section class="htc__contact__area ptb--100 bg__white">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Login</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="contact-form" action="logincontroller" method="post">
                            @csrf
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="email" placeholder="Your Email*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="pass" placeholder="Your Password*" style="width:100%">
                                </div>
                            </div>
                            
                            <div class="contact-btn">
                                <button type="submit" class="fv-btn">Login</button>
                            </div>
                        </form>
                        <div class="form-output">
                            <p class="form-messege"></p>
                        </div>
                    </div>
                </div> 
        
        </div>
        

            <div class="col-md-6">
                <div class="contact-form-wrap mt--60">
                    <div class="col-xs-12">
                        <div class="contact-title">
                            <h2 class="title__line--6">Register</h2>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <form id="contact-form" action="registerController" method="post">
                            @csrf
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="text" name="name" placeholder="Your Name*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="email" name="email" placeholder="Your Email*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="number" name="mobile" placeholder="Your Mobile*" style="width:100%">
                                </div>
                            </div>
                            <div class="single-contact-form">
                                <div class="contact-box name">
                                    <input type="password" name="pwd" placeholder="Your Password*" style="width:100%">
                                </div>
                            </div>
                            
                            <div class="contact-btn">
                                <button type="submit" class="fv-btn">Register</button>
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