@extends('layouts.web_layout')

@section('title','BLOG Detail')

@section('content')

<div class="rs-project-details pt-150 pb-150 md-pt-80 md-pb-80">
    <div class="container">
        <div class="row y-middle">
            <div class="col-lg-12 md-mb-50">
                <div class="project-img text-center">
                    <img src="{{asset($blog->thumbnail)}}" alt="Images">
                </div>
            </div>
            <div class="col-lg-12 pl-50 pt-5 md-pl-15">
                <div class="prelements-heading">
                    <div class="sec-title mb-35">
                        <h2 class="title pb-22">
                            {{$blog->title}}
                        </h2>
                        <div class="mt-3" style="text-align: justify">
                            {!! html_entity_decode($blog->body) !!}
                        </div>
                        {{-- <p class="desc pb-27">
                            We’ve created a unique visual system and strategy across the wide existing spectrum of visible mobile applications and found yourself in a wide, straggling with wainscots.
                        </p> --}}
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection

