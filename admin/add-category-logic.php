<?php

use function PHPSTORM_META\elementType;

require 'config/database.php';

if(isset($_POST['submit']))
{
    //get form data 
    $titre = filter_var($_POST['titre'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'],FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    
    if(!$titre){
        $_SESSION['add-category']="Entrer le titre";
    }elseif(!$description) {
        $_SESSION['add-category']= "Entrer la déscription";
    }
    //redirect back to add category  page with form data if there was invalid input 
    if(isset($_SESSION['add-category'])){
        $_SESSION['add-category-data']=$_POST;
        header('location:'.ROOT_URL.'admin/add-category.php');
    }else{
        //insert category into db 
        $query = "INSERT INTO categories (titre, description) VALUES ('$titre','$description')";
        $result = mysqli_query($connection, $query);
        if(mysqli_errno($connection)){
            $_SESSION['add-category']="Impossible d'ajouter la catégorie";
            header('location:'.ROOT_URL.'admin/add-category.php');
            die();
        }else{
            $_SESSION['add-category-success']="la catégorie $titre est ajoutée avec succes";
            header('location:'.ROOT_URL.'admin/manage-categories.php');
            die();
        }
    }
}
   