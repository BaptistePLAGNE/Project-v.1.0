<?php
//include('Ban.php');

function get_playlist_txt(){
$file = __DIR__ . '/playlist.txt';
$f = fopen($file, 'r');
$playlist_id_main = fgets($f);
return $playlist_id_main;
}

function Token()
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
    #echo($result);
    $jsonObj = json_decode($result);
    //  echo ("Token : --> ");
    //echo $jsonObj->access_token ."\n";
    $TOKEN_ID = $jsonObj->access_token;

    return $TOKEN_ID;
}


function Add_Playlist($token,$uri,$playlist_id){
            $ch = curl_init();

            $uri2 = str_replace(':', '%3A', $uri);
            curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/playlists/' . $playlist_id . '/tracks?uris=' . $uri2 . '');
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($ch, CURLOPT_POST, 1);

            $headers = array();
            $headers[] = 'Accept: application/json';
            $headers[] = 'Content-Type: application/json';
            $headers[] = 'Authorization: Bearer ' . $token;
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

            $result = curl_exec($ch);
            if (curl_errno($ch)) {
                echo 'Error:' . curl_error($ch);
            }
            curl_close($ch);
    }
            $token = Token();
            Add_Playlist($token,$_GET['uri'],"0t6iIfRcfi9Hzz8g06jFme");
?>

<!DOCTYPE html>
<html>
        <head>
            <meta charset="utf-8" />
            <title>Music Project</title>
        </head>
        <body>
        <div class='Logo'> <img src="https://pbs.twimg.com/media/Fmrllq2aYAAT-S2?format=jpg&name=900x900"
         alt="An intimidating leopard."></div>
        <p><h1>Merci pour votre participation ! </h1></p>
    </body>
    <style>
        *{
         background-color: #4D4A45;
         font-family: sans-serif;
        }
        .Logo{
            text-align: center;
            margin-left: auto;
            margin-right: auto; 
            margin-top: 10%; 
            width: 100%;
        }
        h1{
            margin-top: 5%;
            text-align: center;
            font-size: 100px;
            color: #FAA105; 
                    }
    </style>
</html>