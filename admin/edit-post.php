<?php
include 'partials/header.php';

//fetch categories from db 
$category_query = "SELECT * FROM categories";
$categories = mysqli_query($connection, $category_query);

//fetch post data from db if id is set 
if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT * FROM posts WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $post = mysqli_fetch_assoc($result);
} else {
    header(('location:' . ROOT_URL . 'admin/'));
    die();
}

?>
<section class="form__section">
    <div class="container form__section-container">
        <h2>Modifier le post</h2>
        <form action="<?= ROOT_URL ?>admin/edit-post-logic.php" enctype="multipart/form-data" method="POST">
            <input type="hidden" name="id" value="<?= $post['id'] ?>">
            <input type="hidden" name="previous_thumbnail_name" value="<?= $post['couverture'] ?>">
            <input type="text" name="title" value="<?= $post['titre'] ?>" placeholder="Titre">
            <select name="category" id="">
                <?php while ($category = mysqli_fetch_assoc($categories)) : ?>
                    <option value="<?= $category['id'] ?>"><?= $category['titre'] ?></option>
                <?php endwhile ?>
            </select>
            <textarea name="body" id="" rows="10" placeholder="Contenu"><?= $post['body'] ?></textarea>
            <div class="form__control inline">
                <input type="checkbox" name="is_featured" id="is_featured" value="1">
                <label for="is_featured">featured</label>
            </div>
            <div class="form__control">
                <label for="thumbnail">changer la couverture</label>
                <input type="file" name="thumbnail" id="thumbnail">
            </div>
            <button type="submit" name="submit" class="btn">Modifier le post</button>
        </form>
    </div>
</section>
<?php include '../partials/footer.php'; ?>