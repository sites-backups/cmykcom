<!--Full width header Start-->
<div class="full-width-header">
    <!--Header Start-->
    <header id="rs-header" class="rs-header header-transparent">
        <!-- Menu Start -->
        <div class="menu-area menu-sticky">
            <div class="container">
                <div class="row-table">
                    <div class="col-cell header-logo">
                        <div class="logo-area">
                            <a href="{{url('/')}}">
                                <img class="normal-logo" src="{{asset('public/web_asset/images/logo.webp')}}" alt="logo">
                                <img class="sticky-logo" src="{{asset('public/web_asset/images/logo.webp')}}" alt="logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="rs-menu-area">
                            <div class="main-menu">
                                <nav class="rs-menu hidden-md">
                                    <ul class="nav-menu">
                                        <li class="current-menu-item">
                                            <a href="{{url('/')}}">HOME</a>
                                        </li>
                                        <li class="last-item menu-item-has-children">
                                            <a href="{{url('/categories')}}">CATEGORIES</a>
                                            <ul class="sub-menu">
                                                <li><a href="{{url('product-category/rigid-boxes/')}}">Rigid Boxes</a></li>
                                                <li><a href="{{url('product-category/retail-boxes/')}}">Retail Boxes</a></li>
                                                <li><a href="{{url('product-category/cosmetic-boxes/')}}">Cosmetic Boxes</a></li>
                                                <li><a href="{{url('product-category/food-beverage/')}}">Food & Beverage</a></li>
                                                <li><a href="{{url('product-category/gift-box/')}}">Gift Boxes</a></li>
                                                <li><a href="{{url('product-category/other-boxes/')}}">Other Boxes</a></li>
                                            </ul>
                                        </li>
                                        <li>
                                            <a href="{{url('/quote')}}">QUOTE</a>
                                        </li>
                                        <li>
                                        <a href="{{url('/blog')}}">BLOG</a>
                                        </li>
                                        <li>
                                            <a href="{{url('/about-us')}}">ABOUT US</a>
                                        </li>
                                        <li>
                                            <a href="{{url('get-in-touch')}}">CONTACT US</a>
                                        </li>
                                    </ul> <!-- //.nav-menu -->
                                </nav>
                            </div> <!-- //.main-menu -->
                        </div>
                    </div>
                    <div class="col-cell">
                        <div class="expand-btn-inner">
                            <ul>
                                <li>
                                    <i onclick="showSRCh()" id="showBtn" class="fi fi-rr-search"></i>
                                    <i onclick="hideSRCh()" id="hideBtn" class="fi-rr-cross" style="display: none"></i>
                                        <form action="{{url('search-items')}}" method="GET">
                                            @csrf
                                            <div class="input-box" id="input-box">
                                                    <div class="row mt-3">
                                                        <div class=""><input style="width:85%" id="seacrh_field" name="search" type="text" placeholder="Search products...">
                                                            <button style="width:10%" class="button_style" type="submit"><i class="fi fi-rr-search text-white"></i></button>
                                                        </div>

                                                </div>

                                            </div>
                                        </form>
                                </li>
                                <li class="nav-link">
                                    <a id="nav-expander" class="nav-expander bar" href="#">
                                           <div class="bar">
                                               <span class="dot1"></span>
                                               <span class="dot2"></span>
                                               <span class="dot3"></span>
                                           </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Menu End -->

        <!-- Canvas Menu start -->
        <nav class="right_menu_togle menu-wrap-off  hidden-md">
            <div class="close-btn">
                <a id="nav-close" class="nav-close">
                    <div class="line">
                        <span class="line1"></span>
                        <span class="line2"></span>
                    </div>
                </a>
            </div>
            <div class="rs-offcanvas-inner">
                <div class="canvas-logo">
                    <a href="index.html"><img src="{{asset('public/web_asset/images/logo.webp')}}" alt="logo"></a>
                </div>
                <div class="offcanvas-text">
                    <p>Packaging Boxes, with fastest delivery time and quality assurance.</p>
                </div>
                <div class="canvas-contact">
                    <div class="address-area">
                        <h2 class="widget-title">Get In Touch</h2>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="fi fi-rr-envelope-plus"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Email</h4>
                                <em><a href="mailto:info@customcmykboxes.com">info@customcmykboxes.com</a></em>
                            </div>
                         </div>
                        <div class="address-list">
                            <div class="info-icon">
                              <i class="fi fi-rr-phone-call"></i>
                            </div>info@customcmykboxes.com
                            <div class="info-content">
                              <h4 class="title">Phone</h4>
                              <em><a href="tel:1800 434 9599">1800 434 9599</a></em>
                            </div>
                        </div>
                        <div class="address-list">
                            <div class="info-icon">
                                <i class="fi fi-rr-map-marker-home"></i>
                            </div>
                            <div class="info-content">
                                <h4 class="title">Location</h4>
                                <em>13300 Morris Road Unit 21 Alpharetta, GA 30004 United States.</em>
                            </div>
                        </div>
                    </div>
                    <ul class="footer-social md-mb-30 d-flex">
                        <li class="m-3"><a href="https://www.facebook.com/customcmykboxes"><i class="fa fa-facebook"></i></a></li>
                        <li class="m-3"><a href="https://twitter.com/BoxesCmyk"><i class="fa fa-twitter"></i></a></li>
                        <li class="m-3"><a href="https://www.linkedin.com/company/custom-cmyk-boxes/"><i class="fa fa-linkedin"></i></a></li>
                        <li class="m-3"><a href="https://www.pinterest.co.uk/customcmykboxes/_created/"><i class="fa fa-pinterest-p"></i></a></li>
                        <li class="m-3"><a href="https://www.instagram.com/customcmykboxes/"><i class="fa fa-instagram"></i></a></li>
                      </ul>
                </div>
            </div>
        </nav>
        <!-- Canvas Menu end -->

        <!-- Canvas Mobile Menu start -->
        <nav class="right_menu_togle mobile-navbar-menu" id="mobile-navbar-menu">
            <div class="close-btn">
                <a id="nav-close2" class="nav-close">
                    <div class="line">
                        <span class="line1"></span>
                        <span class="line2"></span>
                    </div>
                </a>
            </div>
            <ul class="nav-menu">
                <li class="menu-item-has-children current-menu-item">
                    <a href="{{url('/')}}">Home</a>
                </li>
                <li class="last-item menu-item-has-children">
                    <a href="#">Categories</a>
                    <ul class="sub-menu">
                        <li><a href="{{url('product-category/rigid-boxes/')}}">Rigid Boxes</a></li>
                        <li><a href="{{url('product-category/retail-boxes/')}}">Retail Boxes</a></li>
                        <li><a href="{{url('product-category/cosmetic-boxes/')}}">Cosmetic Boxes</a></li>
                        <li><a href="{{url('product-category/food-beverage/')}}">Food & Beverage</a></li>
                        <li><a href="{{url('product-category/gift-box/')}}">Gift Boxes</a></li>
                        <li><a href="{{url('product-category/other-boxes/')}}">Other Boxes</a></li>
                    </ul>
                </li>
                <li class="menu-item-has-children">
                    <a href="{{url('/quote')}}">QUOTE</a>
                </li>
                <li>
                    <a href="{{url('/blog')}}">BLOG</a>
                </li>
                <li>
                    <a href="{{url('/about-us')}}">ABOUT US</a>
                </li>
                <li>
                    <a href="{{url('get-in-touch')}}">CONTACT US</a>
                </li>
            </ul> <!-- //.nav-menu -->
            <!-- //.nav-menu -->

            <!-- //.nav-menu -->
            <div class="canvas-contact">
                  <div class="address-area">
                      <div class="address-list">
                          <div class="info-icon">
                              <i class="fi fi-rr-map-marker-home"></i>
                          </div>
                          <div class="info-content">
                              <h4 class="title">Contact</h4>
                              <em> 13300 Morris Road Unit 21 Alpharetta, GA 30004 United States.</em>
                          </div>
                      </div>
                      <div class="address-list">
                          <div class="info-icon">
                              <i class="fi fi-rr-envelope-plus"></i>
                          </div>
                          <div class="info-content">
                              <h4 class="title">Email</h4>
                              <em><a href="mailto:info@customcmykboxes.com">info@customcmykboxes.com</a></em>
                          </div>
                      </div>
                      <div class="address-list">
                          <div class="info-icon">
                              <i class="fi fi-rr-phone-call"></i>
                          </div>
                          <div class="info-content">
                              <h4 class="title">Free Call</h4>
                              <em><a href="tel:1800 434 9599">1800 434 9599 </a></em>
                          </div>
                      </div>
                  </div>
            </div>
        </nav>
        <!-- Canvas Menu end -->
    </header>
    <!--Header End-->
</div>
<!--Full width header End-->
