<?php

include('Playlist.php');

function Recently_Played($token,$limit){
$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, 'https://api.spotify.com/v1/me/player/recently-played?limit='.$limit.'');
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
for ( $i=0 ; $i<$jsonObj->limit; $i++){
    $tab[$i][0] = $jsonObj->items[$i]->track->name; // Name of the song
    $tab[$i][1] = $jsonObj->items[$i]->track->uri;  // Uri of the song
    $tab[$i][2] = $jsonObj->items[$i]->played_at; // Date quand le son a été joué
}

return $tab;
}



$limit = 10;


function Si_Deja_Jouer_Doublons($token,$uri,$playlist_id_main,$limit=10){
    $tab = Recently_Played($token,$limit);
    $temp = Get_Song_Playliste($token, $playlist_id_main);
    $tab_p = $temp[0];
    $limit_p = $temp[1];
    for ( $i = 0 ; $i<$limit ; $i++){
        if ($tab[$i][1] == $uri) {
            echo "\n\033[33m |-----------------------------| \033[0m\n";
            echo "\033[33m | Son déjà joué récemment :'( |\033[0m\n";
            echo "\033[33m |-----------------------------| \033[0m\n\n";
            return -1;
        }}
    for ($i = 0; $i < $limit_p; $i++) {
        if ($tab_p[$i][3] == $uri) {
            echo "\n\033[33m |-----------------------------| \033[0m\n";
            echo "\033[33m | Son déjà dans la playlist ! |\033[0m\n";
            echo "\033[33m |-----------------------------| \033[0m\n\n";
            return -2;
        }
    }
  echo "\n\033[34m |----------------| \033[0m\n";
    echo "\033[34m | Son nouveau :) |\033[0m\n";
    echo "\033[34m |----------------| \033[0m\n\n";
    return 1;
}


function Suppr_Si_Deja_Joue($token,$playlist_id,$limit=10){
    $temp_p = Get_Song_Playliste($token, $playlist_id)[0];
    $tab_p = Get_Song_Playliste($token, $playlist_id)[0];
    $limit_p = Get_Song_Playliste($token, $playlist_id)[1];
    $stop = 0;
    $tab_r = Recently_Played($token,$limit);
    echo "\n\033[33m | Test des sons dans la playlist... |\033[0m\n";
    for ( $i = 0; $i < $limit_p; $i++){
        for ( $z=0; $z<$limit ; $z ++){
            if ( $tab_r[$z][1] ==  $tab_p[$i][3]){
              echo "\n\033[33m |-----------------------------------------------------------  \033[0m\n";
                echo "\033[33m | Son déjà joué récemment ! \033[0m\n";
                echo "\033[94m | Suppréssion de \033[35m".$tab_r[$z][0]."\033[94m de la playlist : \33[0m\n";
                echo "\033[33m |----------------------------------------------------------- \033[0m\n\n";
                Remove_Track($token, $playlist_id, $tab_r[$z][1]);
                $stop = 1;
            }
        }
    }
    if ( $stop == 0){
      echo "\n\033[33m |-------------------------------------------| \033[0m\n";
        echo "\033[33m | Aucun son joué récemment dans la playlist |\033[0m\n";
        echo "\033[33m |-------------------------------------------| \033[0m\n\n";
    }
}