<?php
class Prijava{
    public $id; //treba nam za neki deo u bazi
    public $predmet;
    public $katedra;
    public $sala;
    public $datum; 

    public function __construct($id=null, $predmet=null, $katedra=null, $sala=null, $datum=null)
    {
        $this->id = $id;
        $this->predmet = $predmet;
        $this->katedra = $katedra;
        $this->sala = $sala;
        $this->datum = $datum;
    }

    //Fja prikazi sve getALL
    public static function getAll(mysqli $conn)
    {
        $query = "SELECT * FROM prijave";
        return $conn->query($query);
    }
    public static function getById ($id, mysqli $conn){
        $query = "SELECT * from prijave where id=$id";
        $myArray = array();
        $rezultat = $conn->query($query);
        if($rezultat){
            while($red = $rezultat->fetch_array()){
                $myArray[] = $red;
            }
        }
            
        return $myArray;
    }

    public function deleteById(mysqli $conn){
        $query = "DELETE FROM prijave where id = $this->id";
        return $conn->querry($query);
    }

    public static function add(Prijava $prijava, mysqli $conn){
        $q = "INSERT INTO prijave(predmet,katedra,sala,datum) VALUES ('$prijava->predmet', '$prijava->katedra',
        '$prijava->sala', '$prijava->datum')";  //mora jednostruki navodnici, da bi znali da je u pitanju string
        return $conn->querry($q);

    }

    public function update(mysqli $conn){ ///prosledjujemo samo konekciju, jer radimo nad userom ciji id vec imamo
        $q = "UPDATE prijave set predmet='$this->predmet', katedra='$this->katedra', sala='$this->sala', 
        datum='this->datum'";
        return $conn->querry($q);
    }

}

?>