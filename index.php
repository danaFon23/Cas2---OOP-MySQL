<?php

require "dbBroker.php";                       // potreban nam je dbBroker
require "model/user.php" ;                   //iz modela nam je potreban user.php


session_start();                            //zapocinjemo sesiju da bi pamtili da se user ulogovao
if(isset($_POST['username']) && isset($_POST['password']))
{
    $uname = $_POST['username'];
    $upass = $_POST['password'];

   // $conn = new mysqli();  //Pregazena konekcija iz DB brokera

    $korisnik = new User(null,$uname,$upass);      //kreiramo korisnika
    //$odg = $korisnik->logInUser($uname,$upass, $conn); //ne moramo da pozivamo nad korisnikom f-ju, vec mozemo nad klasom(sledeci red)
    $odg = User::logInUser($korisnik, $conn); //pristup STATICKIM f-jama preko KLASE  //ovde je vidljiva konekcija
    //odg iz baze na osnovu f-je iz Usera
    
    if($odg->num_rows==1){    //ako je broj redova jednako 1, tj. ako se vratio jedan korisnik, u tom slucaju hocemo da se ulogujemo, u suprotnom ne
        echo `
        <script>
        console.log("Uspesno ste se ulogovali.");
        </script>
        `;
        $_SESSION['user_id'] = $korisnik->id;
        header('Location: home.php');  // da nam se prikaze str home kad se ulogujemo
        exit();
    }else{
        echo `
        <script>
        console.log("Niste se prijavili");
        </script>
        `;
    }
}



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>FON: Zakazivanje kolokvijuma</title>

</head>
<body>
    <div class="login-form">
        <div class="main-div">
            <form method="POST" action="#">
                <div class="container">
                    <label class="username">Korisnicko ime</label>
                    <input type="text" name="username" class="form-control"  required>
                    <br>
                    <label for="password">Lozinka</label>
                    <input type="password" name="password" class="form-control" required>
                    <button type="submit" class="btn btn-primary" name="submit">Prijavi se</button>
                </div>

            </form>
        </div>

        
    </div>
</body>
</html>