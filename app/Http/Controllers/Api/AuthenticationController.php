<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Apitoken;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class AuthenticationController extends Controller
{
    function api_login(Request $request){
      
        $client = new Client();
        $url ='http://127.0.0.1:8000/api/user/login';
        $email = $request->email;
        $password = '123456';

        $request = $client->post($url,[
            'form_params' => [
                'email' => $email,
                'password' => $password,
            ]
        ]);
        $info = json_decode($request->getBody(),true);
        $token = $info['data']['token'];

        return $token;
        // $client->post($url,[
        //     'headers' => ['Authorization'=>'Bearer'.$token]
        // ]);
        // return "login successfull";
    }
}
