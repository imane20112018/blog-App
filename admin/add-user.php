<?php include 'partials/header.php'; ?>
<section class="form__section">
    <div class="conatiner form__section-container">
        <h2>Ajouter un Utilisateur</h2>
        <div class="alert__message error">
            <p>C'est un message d'erreur</p>
        </div>
        <form action="<?= ROOT_URL ?>admin/add-user-logic.php" enctype="multipart/form-data" method="post">
            <input type="text" name="prenom" id="" placeholder="Prenom">
            <input type="text" name="nom" id="" placeholder="Nom">
            <input type="text" name="nom_utilisateur" id="" placeholder="Nom D'utilisateur">
            <input type="email" name="email" id="" placeholder="Email">
            <input type="password" name="createpassword" id="" placeholder="Creer mot de passe">
            <input type="password" name="confirmepassword" id="" placeholder="confirmer mot de passe">
            <select name="userrole" id="">
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