<?php

session_start();
include_once("request.php");

include_once("./classes/Crypt.class.php");

function get_navigation(){

$s = explode("?", $_SERVER['REQUEST_URI']);
$pag = explode("/", $s[0]);

return $pag[2];

}

/*
* TODO: usar função get_navigation()
*/
function pag_load(){

$s = explode("?", $_SERVER['REQUEST_URI']);
$pag = explode("/", $s[0]);


if($pag[2] != null){
    if(!file_exists("./pag/{$pag[2]}.php")){
        include_once("./pag/errors/404.php");
    }else{
        include_once("./pag/{$pag[2]}.php");
    }
}else{
    include("./pag/inicio.php");
}

}