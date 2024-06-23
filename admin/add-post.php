<?php include 'partials/header.php';

//fetch categories from db
$query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $query);
//get back form data if form was invalid 
$title = $_SESSION['add-post-data']['titre'] ?? null;
$body = $_SESSION['add-post-data']['body'] ?? null;

//delete from data session
unset($_SESSION['add-post-data']);

?>

<section class="form__section">
    <div class="container form__section-container">
         <h2>Ajouter un post</h2>
        <?php if (isset($_SESSION['add-post'])) : ?>
            <div class="alert__message error">
                <?= $_SESSION['add-post'];
                unset($_SESSION['add-post']);
                ?>
            </div>
        <?php endif ?>
        <form action="<?= ROOT_URL ?>admin/add-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="text" name="title" value="<?= $title ?>" placeholder="Titre">
            <select name="category">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['titre'] ?></option>
                <?php endwhile ?>
            </select>
            <textarea name="body" id="" rows="10" placeholder="Contenu"><?= $body ?></textarea>
            <?php if (isset($_SESSION['user_is_admin'])) : ?>
                <div class="form__control inline">
                    <input type="checkbox" name="is_featured" value="1" id="is_featured" checked>
                    <label for="is_featured">featured</label>
                </div>
            <?php endif ?>
            <div class="form__control">
                <label for="thumbnail">Ajouter une couverture</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Ajouter le post</button>
        </form>
    </div>
</section>
<?php
include '../partials/footer.php';
?>