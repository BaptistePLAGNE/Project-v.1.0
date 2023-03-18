<?php

namespace App\API;


class Token
{
    static function Token()
    {
        $date = date('d-m-y h:i:s');
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://accounts.spotify.com/api/token');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "grant_type=refresh_token&refresh_token=AQD8YFwmBeHALzNEW0jN6DcyJqVjYh2Ys_a1cN9Wtm2AdcAeLsf_hWpfmuWVF956-aooxETLQq6J--RdqWmowKDE0FOt-e2ruP4DZSYad5SkhHGn0xIm_vYIaZg0aobg7Pk");

        $headers = array();
        $headers[] = 'Content-Type: application/x-www-form-urlencoded';
        $headers[] = 'Authorization: Basic MWM2MTAyNTRmZWRjNGJhZWJjY2M1ODU4YjI2MmI2M2Q6Y2NiOTBkNTZmYzY3NGM5OTlkODNkYmU2NjBjNDcyZmM=';
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        $jsonObj = json_decode($result);
        $TOKEN_ID = $jsonObj->access_token;

        return $TOKEN_ID;
    }
}