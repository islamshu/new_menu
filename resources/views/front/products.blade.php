@foreach ($products as $item)


                <div class="col-lg-12 col-md-12 col-sm-12   col-xs-12   mt-2 mb-2" id="{{ $cat_id }}">
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