<?php


    class User{
        public $id;
        public $username;
        public $password;

        public function __construct($id=null,$username=null,$password=null){
            $this->id = $id;
            $this->username = $username;
            $this->password = $password;

        }

        public static function logInUser($usr,mysqli $conn)
        {
            $query = "SELECT * FROM user WHERE username = '$usr->username' and password= '$usr->password'";
            //konekcija na bazu
            //return true; // Korisnik je ulogovan, vraca true
            return $conn->query($query);  //query je fja za izvrsavanje upita preko mySQLi konekcije
        }
    }

?>