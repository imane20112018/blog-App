<?php
require 'config/database.php';

if(isset($_POST['submit'])){
    //get updated form data 
    $id=filter_var($_POST['id'],FILTER_SANITIZE_NUMBER_INT);
    $prenom = filter_var($_POST['prenom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom = filter_var($_POST['nom'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin=filter_var($_POST['userrole'],FILTER_SANITIZE_NUMBER_INT);

    //check for valid input
    if(!$prenom || !$nom){
        $_SESSION['edit-user']="le formulaire est invalide dans la page de modification.";

    }else{
        //update user
        $query= "UPDATE users SET prenom ='$prenom', nom='$nom',is_admin=$is_admin WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection,$query);
        
        if(mysqli_errno($connection)){
            $_SESSION['edit-user']="échec de Modification de l'utilisateur.";
        }else{
            $_SESSION['edit-user-success']="Utilisateur $prenom $nom a été modifié avec succès.";
        }
    }
}
header('location:'.ROOT_URL.'admin/manage-users.php');
die();
