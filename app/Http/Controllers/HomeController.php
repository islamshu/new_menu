<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index(Request $request,$data){
        $general_data =  Http::get('dashboard.yalago.net/api/vendor/'.$data.'/info')->getBody()->getContents();
        $data = Http::get('https://dashboard.yalago.net/api/vendor/'.$data.'/all-products')->getBody()->getContents();
        $body = json_decode($data);
        $general_data = json_decode( $general_data)->data;

        // dd($general_data->menu_categories);

        $products = $body->data->products_menu;
        $pagination = $body->data->paginate;
        // dd($pagination);

        // $numOfpages = ceil($pagination->total /  $pagination->per_page) ;
        // $current_page = $pagination->currentPage;
        // $has_next_page = $pagination->hasMorePages;
        // $has_previous_page = $pagination->previousPageUrl;
        // $next_page = $pagination['next_page'];
      
        return view('front.data',compact('products','general_data','pagination'));
    }
    public function product_by_category(Request $request)
    {
        $general_data =  Http::get('dashboard.yalago.net/api/vendor/'.$request->data.'/menu?category_id='.$request->category_id)->getBody()->getContents();
       dd($general_data);
    }
}
