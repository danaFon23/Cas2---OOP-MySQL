<?php

$host = "localhost";
$db = "kolokvijumi";
$user = "root";
$pass = "";

//Kreiramo konekciju
$conn = new mysqli($host,$user,$pass,$db);

if($conn->connect_errno){
    exit("Neuspesna konekcija: greska > " .$conn->connect_errno. "err kod >" .$conn->connect_errno);
}

?>