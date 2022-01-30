<html>

<head dir="rtl">
    <title>TEST</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="{{ asset('css/english.css') }}"> --}}
    <link rel="stylesheet" href="{{ asset('css/arabic.css') }}">

</head>

<style>
    .loading {
        display: block;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 100;
        width: 100%;
        height: 100%;
        /* background-color: rgba(192, 192, 192, 0.5); */
        background-image: url("https://i.stack.imgur.com/MnyxU.gif");
        background-repeat: no-repeat;
        background-position: center;
    }

 
</style>


<body>

    

    <div class="container">
        <span id="product_section_animite"></span>
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2">

                <div class="card shadow">
                    <div class="icon-bar">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-snapchat"></i></a>
                    </div>
                    <div class="icon-bar-two">
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
          
                <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2 fixme " style="width: 100%;">
                    {{-- background: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQObjOWwRIvbm4oWVM5pleLJEIG2FJGCtUnow&usqp=CAU); --}}
                    <div class="all_category"
                        style="position: relative; text-align: center ; background: azure  ">
                        <button class="button_style category_id active"  value="all" id="category_id">الرئيسية</button>

                        @foreach ($general_data->menu_categories as $key => $item)

                            @if ($key == 4 || $key == 10)
                                <br>
                            @endif
                            <button class="button_style category_id"  value="{{ $item->category_id }}" id="category_id">{{ $item->category_name }}</button>
                        @endforeach

                    </div>
                </div>
                {{-- end categories --}}

                <span id="product_section" style="width: 100% !important">

                @foreach ($products as $item)


                    <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2 page-section ">
                        <div class="card shadow">
                            <img class="card-img" src="{{ $item->image }}" width="300" height="350"
                                alt="succulent">

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
         
            {{-- start product category --}}
            <div id="loader" ></div>

            {{-- @foreach ($general_data->menu_categories as $item)
                @php
                    $products = json_decode(
                        \Http::get('dashboard.yalago.net/api/vendor/' . $rest_name . '/menu?category_id=' . $item->category_id)
                            ->getBody()
                            ->getContents(),
                    );
                @endphp
                <span id="{{ $item->category_id }}" style="  width: 100%;">
                    @foreach ($products->data->products_menu as $product)
                        <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2 page-section ">
                            <div class="card shadow">
                                <img class="card-img" src="{{ $product->image }}" width="300" height="350"
                                    alt="succulent">
                                <div class="card-body">
                                    <h4 class="card-title title_menu">{{ $product->product_name }}</h4>
                                    <p class="card-text paragraph">
                                        {!! $product->product_desc !!}
                                    </p>
                                </div>
                                <div class="card-body">
                                    <a class="card-link link1 "> <span class="price">CAL
                                            {{ $product->product_calories }} </span> /
                                        {{ $product->price_currency }}
                                        {{ $product->product_price }}
                                    </a>
                                    <a class="card-link link2"><img src="{{ $general_data->vendor_image }}"
                                            width="170" height="180" alt=""></a>
                                </div>

                            </div>
                        </div>

                    @endforeach
                </span>
            @endforeach --}}
            {{-- end product category --}}
            

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
            $(".category_id").click(function(){
                          var id =  $(this).attr('value');
                          $(".all_category .active").removeClass("active"); 
                          $(this).addClass('active');
                          
                          $.ajax({
                              url: '{{ route('category',$rest_name) }}',
                              type: "get",
                              data: {id: id},
                               beforeSend: function() {
                                $('html, body').animate({
                                scrollTop: $("#product_section_animite").offset().top
                            }, 1000);
                                $("#loader").addClass('loading');
                              },
                              success: function(data) {
                                $("#product_section").empty(); 

                                  $("#product_section").append(data); 
                               
                                 },
                              complete: function(data) {
                                $("#loader").removeClass('loading');
                              },
                          });
                      });
        var fixmeTop = $('.fixme').offset().top; // get initial position of the element

        $(window).scroll(function() { // assign scroll event listener

            var currentScroll = $(window).scrollTop(); // get current position

            if (currentScroll >= fixmeTop) { // apply position: fixed if you
                $('.fixme').css({ // scroll to that element or below it
                    position: 'fixed',
                    'z-index': '2',
                    top: '-12px',
                    left: '0'
                });
            } else { // apply position: static
                $('.fixme').css({ // if you scroll above it
                    position: 'static'
                });
            }

        });
    
       
        $(document).ready(function() {
           
            //smoothscroll
            $('a[href^="#"]').on('click', function(e) {
                e.preventDefault();
                $('a').each(function() {
                    $(this).removeClass('active');
                })
                $(this).addClass('active');

                $(document).off("scroll");


                $(this).addClass('active');
                $('a').each(function() {
                    $(this).removeClass('active');
                })
                var target = this.hash,
                    menu = target;
                $target = $(target);
                $('html, body').stop().animate({
                    'scrollTop': $target.offset().top + 2
                }, 500, 'swing', function() {
                    window.location.hash = target;
                    $(document).on("scroll", onScroll);
                });
                // 'scrollTop': $target.offset().left + $('a.active').outerWidth(true)/2

            });
        });

        // function onScroll(event){
        //     var scrollPos = $(document).scrollTop();
        //     $('#navbar_top a').each(function () {
        //         var currLink = $(this);
        //         var element = document.querySelector("#navbar_top a.active")
        //         var refElement = $(currLink.attr("href"));
        //         if (refElement.position().top <= scrollPos && refElement.position().top + refElement.height() > scrollPos) {
        //             $('#navbar_top a').removeClass("active");
        //             currLink.addClass("active").width()/2;
        //         }
        //         else{
        //             currLink.removeClass("active");
        //         }
        //     });
        // }
    </script>



</body>

</html>
