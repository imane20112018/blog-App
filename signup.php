<?php
require 'config/constants.php';
//get back form data if there was a registration error
$prenom = $_SESSION['signup-data']['prenom'] ?? null;
$nom = $_SESSION['signup-data']['nom'] ?? null;
$nom_utilisateur = $_SESSION['signup-data']['nom_utilisateur'] ?? null;
$email = $_SESSION['signup-data']['email'] ?? null;
$createpassword = $_SESSION['signup-data']['createpassword'] ?? null;
$confirmepassword = $_SESSION['signup-data']['confirmepassword'] ?? null;
//delete session
unset($_SESSION['signup-data']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <!-- ICONSOUT -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONT (MONTSERRAT) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</head>

<body>
    <section class="form__section">
        <div class="conatiner form__section-container">
            <h2>S'inscrire</h2>
            <?php if (isset($_SESSION['signup'])) : ?>
                <div class="alert__message success">
                    <p>
                        <?= $_SESSION['signup'];
                        unset($_SESSION['signup']);
                        ?>
                    </p>

                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signup-logic.php" enctype="multipart/form-data" method="POST">
                <input type=" text" name="prenom" id="" value="<?= $prenom ?>" placeholder="Prenom">
                <input type="text" name="nom" id="" value="<?= $nom ?>" placeholder="Nom">
                <input type="text" name="nom_utilisateur" id="" value="<?= $nom_utilisateur ?>" placeholder="Nom D'utilisateur">
                <input type="email" name="email" id="" value="<?= $email ?>" placeholder="Email">
                <input type="password" name="createpassword" id="" value="<?= $createpassword ?>" placeholder="Creer mot de passe">
                <input type="password" name="confirmepassword" id="" value="<?= $confirmepassword ?>" placeholder="confirmer mot de passe">
                <div class="form__control">
                    <label for="avatar">Avatar de l'utilisateur</label>
                    <input type="file" id="avatar" name="avatar">
                </div>
                <button type="submit" name="submit" class="btn">S'inscrire</button>
                <small>
                    Vous avez déjà un compte? <a href="signin.php">Se connecter</a>
                </small>
            </form>
        </div>
    </section>
</body>

</html>