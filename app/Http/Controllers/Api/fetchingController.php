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
        return view('fetching',['apiData' => $data['data']]);
    }


    function show($id){
        $client = new Client();
        $response = $client->get('http://127.0.0.1:8000/api/get/product/'.$id);
        $data = json_decode($response->getBody(),true);
        return view('single',['apiData' => $data['data']]);
    }

    function api_login(Request $request){

        $client = new Client();

        $data['email'] = $request->email;
        $password = bcrypt($request->password);
        $data['password'] = $password;

        $request = $client->post('http://127.0.0.1:8000/api/user/login',[
            'form-params' => $data
        ]);

        $info = json_decode($request->getBody(),true);
        // $token = $info['data']['token'];

        // $auth_login= $client->get($url,[
        //     'headers' => ['Authorization'=>'Bearer'.$token]
        // ]);
        return $info;
    }
}
