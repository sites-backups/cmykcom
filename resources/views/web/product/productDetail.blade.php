@extends('layouts.web_layout')

@section('title', $product->meta->meta_title)
@section('meta_title', $product->meta->meta_title)
@section('meta_desctipiton', $product->meta->meta_description)

@section('content')


    <div class="rs-project-details pt-150 pb-150 md-pt-80 md-pb-80">
        <div class="container-fluid">
            <div class="row y-middle">
                {{-- col-lg-4 md-mb-50 col-md-4 --}}
                <div class=" col-xs-12 col-sm-12 col-md-6 col-lg-4">
                    <div class="project-img">
                        <img id="mainImage" style="object-fit: cover;"
                        src="{{ asset($product->images->count() ? $product->images[0]->thumbnail:'') }}"
                        height="auto" width="414x" />
                    </div>
                </div>
                {{-- col-lg-4 col-md-4 --}}
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4 xs-mt-5">
                    <div class="prelements-heading">
                        <div class="sec-title mb-35">
                            <h2 class="title">
                                {{ $product->prod_title }}
                            </h2>
                            <p class="desc">{{ $product->short_description }} </p>
                        </div>
                        <div class="widget-inner-content">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="title-inner">
                                        <div class="description">
                                            <p class="desc">- High Quality
                                                Printing </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="title-inner">
                                        <div class="description">
                                            <p>- Quick Turnaround
                                                Time</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="title-inner">
                                        <div class="description">
                                            <p>- Super-Fast
                                                Delivery</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="title-inner">
                                        <div class="description">
                                            <p>- Free Design
                                                Support</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                    <div class="sidebar row shoping-page-sidebar form_hide_small_device" style="justify-content: center;">
                        @include('flashmessages')
                        <div class="form__wrapper">
                            <div class="form__banner">
                                <h3 style="color: rgb(255, 255, 255);text-align: center;margin-top: 5px;">
                                    <p style="font-size: 21px" class="text-center">GET A FREE QUOTE</p>
                                </h3>
                            </div>
                            <form class="form-horizontal" method="POST" style="margin-top:4pc" id="ProductQuote"
                                action="{{url('/product-quote')}}">
                            @csrf
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <select class="form-control" name="product_id" id="product_name">
                                            @foreach ($prod_name as $items)
                                            @if ($items->id == $product->id)
                                                    <option selected value="{{ $items->id }}"  >{{ $items->prod_title }}</option>
                                                @else
                                                    <option value="{{ $items->id }}"  >{{ $items->prod_title }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" placeholder="Length"
                                                    name="length" id="length" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" placeholder="Width"
                                                    name="width" id="width" value="">
                                            </div>
                                            <div class="col-sm-4">
                                                <input type="number" class="form-control" placeholder="Depth"
                                                    name="depth" id="depth" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <select name="unit" class="form-control" id="measurement_unit">
                                                    <option value="" hidden="">--select unit--</option>
                                                    <option value="cm">cm</option>
                                                    <option value="inch">inch</option>
                                                    <option value="mm">mm</option>
                                                </select>
                                            </div>
                                            <div class="col-sm-6">
                                                <input type="number" class="form-control" placeholder="Quantity"
                                                    name="quantity" id="qty" value="">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="text" class="form-control" placeholder="Your Name"
                                            name="name" id="your_name" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="email" class="form-control" placeholder="Enter Email"
                                            name="email" id="your_email" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <input type="number" class="form-control" placeholder="Contact Number"
                                            name="number" id="contact_number" value="">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 mt-1">
                                        <label for="specification" style="color:grey">Your Specification</label>
                                        <textarea class="form-control mt-0" name="specification" id="specifications"
                                            value="">                                        
                                            </textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12">
                                        <center>
                                            <button type="submit" class="btn btn-warning mt-2 mb-2">Send</button>
                                        </center>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="project-widget-img pt-40">
                <div class="row">
                    @foreach ($product->images as $item)
                        <div class="col-lg-3 mb-40">
                            <div class="project-img">
                                <img class="imgStyle"
                                src="{{ asset($item->thumbnail) }}" alt="images"/>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="row mt-5">
                <div class="col-12">
                    <div class="tab-area">
                        <ul class="nav nav-tabs" role="tablist">
                            <li class="nav-item" role="presentation">
                                <button class="nav-link active" id="description-tab" data-bs-toggle="tab"
                                    data-bs-target="#description" type="button" role="tab"
                                    aria-controls="description" aria-selected="true">Description</button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="nav-link" id="additional-tab" data-bs-toggle="tab"
                                    data-bs-target="#additional" type="button" role="tab" aria-controls="reviews"
                                    aria-selected="false">Specification</button>
                            </li>
                        </ul>

                        <div class="tab-content" style="">
                            <div class="tab-pane fade active show" id="description" role="tabpanel"
                                aria-labelledby="description-tab">
                                <p class="dsc-p pb-25">
                                    {!! html_entity_decode($product->body) !!}
                                </p>
                            </div>
                            <div class="tab-pane fade" id="additional" role="tabpanel" aria-labelledby="additional-tab">
                                <table>
                                    <tbody class="table-box">
                                        @if (isset($product->specs))
                                            {!! html_entity_decode($product->specs->body) !!}
                                        @else
                                            <p class="mt-3">There is no specification about this product.</p>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>

@endsection
