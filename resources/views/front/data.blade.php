<html>

<head dir="rtl">
    <title>TEST</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('css/english.css') }}">
    {{-- <link rel="stylesheet" href="{{ asset('css/arabic.css') }}"> --}}

</head>



<body>
   


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2">

                <div class="card shadow">
                    <div class="icon-bar">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-snapchat"></i></a>
                    </div>
                    <div class="icon-bar-two" >
                        <a href="#"><i class="fa fa-globe"></i><span style="font-size: 28px">EN</span> </a>
                    </div>

                    <div class="text-white">

                        <h5 class="card-title title"><img src="{{ $general_data->vendor_image }}" width="350"
                                height="400" alt=""></h5>

                        <h5 class="card-title title">{{ $general_data->vendor_name }}</h5>
                        <p class="card-text desc">{{ $general_data->vendor_desc }}</p>
                    </div>


                </div>
            </div>
            {{-- start categories --}}
            <span  id="all" style="width: 100%;">
            <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2">
                <div class="scrollmenu" id="navbar_top">
                    <a href="#all" class="active" >الرئيسية</a>

                    @foreach ($general_data->menu_categories as $item)
          
                        <a href="#{{ $item->category_id }}" >{{ $item->category_name }}</a>
                    @endforeach

                </div>
            </div>
             {{-- end categories --}}
          
                @foreach ($products as $item)
    
                
                    <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2 page-section " >
                        <div class="card shadow">
                            <img class="card-img" src="{{ $item->image }}" width="300" height="350" alt="succulent">
    
                            <div class="card-body">
                                <h4 class="card-title title_menu">{{ $item->product_name }}</h4>
                                <p class="card-text paragraph">
                                    {!! $item->product_desc !!}
                                </p>
                            </div>
                            <div class="card-body">
                                <a class="card-link link1 "> <span class="price">CAL
                                        {{ $item->product_calories }} </span> / {{ $item->price_currency }}
                                    {{ $item->product_price }}
                                </a>
                                <a class="card-link link2"><img src="{{ $general_data->vendor_image }}" width="170"
                                        height="180" alt=""></a>
                            </div>
    
                        </div>
                    </div>
                
                @endforeach
            </span>
            @foreach ($general_data->menu_categories as $item)

            @php
                $products = json_decode(\Http::get('dashboard.yalago.net/api/vendor/'.$rest_name.'/menu?category_id='.$item->category_id)->getBody()->getContents())

            @endphp
            <span id="{{ $item->category_id }}" style="  width: 100%;">
                @foreach ($products->data->products_menu as $product)
                    
              

           
                <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2 page-section "  >
                    <div class="card shadow">
                        <img class="card-img" src="{{ $product->image }}" width="300" height="350" alt="succulent">
                
                        <div class="card-body">
                            <h4 class="card-title title_menu">{{ $product->product_name }}</h4>
                            <p class="card-text paragraph">
                                {!! $product->product_desc !!}
                            </p>
                        </div>
                        <div class="card-body">
                            <a class="card-link link1 "> <span class="price">CAL
                                    {{ $product->product_calories }} </span> / {{ $product->price_currency }}
                                {{ $product->product_price }}
                            </a>
                            <a class="card-link link2"><img src="{{ $general_data->vendor_image }}" width="170"
                                    height="180" alt=""></a>
                        </div>
                
                    </div>
                </div>
           
            @endforeach
        </span>
            @endforeach

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            window.addEventListener('scroll', function() {
                if (window.scrollY > 350) {
                    //   alert(window.scrollY)
                    document.getElementById('navbar_top').classList.add('fixed-top');
                    // add padding top to show content behind navbar
                    navbar_height = document.querySelector('.scrollmenu').offsetHeight;
                    document.body.style.paddingTop = navbar_height + 'px';
                } else {
                    document.getElementById('navbar_top').classList.remove('fixed-top');
                    // remove padding top from body
                    document.body.style.paddingTop = '0';
                }
            });
        });
    </script>
    <script>
        $(document).ready(function () {
    $(document).on("scroll", onScroll);
    
    //smoothscroll
    $('a[href^="#"]').on('click', function (e) {
        e.preventDefault();
        $('a').each(function () {
            $(this).removeClass('active');
        })
        $(this).addClass('active');

        $(document).off("scroll");
        
     
        $(this).addClass('active');
        $('a').each(function () {
            $(this).removeClass('active');
        })
        var target = this.hash,
            menu = target;
        $target = $(target);
        $('html, body').stop().animate({
            'scrollTop': $target.offset().top+2
        }, 500, 'swing', function () {
            window.location.hash = target;
            $(document).on("scroll", onScroll);
        });
    });
});

function onScroll(event){
    var scrollPos = $(document).scrollTop();
    $('#navbar_top a').each(function () {
        var currLink = $(this);
        var refElement = $(currLink.attr("href"));
        if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
            $('#navbar_top a').removeClass("active");
            currLink.addClass("active");
        }
        else{
            currLink.removeClass("active");
        }
    });
}
    </script>
   
    

</body>

</html>