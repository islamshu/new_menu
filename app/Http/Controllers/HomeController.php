<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index($data){
        $general_data =  Http::get('dashboard.yalago.net/api/vendor/'.$data.'/info')->getBody()->getContents();
        $data = Http::get('https://dashboard.yalago.net/api/vendor/'.$data.'/all-products')->getBody()->getContents();
        $body = json_decode($data);
        $general_data = json_decode( $general_data)->data;
        // dd($general_data);

        $products = $body->data->products_menu;
        // dd($products);
        return view('front.data',compact('products','general_data'));
    }
}
