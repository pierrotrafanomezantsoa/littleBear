<?php

require ('actions/database.php');

//Validation du formulaire
if(isset($_POST['validate'])){
    //Verifier si l'user a bien completé tous les champs
   
    if(!empty($_POST['lastname']) AND !empty($_POST['firstname'])  AND !empty($_POST['email']) AND !empty($_POST['phonenbr']) AND !empty($_POST['choice']) AND !empty($_POST['message'])){

        //les données de l'user
        $user_lastname = htmlspecialchars($_POST['lastname']); 
        $user_firstname = htmlspecialchars($_POST['firstname']);
        $user_email = htmlspecialchars($_POST['email']);
        $user_phone = htmlspecialchars($_POST['phonenbr']);  
        $user_choice = htmlspecialchars($_POST['choice']);  
        $user_message = htmlspecialchars($_POST['message']);
        
        
        //Verifier si l'user existe déjà et envoyez déjà sur le site
        $checkIfUseralreadyExists = $bdd->prepare('SELECT email FROM user WHERE email = ?');
        $checkIfUseralreadyExists->execute(array($user_email));

        if($checkIfUseralreadyExists->rowCount() == 0){
             //Insérer User dans bdd
             $insertUsersOnWebsite = $bdd->prepare('INSERT INTO user(nom, prenom, email, phone, choix, message)VALUES(?, ?, ?, ?, ?, ?)');
             $insertUsersOnWebsite->execute(array( $user_lastname, $user_firstname, $user_email, $user_phone, $user_choice, $user_message));
  
             header('Location: signup.php');

        }else{
            $errorMsg ='Vous avez  deja envoyez vos informations';

        }
    }else{
        $errorMsg ='Veuillez completer tous les champs ...';

    }


}
?>