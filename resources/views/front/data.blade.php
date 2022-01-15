<html>

<head dir="rtl">
    <title>TEST</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@500&display=swap" rel="stylesheet">
</head>

<style>
    * {
        font-family: 'Cairo', sans-serif;
    }

    .title {
        text-align: center !important;
        font-size: 50px;
        color: #000;
    }

    .desc {
        text-align: center !important;
        font-size: 30px;
        color: #000;
    }

    .card-title {
        direction: rtl;
        text-align: right;
    }

    .paragraph {
        text-align: center;
        color: #846725;
        margin-top: 8%;
        font-size: 34px;
    }

    .shadow {
        padding: 2%;
    }

    body {
        min-height: 100vh;
        /* background-image: radial-gradient( circle 621px at 25.3% 13.8%, rgba(255, 255, 255, 1) 0%, rgba(234, 236, 255, 1) 90%); */
        background-image: url({{ $general_data->vendor_cover_img }});
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .price {
        color: green;
    }

    .title_menu {    
        font-size: 30px;
        font-weight: bold;
    }

    .link1 {
        float: right;
        margin-top: 15%;
        font-size: 30px;
        font-weight: bold;
    }

    .link2 {
        float: left;
        margin-top: 5%;
    }

    @media (min-width: 768px) {


        .container {
            max-width: 860px !important;
        }

        .card-img {
            /* width: 94%; */
            height: 100%;
            /* margin-left: 32%; */
            text-align: center;
            border-radius: calc(.25rem - 1px);
        }
    }

</style>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2">
                <div class="card shadow">
                    <div class="text-white">
                        <h5 class="card-title title"><img src="{{ $general_data->vendor_image }}" width="350"
                                height="300" alt=""></h5>

                        <h5 class="card-title title">{{ $general_data->vendor_name }}</h5>
                        <p class="card-text desc" style="     background: -webkit-linear-gradient(#fff81d, #333);
                    -webkit-background-clip: text;
                    -webkit-text-fill-color: #fff81d4a;">{{ $general_data->vendor_desc }}</p>
                    </div>

                </div>
            </div>
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
                            <a class="card-link link1 "> <span class="price">CAL {{ $item->product_calories }} </span> / {{ $item->price_currency }} {{ $item->product_price }} 
                                </a>
                            <a class="card-link link2"><img src="{{ $general_data->vendor_image }}" width="170"
                                    height="170" alt=""></a>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0-alpha1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</body>

</html>
