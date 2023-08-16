<?php


namespace App\Libraries;


class PayPalApi
{
    public function getAccessToken(){

        $response = Http::withHeaders([
            'Accept-Language' => 'Accept-Language',
            'Authorization' => 'Bearer'
        ])->get('https://api-m.sandbox.paypal.com/v1/identity/generate-token');


        curl -X POST https://api-m.sandbox.paypal.com/v1/identity/generate-token -H 'Content-Type: application/json' -H 'Authorization: Bearer <ACCESS-TOKEN>' -H 'Accept-Language: Accept-Language'

    }
}