<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
// $email = "azertyuiop@azertyuiop.azertyuiop";
// $email = "' OR 1=1 OR '";
require('include/Modele.php');

// Ternaire
/*
echo ($_POST)?'Yeesssss!!!!':'NNOOOOOOOO!!!!';
if($_POST)
    echo 'Yeesssss!!!!';
else
    echo 'NNOOOOOOOO!!!!';
*/
if($_POST){
    if(isset($_POST['nom']) && !empty($_POST['nom'])){
        if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
            if(isset($_POST['email']) && !empty($_POST['email'])){

                    if(isset($_POST['mdp']) && !empty($_POST['mdp'])){
                        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)){
                            // if( hash_equals($passwordToBDD, $_POST['password']) )
                            $password = crypt($_POST['mdp'], 'Moi');
                            $modele = new Modele();
                            $modele->inserUser($_POST['nom'], $_POST['prenom'],$_POST['email'], $password, 'zoubida' );
                            echo 'Yeesssss!!!!';
                            return TRUE;
                        }
                    }
                
            }
        }
    }
}
echo 'Nnnnooooooo!!!!';
return FALSE;
// $element = new Modele($email);