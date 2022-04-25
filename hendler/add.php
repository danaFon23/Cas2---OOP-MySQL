<?php
//add nam je deo modala (iz home) za zakazivanje klk-a

require "../dbBroker.php";        //  .. znaci izadji iz foldera
require "../model/prijava.php";

if(isset($_POST['predmet']) && isset($_POST['katedra']) && isset($_POST['sala']) && isset($_POST['datum'])){
    $prijava = new Prijava(null, $_POST['predmet'], $_POST['katedra'], $_POST['sala'], $_POST['datum']);
    $status = Prijava::add($prijava, $conn); // treba da posaljemo prijavu i mysqli konekciju (red iznad napravili)
    if($status){
        echo 'Success';
    }else{
        echo $status;
        echo 'Failed';
    }
}
//Treba povezati da radi sa home.php preko javascripta. Kreiramo js folder, gde pravimo main.js. 
//Javascipt nam treba zbog AJAXa

?>