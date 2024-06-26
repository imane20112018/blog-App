<?php include 'partials/header.php';

if (isset($_GET['id'])) {
    $id = filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT);

    //fetch category from db 
    $query = "SELECT * FROM categories WHERE id=$id";
    $result = mysqli_query($connection, $query);
    if (mysqli_num_rows($result) == 1) {
        $category = mysqli_fetch_assoc($result);
    }
} else {
    header('location:' . ROOT_URL . 'admin/manage-categories.php');
    die();
}


?>

<section class="form__section">
    <div class="container form__section-container">
        <h2>Modifier categorie</h2>
        <form action="<?= ROOT_URL?>admin/edit-category-logic.php" method="POST">
        <input type="hidden" value="<?= $category['id']?>" name="id">
        <input type="text" value="<?= $category['titre']?>" name="titre" id="" placeholder=Titre">
            <textarea name="description" id="" rows="4" placeholder="Description"><?= $category['description'] ?></textarea>
            <button type="submit" name="submit" class="btn">Modifier la categorie</button>
        </form>
    </div>
</section>
<?php include '../partials/footer.php'; ?>