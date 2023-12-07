@extends('layouts.web_layout')

@section('title','CONTACT US')

@section('content')

<div class="main-content" style="">
			<div class="rs-breadcrumbs img8" style="">
			    <div class="container" style="">
	                <div class="breadcrumbs-inner contact-inner-style">
	                   	<div class="row y-middle">
                            <div class="col-lg-6 md-mb-50">
                                <div class="breadcrumbs-wrap">
                                    <h1 class="page-title">
                                     HIGH-END LUXURY
                                     </h1>
                                    <p class="description">Packaging Boxes, with fastest delivery time and quality assurance.</p>
                                </div>
                            </div>
	                   		<div class="col-lg-6">
	                   			<div class="team-img">
	                   				<img class="js-tilt" src="{{asset('public/web_asset/images/contact.webp')}}"  alt="Images">
	                   			</div>
	                   		</div>
	                   	</div>
	                   	<div class="shape-animation">
	                   		<div class="team-animate">
	                   			<img class="scale" src="{{asset('public/web_asset/images/breadcrumbs/shape/img5.webp')}}" alt="">
	                   		</div>
	                   	</div>
	                </div>
			    </div>
			</div>

			<div class="rs-contact contact-style2 contact-modfiy5 pt-130 md-pt-80">
				<div class="container">
					<div class="row y-middle">
						<div class="col-lg-6 pr-135 md-pr-15 md-mb-50">
							<div class="sec-title">
								<h2 class="title title2 pb-35">
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
								<form action="{{url('store-contact')}}" method="POST">
                                    @csrf
								        <div class="row">
								            <div class="col-lg-12 mb-30">
								            	<label>Name</label>
								                <input class="from-control" type="text" name="name" placeholder="Enter Your name" value="{{old('name')}}" required="">
								            </div>
								            <div class="col-lg-12 mb-30">
								            	<label>Email</label>
								                <input class="from-control" type="text" name="email" placeholder="Enter your email address" value="{{old('email')}}" required="">
								            </div>
								            <div class="col-lg-12 mb-30">
								            	<label>Phone</label>
								                <input class="from-control" type="text" name="phone" placeholder="Enter your phone number" value="{{old('phone')}}" required="">
								            </div>
                                            <div class="col-lg-12 mb-30">
								            	<label>Subject</label>
								                <input class="from-control" type="text" name="subject" placeholder="Enter subject" value="{{old('subject')}}" required="">
								            </div>
								            <div class="col-lg-12 mb-30">
								            	<label> How can we help you?</label>
								                <textarea class="from-control" name="message" placeholder="Type your messags here" value="{{old('message')}}" required=""></textarea>
								            </div>
								        </div>
								        <div class="btn-part">
								            <div class="form-group mb-0">
								                <p class="submit-btn submit-stle2">
                                                	<input type="submit" value="Submit Now">
                                                </p>
								            </div>
								        </div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>


@endsection
