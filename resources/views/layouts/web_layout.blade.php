
<!DOCTYPE html>
<html lang="en-US">

<!-- Mirrored from rstheme.com/products/html/swipy/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 14 Apr 2023 18:15:42 GMT -->
<head>
		<!-- meta tag -->
		<meta charset="utf-8">
		<title>@yield('title')</title>
		<!-- responsive tag -->
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="meta_title" content ="@yield('meta_title')">
        <meta name="meta_description" content="@yield('meta_description')">
		<!-- favicon -->
		<link rel="apple-touch-icon" href="apple-touch-icon.html">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('public/web_asset/images/logo.webp')}}">

        @include('layouts.web_include.header')
        
        
        
        
        <script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "Organization",
  "name": "Custom CMYK Boxes",
  "alternateName": "Custom Boxes Wholesale",
  "url": "https://customcmykboxes.com/",
  "logo": "https://customcmykboxes.com/public/web_asset/images/logo.webp",
  "contactPoint": {
    "@type": "ContactPoint",
    "telephone": "+1 800 434 9599",
    "contactType": "customer service",
    "contactOption": "TollFree",
    "areaServed": "US",
    "availableLanguage": "en"
  }
}
</script>
        
        
        <!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-5FK4W9P');</script>
<!-- End Google Tag Manager -->

	</head>
	<body class="defult-home">
	    <!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-5FK4W9P"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

		<div class="offwrap"></div>

		<!--Preloader start here-->
	   	<!--<div id="pre-load">-->
     <!--       <div id="loader" class="loader">-->
     <!--           <div class="loader-container">-->
     <!--               <div class="loader-icon"><img src="{{asset('public/web_asset/images/logo.webp')}}" alt="Swipy Creative Agency Html Template "></div>                </div>-->
     <!--       </div>-->
     <!--   </div>-->
		<!--Preloader area end here-->

       <!-- Main content Start -->
		<div class="main-content">

            @include('layouts.web_include.navbar')

            @yield('content')

        </div>
        <!-- Main content End -->

        @include('layouts.web_include.footer')
         <!--Start of Zendesk Chat Script-->
        <script type="text/javascript" async>
            window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
            d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
            _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
            $.src="https://v2.zopim.com/?4rjirajS9fp7MsgIzrOp9l9xuOw3W8c7";z.t=+new Date;$.
            type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
        </script>
        <!--End of Zendesk Chat Script-->

    </body>
</html>
