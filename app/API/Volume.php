<?php

namespace App\API;


class Volume
{
    static function Pause($token,$device_id){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/me/player/pause?device_id='.$device_id.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');


        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer '.$token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    static function Play_current($token,$device_id){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/me/player/play?device_id='.$device_id.'');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'PUT');


        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer '.$token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
    }

    static function Get_Play_Statut($token){
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/me/player');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');


        $headers = array();
        $headers[] = 'Accept: application/json';
        $headers[] = 'Content-Type: application/json';
        $headers[] = 'Authorization: Bearer '.$token;
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

        $result = curl_exec($ch);
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }
        curl_close($ch);
        $jsonObj = json_decode($result);

        if ($jsonObj != NULL)
        {
            return $jsonObj->is_playing;
        }
        return 0;

        //return $jsonObj->is_playing;
        
    }

    static function Play_Pause($token,$device_id){
        if ( Volume::Get_Play_Statut($token)==true){
            Volume::Pause($token,$device_id);
        }
        else {
            Volume::Play_current($token, $device_id);
        }
    }
}