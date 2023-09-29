<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
class fetchingController extends Controller
{
    function fetchingData(){
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/get/products');
        $data = json_decode($response->getBody(),true);
        // $products = response($data);
        return $data;
        // return view('fetching',['apiData' => $data['data']]);
    }

    function store(Request $request){
        $client = new Client();
        $url = 'http://127.0.0.1:8000/api/create/product';
        $response = $client->post($url,[
            'form_params' => [
                'title' => $request->title,
                'description' => $request->description,
            ]
        ]);

        return "create successfull";
    }

    function show($id){
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/get/product/'.$id);
        $data = json_decode($response->getBody(),true);
        return view('single',['apiData' => $data['data']]);
    }

   
}
