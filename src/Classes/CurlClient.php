<?php

namespace IdentityPass\IdentityPass\Classes;


class CurlClient {

    static function send($headers, $httpMethod, $resourceUrl, $request) {
        $response = Array();

        $curl = curl_init();

        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        if ($httpMethod == 'DELETE') {
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        }

        if ($httpMethod == 'POST') {
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        }

        if ($httpMethod == 'PUT') {
            curl_setopt($curl, CURLOPT_PUT, 'PUT');
            curl_setopt($curl, CURLOPT_POSTFIELDS, $request);
        }

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_URL, $resourceUrl);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl, CURLINFO_HEADER_OUT, true);
        //echo "<br><br>Headers: ";
        //var_dump($headers);
        //echo "<br>HTTP Method: ". $httpMethod;
        //echo "<br>Resource URL: ". $resourceUrl;
        //echo "<br>request: ". $request;

        $curl_response = curl_exec($curl);
        $info = curl_getinfo($curl);
        //echo "<br><br>Curl Info: ". $info['request_header'];

        if ($curl_response === false) {
            curl_close($curl);
//            die('<br><br>error occured during curl exec. Additional info: ' . var_dump($info));
        }

//      $json = json_decode($curl_response, true);
        $response[Constants::HTTP_CODE] = $info['http_code'];
        $response[Constants::RESPONSE_BODY] = $curl_response;

        //print_r($response);
        curl_close($curl);

        return $response;
    }

}

