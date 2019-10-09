<?php
require_once('DAO/CinemaDAO.php');
//$jsonObject = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=c65889a54974a405a970caef706f7005');
$jsonObject = file_get_contents('https://api.themoviedb.org/3/movie/now_playing?api_key=c65889a54974a405a970caef706f7005');
$result = json_decode($jsonObject, true);

var_dump($result);


?>