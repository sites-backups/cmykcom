
@extends('layouts.web_layout')

@section('title','BLOG')

@section('content')

  <!-- Project Start -->
  <div class="rs-project project-style1 project-modify12 pt-145 pb-150 md-pt-75 md-pb-80">
    <div class="container">
        <div class="sec-title mb-50 text-center">
            <span class="sub-text">
                Blogs
            </span>
            <h2 class="title">
                Our latest blogs
            </h2>
        </div>
        <div class="row">
            @foreach ($blog as $item)
            <div class="col-xl-4 col-md-6 mb-30">
                <a href="{{url($item->slug)}}">
                    <div class="project-item">
                        <div class="project-img">
                                <img src="{{asset($item->thumbnail)}}" alt="Images">
                        </div>
                        <div class="project-content">
                            <h3 class="title">{{$item->title}}</h3>
                            <p class="description">Read More -></p>
                        </div>
                    </div>
                </a>

            </div>
            @endforeach

        </div>
    </div>
</div>
<!-- Project End -->


@endsection

