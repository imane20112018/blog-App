<?php
require 'config/database.php';
//get  from data if submit button was clicked
if (isset($_POST['submit'])) {
    $prenom = filter_var($_POST['prenom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom = filter_var($_POST['nom'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $nom_utilisateur = filter_var($_POST['nom_utilisateur'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    $createpassword = filter_var($_POST['createpassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $confirmepassword = filter_var($_POST['confirmepassword'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $is_admin = filter_var($_POST['userrole'], FILTER_SANITIZE_NUMBER_INT);
    $avatar = $_FILES['avatar'];

    //validte input values
    if (!$prenom) {
        $_SESSION['add-user'] = "stp entrer ton prenom";
    } elseif (!$nom) {
        $_SESSION['add-user'] = "stp entrer ton nom";
    } elseif (!$nom_utilisateur) {
        $_SESSION['add-user'] = "stp entrer ton Nom d'Utilisateur";
    } elseif (!$email) {
        $_SESSION['add-user'] = "stp entrer un Email valide";
    } elseif (strlen($createpassword) < 8 || strlen($confirmepassword) < 8) {
        $_SESSION['add-user'] = "le mot de passe doit comprendre au moins 8 caractères ";
    } elseif (!$avatar['name']) {
        $_SESSION['add-user'] = "stp ajouter une image";
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
                $_SESSION['add-user'] = "le nom d'utilisateur ou l'email exixte deja.";
            } else {
                //work on avater
                //rename avatar
                $time = time(); //make each image name unique using current timestamp
                $avatar_name = $time . $avatar['name'];
                $avatar_tem_name = $avatar['tmp_name'];
                $avatar_destination_path = '../images/' . $avatar_name;

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
                        $_SESSION['add-user'] = "la taille de l'image est tres grande,elle doit etre moins de 1mb";
                    }
                } else {
                    $_SESSION['add-user'] = "le ficher doit etre png,jpg ou jpeg";
                }
            }
        }
    }
    //redirect back to signup page if tehre was any problem
    if (isset($_SESSION['add-user'])) {
        //pass form data back to signup page
        $_SESSION['add-user-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-user.php');
        die();
    } else {
        //insert new user into users table
        $insert_user_query = "INSERT INTO users SET prenom='$prenom',nom='$nom',nom_utilisateur='$nom_utilisateur',email='$email',password='$hashed_password',avatar='$avatar_name',is_admin=$is_admin";
        $insert_user_result = mysqli_query($connection, $insert_user_query);
        if (!mysqli_error($connection)) {
            //redirect to login page with success page 
            $_SESSION['add-user-success'] = "Nouveau utilisateur $prenom $nom est ajouté avec success.";
            header('location:' . ROOT_URL . 'admin/manage-users.php');
            die();
        }
    }
} else {
    //if button wasn't clicked ,bounce back to signup page
    header('location:' . ROOT_URL . 'admin/add-user.php');
    die();
}
