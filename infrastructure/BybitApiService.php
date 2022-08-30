<?php 

namespace infrastructure;

class BybitApiService
{

    function signedRequest($params)
    {
    
    
    $url = 'https://api-testnet.bybit.com/private/linear/order/create';
    // $url = 'https://api.bybit.com/v2/private/order/create';
    
    
    $qs=$this->get_signed_params($params);
    $curl_url=$url."?".$qs;
    $curl=curl_init($curl_url);
    echo $curl_url;
    curl_setopt($curl, CURLOPT_URL, $curl_url);
    #curl_setopt($curl, CURLOPT_POSTFIELDS, $qs);
    curl_setopt($curl, CURLOPT_POST, true);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    #curl_setopt($curl, CURLOPT_PROXY,"127.0.0.1:1087");
    $execResult=curl_exec($curl);
    $response = curl_getinfo($curl);

    // dd($response);

    

    curl_close ($curl);
    dd(json_decode($execResult));

    }



    function get_signed_params($params) {
        $public_key = config('app.api_key_bybit');
        $secret_key = config('app.secret_key_bybit');
        $params = array_merge(['api_key' => $public_key], $params);
        ksort($params);
        //decode return value of http_build_query to make sure signing by plain parameter string
        $signature = hash_hmac('sha256', urldecode(http_build_query($params)), $secret_key);
        return http_build_query($params) . "&sign=$signature";
    }

}