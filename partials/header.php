<?php
require 'config/database.php';

//fetch current tuser from db 
if (isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id =$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc($result);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/css/style.css">
    <!-- ICONSOUT -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONT (MONTSERRAT) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="index.php" class="nav__logo">My Blog Website</a>
            <ul class="nav__items">
                <li> <a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li> <a href="<?= ROOT_URL ?>about.php">A propos</a></li>
                <li> <a href="<?= ROOT_URL ?>services.php">Services</a></li>
                <li> <a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                <?php if (isset($_SESSION['user-id'])) : ?>
                    <li class="nav__profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>admin/index.php">Tableau de bord </a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Se deconnecter</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li> <a href="<?= ROOT_URL ?>signin.php">Se connecter</a></li>
                <?php endif ?>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!-- ========================END OF NAV -->