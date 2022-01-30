<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    
    public function index(Request $request,$data){
        $rest_name = $data;
        
        $general_data =  Http::get('dashboard.yalago.net/api/vendor/'.$rest_name.'/info')->getBody()->getContents();
        $data = Http::get('https://dashboard.yalago.net/api/vendor/'.$rest_name.'/all-products')->getBody()->getContents();
        $body = json_decode($data);
        $general_data = json_decode( $general_data)->data;
        

        $products = $body->data->products_menu;
        $pagination = $body->data->paginate;
  
      
        return view('front.data',compact('products','general_data','pagination','rest_name'));
    }
    public function get_data(){
        return true;
    }
    public function product_by_category(Request $request,$data)
    {
        if($request->id =='all'){
            $general_data =  Http::get('dashboard.yalago.net/api/vendor/'.$data.'/info')->getBody()->getContents();
            $data = Http::get('https://dashboard.yalago.net/api/vendor/'.$data.'/all-products')->getBody()->getContents();
            $body = json_decode($data);
            $general_data = json_decode( $general_data)->data;
            
    
            $products = $body->data->products_menu;
            $cat_id = $request->id;

            return view('front.products',compact('products','general_data','cat_id'));

        }
        $products =  Http::get('dashboard.yalago.net/api/vendor/'.$data.'/menu?category_id='.$request->id)->getBody()->getContents();
        $general_data =  Http::get('dashboard.yalago.net/api/vendor/'.$data.'/info')->getBody()->getContents();
        $general_data = json_decode( $general_data)->data;
        $cat_id = $request->id;

        $body = json_decode($products);

        
        $products = $body->data->products_menu;
        
        return view('front.products',compact('products','general_data','cat_id'));
    }
}
