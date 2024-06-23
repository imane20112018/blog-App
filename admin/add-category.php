<?php
include 'partials/header.php';

// get back from data if invalid 
$titre = $_SESSION['add-category-data']['titre'] ?? null;
$description = $_SESSION['add-category-data']['description'] ?? null;

unset($_SESSION['add-category-data']);
?>


<section class="form__section">
    <div class="container form__section-container">
        <h2>Ajouter categorie</h2>
        <?php if (isset($_SESSION['add-category'])) : ?>
            <div class="alert__message error">
                <p>
                    <?= $_SESSION['add-category'];
                    unset($_SESSION['add-category'])
                    ?>
                </p>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-category-logic.php" method="POST">
            <input type="text" value="<?= $titre ?>" name="titre" "id="" placeholder=" Titre">
            <textarea name="description" id="" rows="4" placeholder="Description"><?= $description ?></textarea>
            <button type="submit" name="submit" class="btn">Ajouter la categorie</button>
        </form>
    </div>
</section>
<?php include '../partials/footer.php'; ?>