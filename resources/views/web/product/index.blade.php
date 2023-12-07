@extends('layouts.web_layout')


@section('title', $category_name . ' Archives')
@section('meta_title', $category_name . ' - Custom CMYK Boxes')
@section('meta_description', $category_name . '- Custom CMYK Boxes')


@section('content')

    <div class="main-content">


        <!-- Breadcrumbs Start -->
        <div class="rs-breadcrumbs img7">
            <div class="container">
                <div class="breadcrumbs-inner shop-style">
                    <h1 class="page-title title3">{{$category_name}}</h1>
                </div>
            </div>
        </div>
        <!-- Breadcrumbs End -->

        <!--CATEGORY part start-->


        <div class="rs-project project-style1 bg2 pt-153 pb-160 md-pt-75 md-pb-80">
            <div class="container">
                <div class="row y-middle">
                    <div class="col-lg-6 mb-60">
                        <div class="sec-title">
                            <span class="sub-text">
                                custom cmyk boxes
                            </span>
                            <h2 class="title white-color">
                                Our latest products
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($products as $item)
                        <div class="col-lg-4 mb-30">
                            <div class="project-item">
                                <div class="project-img">
                                    <a href="{{ url('product',$item->product->slug) }}">
                                        <img src="{{ asset($item->product->images->count() ? $item->product->images[0]->thumbnail: '') }}"
                                            alt="Images">
                                    </a>
                                </div>
                                <a href="{{ url('product',$item->product->slug) }}">
                                    <div class="project-content">
                                        <h3 class="title">{{ $item->product->prod_title }}</h3>
                                    </div>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="project-animate">
                <div class="pro-animation left-arrow">
                    <img class="veritcal" src="http://127.0.0.1:8000/web_asset/images/project/line.png" alt="Project">
                </div>
                <div class="pro-animation right-arrow">
                    <img class="veritcal" src="http://127.0.0.1:8000/web_asset/images/project/line.png" alt="Project">
                </div>
            </div>
        </div>


        <!--CATEGORY part end-->

    </div>


@endsection
