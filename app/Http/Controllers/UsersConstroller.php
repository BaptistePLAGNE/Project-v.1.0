<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\API\Device;
use App\API\Playlist;
use App\API\Token;
use App\API\Volume;


class UsersConstroller extends Controller
{
    function getData(){
        $token = Token::Token();
        $device_id = Device::Choose_Device($token, 0);
        Volume::Play_Pause($token,$device_id);
        return view('Parametre');
    }
}