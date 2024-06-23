<?php 
include 'partials/header.php';
//get back form data  if there was an error
$prenom= $_SESSION['add-user-data']['prenom']??null;
$nom= $_SESSION['add-user-data']['nom']??null;
$nom_utilisateur= $_SESSION['add-user-data']['nom_utilisateur']??null;
$email= $_SESSION['add-user-data']['email']??null;
$createpassword= $_SESSION['add-user-data']['createpassword']??null;
$confirmepassword= $_SESSION['add-user-data']['confirmepassword']??null;
$userrole= $_SESSION['add-user-data']['userrole']??null;
//delete session data 
unset($_SESSION['add-user-data']);
?>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Ajouter un Utilisateur</h2>
        <?php if (isset($_SESSION['add-user'])): ?>
            <div class="alert__message error">
            <p>
                <?= $_SESSION['add-user'];
                unset($_SESSION['add-user']);

                ?> 
            </p>
        </div>
        <?php  endif ?>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" value="<?= $prenom ?>" name="prenom" id="" placeholder="Prenom">
            <input type="text" value="<?= $nom ?>" name="nom" id="" placeholder="Nom">
            <input type="text" value="<?= $nom_utilisateur ?>" name="nom_utilisateur" id="" placeholder="Nom D'utilisateur">
            <input type="email" value="<?= $email ?>" name="email" id="" placeholder="Email">
            <input type="password" value="<?= $createpassword ?>" name="createpassword" id="" placeholder="Creer mot de passe">
            <input type="password" value="<?= $confirmepassword ?>" name="confirmepassword" id="" placeholder="confirmer mot de passe">
            <select name="userrole">
                <option value="0">Auteur</option>
                <option value="1">Admin</option>
            </select>
            <div class="form__control">
                <label for="avatar">Avatar de l'utilisateur</label>
                <input type="file" name="avatar" id="avatar">
            </div>
            <button type="submit" name="submit" class="btn">Ajouter Utilisateur</button>
        </form>
    </div>
</section>
<?php include '../partials/footer.php'; ?>