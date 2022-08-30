<?php

namespace infrastructure;

use Illuminate\Http\Request;

class BinanceApiService
{




    CONST BASE_URL = 'https://testnet.binancefuture.com'; // testnet

    function signature($query_string, $secret) {
        return hash_hmac('sha256', $query_string, $secret);
    }

    function sendRequest($method, $path, $key) {
        $url = self::BASE_URL . $path;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('X-MBX-APIKEY:'.$key));
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_URL, $url);
        if($method=="DELETE"){
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        }
        curl_setopt($ch, CURLOPT_POST, $method == "POST" ? true : false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $execResult = curl_exec($ch);
        $response = curl_getinfo($ch);

        curl_close ($ch);
        return json_decode($execResult);
    }


    function signedRequest($path,$method,$parameters) {
    
        $api_key = config('app.api_key_binance');
       
        $secret = config('app.secret_key_binance');
        $parameters['timestamp'] = round(microtime(true) * 1000);
        $query = $this->buildQuery($parameters);
        $signature = $this->signature($query, $secret);

        //dd($this->sendRequest($method, "${path}?${query}&signature=${signature}", $api_key));
        return $this->sendRequest($method, "${path}?${query}&signature=${signature}", $api_key);

    }



    function buildQueryJson(array $params)
    {
        return json_encode($params);
    }



    function buildQuery(array $params)
    {
        $query_array = array();
        foreach ($params as $key => $value) {
            if (is_array($value)) {
                $query_array = array_merge($query_array, array_map(function ($v) use ($key) {
                    return urlencode($key) . '=' . urlencode($v);
                }, $value));
            } else {
                $query_array[] = urlencode($key) . '=' . urlencode($value);
            }
        }
        return implode('&', $query_array);
    }

}
