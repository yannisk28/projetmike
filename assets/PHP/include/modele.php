<?php
class Modele{

    private $dbh;
    
    function __construct(){

        try {
            $this->dbh = new PDO("mysql:dbname=pickbox;host=localhost", "root", "root", array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

        } catch (PDOException $e) {
            echo 'Échec de la connexion database ';
            exit;
        }
    }

    function inserUser($nom, $prenom, $email, $mdp ){

        $sql = "INSERT INTO `User`(`nom`, `prenom`, `email`, `mdp` ) VALUES (?, ?, ?, ?)";

        $request = $this->dbh->prepare($sql);
        $request->bindParam(1, $nom, PDO::PARAM_STR); 
        $request->bindParam(2, $prenom); 
        $request->bindParam(3, $email, PDO::PARAM_STR); 
        $request->bindParam(4, $mdp, PDO::PARAM_STR); 
        
        $request->execute();

    }
}