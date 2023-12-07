<section class="py-5">
    <div class="container-fluid" id="web_padding">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-8 d-flex mb-3">
                <div class="row">
                    <div class="col-md-6 col-sm-6">
                        <div class="shadow">
                            {{-- <img class="card-img-top mb-5 mb-md-0"
                            src="{{ asset($product->images->count() ? $product->images[0]->thumbnail : '') }}"
                            alt="{{$product->prod_title}}"> --}}
                            <img id="mainImage" style="object-fit: cover;"
                                src="{{ asset($product->images->count() ? $product->images[0]->thumbnail:'') }}"
                                height="auto" width="414x" />
                            <hr style="border-top: 1px solid #000000;width: 100%;margin:0" > <br/>

                            <div id="divId" onclick="changeImageOnClick(event)">
                              @foreach ($product->images as $item)
                                <img class="imgStyle"
                                    src="{{ asset($item->thumbnail) }}" />
                                    @endforeach

                               <!-- <img class="imgStyle"
                                    src="{{ asset("public/web_asset/images/blue-1.png") }}" />
                                <img class="imgStyle"
                                src="{{ asset("public/web_asset/images/blue-2.png") }}" />
                                <img class="imgStyle"
                                src="{{ asset("public/web_asset/images/blue-3.png") }}" />
                                -->
                            </div>

                            <img id="expandedImg" style="width:100%">
                            <div id="imgtext"></div>
                        </div>



                        <!-- The four columns -->


                </div>
                <div class="col-md-6 col-sm-6 prod_title">
                    <h1 class="display-5 fw-bolder mt-5">{{ $product->prod_title }}</h1>
                    <p class="" style="text-align: justify">
                        {{ $product->short_description }}
                    </p>

                    <div class="row mt-3 shadow-sm p-3">
                        <div class="col-md-6 col-sm-6 mb-3">
                            <div class="single-feature row" style="justify-content: center;">
                              <img src="{{ asset('public/web_asset/images/high-quality-printing.png')}}" alt="high-quality-printing" class="" style="width:55px; height:29px">
                              <p style="padding-top: 0.5rem">High Quality <br> Printing</p>
                            </div>
                          </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                          <div class="single-feature row" style="justify-content: center;">
                            <img src="{{ asset('public/web_asset/images/quick-turnaround.png')}}" alt="quick-turnaround" class="" style="width:55px; height:29px">
                            <p style="padding-top: 0.5rem">Quick Turnaround Time</p>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                          <div class="single-feature row" style="justify-content: center;">
                            <img src="{{ asset('public/web_asset/images/super-fast-delivery.png')}}" alt="super-fast-delivery" class="" style="width:55px; height:29px">
                            <p style="padding-top: 0.5rem">Super-Fast <br> Delivery</p>
                          </div>
                        </div>
                        <div class="col-md-6 col-sm-6 mb-3">
                          <div class="single-feature row" style="justify-content: center;">
                            <img src="{{ asset('public/web_asset/images/free-design-support.png')}}" alt="free-design-support" class="" style="width:55px; height:29px">
                            <p style="padding-top: 0.5rem">Free Design <br> Support</p>
                          </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>

            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                <div class="sidebar row shoping-page-sidebar form_hide_small_device" style="justify-content: center;">
                    <div class="form__wrapper">
                        <div class="form__banner">
                            <h3 style="color: rgb(255, 255, 255);text-align: center;margin-top: 5px;">
                                <p style="font-size: 21px" class="text-center">GET A FREE QUOTE</p>
                            </h3>
                        </div>
                        <form class="form-horizontal" method="POST" style="margin-top:3pc" id="ProductQuote" action="{{ url('/product-quote') }}">
                            @csrf
                            <br>
                            @include('flashmessages')
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
                                            <input type="number" class="form-control" placeholder="Length" name="length"
                                            id="length" value="{{ old('length') }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" placeholder="Width" name="width"
                                            id="width" value="{{ old('width') }}">
                                        </div>
                                        <div class="col-sm-4">
                                            <input type="number" class="form-control" placeholder="Depth" name="depth"
                                            id="depth" value="{{ old('depth') }}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <select name="unit" class="form-control" id="measurement_unit">
                                                <option value="" hidden=""><i>--select unit--</i></option>
                                                <option value="cm">cm</option>
                                                <option value="inch">inch</option>
                                                <option value="mm">mm</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" placeholder="Quantity" name="quantity"
                                        id="qty" value="{{ old('quantity') }}">
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="text" class="form-control" placeholder="Your Name" name="name"
                                        id="your_name"  value="{{ old('name') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="email" class="form-control" placeholder="Enter Email" name="email"
                                        id="your_email" value="{{ old('email') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <input type="number" class="form-control" placeholder="Contact Number" name="number"
                                        id="contact_number" value="{{ old('number') }}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <label for="specification" style="color:grey">Your Specification</label>
                                    <textarea class="form-control" name="specification"
                                     id="specifications">
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-12">
                                    <center>
                                        <button type="submit" class="btn btn-custom-yellow">Send</button>
                                    </center>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-12">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                            aria-controls="home" aria-selected="true">Description</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                            aria-controls="profile" aria-selected="false">Specification</a>
                    </li>

                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                        aria-labelledby="home-tab">
                        <div class="mt-5 productDetail">
                            {!! html_entity_decode($product->body) !!}
                        </div>
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div class="mt-5">
                            @if (isset($product->specs))
                                {!! html_entity_decode($product->specs->body) !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
