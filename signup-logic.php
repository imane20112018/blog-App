<?php
require 'config/database.php';
//get signup from data if signup button was clicked
if (isset($_POST['submit'])) {
    $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom_utilisateur = filter_var($_POST['nom_utilisateur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmepassword = filter_var($_POST['confirmepassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $avatar = $_FILES['avatar'];

    //validte input values
    if (!$prenom) {
        $_SESSION['signup'] = "stp entrer ton prenom";
    } elseif (!$nom) {
        $_SESSION['signup'] = "stp entrer ton nom";
    } elseif (!$nom_utilisateur) {
        $_SESSION['signup'] = "stp entrer ton Nom d'Utilisateur";
    } elseif (!$email) {
        $_SESSION['signup'] = "stp entrer ton Email";
    } elseif (strlen($createpassword) < 8 || strlen($confirmepassword) < 8) {
        $_SESSION['signup'] = "le mot de passe doit comprendre au moins 8 caractères ";
    } elseif (!$avatar['name']) {
        $_SESSION['signup'] = "stp ajouter une image";
    } else {
        //check if passwords don't match
        if ($createpassword !== $confirmepassword) {
            $_SESSION['signup'] = "les mots de passe ne correspondent pas ";
        } else {
            //hash password
            $hashed_password = password_hash($createpassword, PASSWORD_DEFAULT);
            //check if username or email already exest in database
            $user_check_query = "SELECT * FROM users WHERE nom_utilisateur='$nom_utilisateur' OR email='$email' ";
            $user_check_result = mysqli_query($connection, $user_check_query);
            if (mysqli_num_rows($user_check_result) > 0) {
                $_SESSION['signup'] = "le nom d'utilisateur ou l'email exixte deja.";
            } else {
                //work on avater
                //rename avatar
                $time = time(); //make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tem_name = $avatar['tmp_name'];
                $avatar_destination_path = 'images/' . $avatar_name;

                //make sure file is an image
                $allowed_files = ['png', 'jpg', 'jpeg'];
                $extention = explode('.', $avatar_name);
                $extention = end($extention);
                if (in_array($extention, $allowed_files)) {
                    //make sur image is not too large(1mb+)
                    if ($avatar['size'] < 1000000) {
                        //upload avatar
                        move_uploaded_file($avatar_tem_name, $avatar_destination_path);
                    } else {
                        $_SESSION['signup'] = "la taille de l'image est tres grande,elle doit etre moins de 1mb";
                    }
                } else {
                    $_SESSION['signup'] = "le ficher doit etre png,jpg ou jpeg";
                }
            }
        }
    }
    //redirect back to signup page if tehre was any problem
    if (isset($_SESSION['signup'])) {
        //pass form data back to signup page
        $_SESSION['signup-data'] = $_POST;
        header('location:' . ROOT_URL . 'signup.php');
        die();
    } else {
        //insert new user into users table
        $insert_user_query = "INSERT INTO users SET prenom='$prenom',nom='$nom',nom_utilisateur='$nom_utilisateur',email='$email',password='$hashed_password',avatar='$avatar_name',is_admin=0";
        $insert_user_result = mysqli_query($connection, $insert_user_query);
        if (!mysqli_error($connection)) {
            //redirect to login page with success page 
            $_SESSION['signup-success'] = "Inscription réussie. veuillez vous connecter";
            header('location:' . ROOT_URL . 'signin.php');
            die();
        }
    }
} else {
    //if button wasn't clicked ,bounce back to signup page
    header('location:' . ROOT_URL . 'signup.php');
    die();
}
