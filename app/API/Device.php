<?php

namespace App\API;


class Device
{
    static function Get_List_Device($token){
        // Generated by curl-to-PHP: http://incarnate.github.io/curl-to-php/
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/me/player/devices');
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

        $tab = array(array());
        for ( $i = 0 ; $i<count($jsonObj->devices) ; $i++ ){
                $tab[$i][0] = $jsonObj->devices[$i]->id;   // Device ID
                $tab[$i][1] = $jsonObj->devices[$i]->name;   // Device name
                $tab[$i][2] = $jsonObj->devices[$i]->type;   // Device type
                $tab[$i][3] = $jsonObj->devices[$i]->volume_percent;   // Device volume
                $tab[$i][4] = 0;
        }
            return array($tab,count($jsonObj->devices));
    }

    static function Test_Device($token){
        $list = Device::Get_List_Device($token);
        if ( $list[1]==0){
            $ret = array(false,$list);
        }
        else {
            $ret = array(true,$list);
        }
        return $ret;

    }

    static function Choose_Device($token,$num){
        $test = Device::Test_Device($token);
        $list = $test[1];
            if( $test[0] == true){
            return $list[$num][0][0];
            } else {
            return -1;
        }
    }
}