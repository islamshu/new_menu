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
            {{-- start categories --}}
            <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2">
                <div class="scrollmenu" id="navbar_top">
                    @foreach ($general_data->menu_categories as $item)

                        <a href="#{{ $item->category_id }}" onclick="getproduct('{{ $item->category_id }}')">{{ $item->category_name }}</a>
                    @endforeach

                </div>
            </div>
             {{-- end categories --}}
            @foreach ($products as $item)


                <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2">
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
            <div id="products">
                
            </div>
            <div class="loader" style="display:none"></div>

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
        // $(document).ready(function() {
            function getproduct(id) {
                
                $('loader').show();

                $.ajax({
                type: 'get',
                url: "{{ route('category', $rest_name) }}",
                data: {
                    'id': id,
                    // 'data':'{{ $rest_name }}'
                },
                success: function(data) {
                    $('loader').hide();
                $('#products').append(data);
                document.getElementById(id).scrollIntoView({behavior: 'smooth'});



                }

            });
            }
        // });
    </script>
    

</body>

</html>
