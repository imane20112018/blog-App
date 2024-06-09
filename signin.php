<?php
require 'config/constants.php';

$username_email = $_SESSION['signin-data']['usename_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="./css/style.css">
    <!-- ICONSOUT -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONT (MONTSERRAT) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <section class="form__section">
        <div class="conatiner form__section-container">
            <h2>Se connecter</h2>
            <?php if (isset($_SESSION['signup-success'])) : ?>
                <div class="alert__message success">
                    <p>
                        <?= $_SESSION['signup-success'];
                        unset($_SESSION['signup-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['signin'])) : ?>
                <div class="alert__message error">
                    <p>
                        <?= $_SESSION['signin'];
                        unset($_SESSION['signin']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
                <input type="text" name="username_email" value="<?= $username_email ?>" id="" placeholder="Nom d'utilisateur ou Email">
                <input type="password" name="password" id="" value="<?= $password ?>" placeholder="Mot de passe">
                <button type="submit" name="submit" class="btn">Se connecter</button>
                <small>
                    Vous avez pas un compte? <a href="signup.php">S'inscrire</a>
                </small>
            </form>
        </div>
    </section>
</body>

</html>