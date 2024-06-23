<?php
require 'config/database.php';

if (isset($_POST['submit'])) {
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $titre = filter_var($_POST['titre'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $description = filter_var($_POST['description'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    //validate input
    if (!$titre || !$description) {
        $_SESSION['edit-category'] = "le formulaire est invalide dans la page de modification.";
    } else {
        $query  = "UPDATE categories SET titre='$titre',description='$description'WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);

        if (mysqli_errno($connection)) {
            $_SESSION['edit-category'] = "échec de Modification de la catégorie.";
        } else {
            $_SESSION['edit-category-success'] = "Catégorie $titre a été modifiée avec succès.";
        }
    }
}
header('location:' . ROOT_URL . 'admin/manage-categories.php');
die();
