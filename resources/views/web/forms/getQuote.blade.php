@extends('layouts.web_layout')

@section('title','QUOTE')

@section('content')


<div class="rs-contact contact-style2 contact-modfiy4 pt-145 pb-150 md-pt-75 md-pb-80">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-6 pr-135 md-pr-15 md-mb-50">
                <div class="sec-title2">
                    <h2 class="title title6 pb-35">
                        Let’s talk<br>
                        about your project
                    </h2>
                </div>
                <div class="address-boxs mb-30">
                    <div class="address-icon">
                        <i class="fa fa-envelope-o"></i>
                    </div>
                    <div class="address-text">
                        <div class="text">
                            <span class="label">Email:</span>
                            <span class="des">
                                info@customcmykboxes.com
                            </span>
                        </div>
                    </div>
                </div>
                <div class="address-boxs">
                    <div class="address-icon">
                        <i class="fa fa-phone"></i>
                    </div>
                    <div class="address-text">
                        <div class="text">
                            <span class="label">Phone:</span>
                            <span class="des">
                                1800 434 9599
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-wrap">
                    @include('flashmessages')
                    <form action="{{url('/store-quote')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                            <div class="row">
                                <div class="col-lg-6 mb-30">
                                    <label>Name(required)</label>
                                    <input class="from-control" type="text" name="name" placeholder="enter your name" value="{{old('name')}}">
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Email(required)</label>
                                    <input class="from-control" type="email" name="email" placeholder="enter your email address" value="{{old('email')}}">
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Phone(required)</label>
                                    <input class="from-control" type="number" name="phone" placeholder="phone#" value="{{old('phone')}}">
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Additional</label>
                                    <input class="from-control" type="text" name="additional" placeholder="enter additional info" value="{{old('additional')}}">
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Colours(required)</label>
                                    <input class="from-control" type="text" name="color" placeholder="enter colour" value="{{old('color')}}">
                                </div>
                                <div class="col-lg-6 mb-30">
                                    <label>Quantity</label>
                                    <input class="from-control" type="text" name="quantity" placeholder="enter quantity" value="{{old('quantity')}}">
                                </div>
                                <div class="col-lg-4 mb-30">
                                    <label>Length(required)</label>
                                    <input class="from-control" type="text" name="length" placeholder="enter length" value="{{old('length')}}">
                                </div>
                                <div class="col-lg-4 mb-30">
                                    <label>Width(required)</label>
                                    <input class="from-control" type="text" name="width" placeholder="enter width" value="{{old('width')}}">
                                </div>
                                <div class="col-lg-4 mb-30">
                                    <label>Height(required)</label>
                                    <input class="from-control" type="text" name="height" placeholder="enter height" value="{{old('height')}}">
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <label>Subject</label>
                                    <input class="from-control" type="text" name="subject" placeholder="enter your subject" value="{{old('subject')}}">
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <label> How can we help you?</label>
                                    <textarea class="from-control" name="message" placeholder="type your message here" value="{{old('message')}}"></textarea>
                                </div>
                                <div class="col-lg-12 mb-30">
                                    <label> File (optional)</label>
                                    <input type="file" class="from-control" name="image" placeholder="Choose file">
                                </div>
                            </div>
                            <div class="btn-part">
                                <div class="form-group mb-0">
                                   <input class="readon orange-hire submit3" type="submit" value="Submit Now">
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
