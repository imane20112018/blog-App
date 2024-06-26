<?php
include 'partials/header.php';


//fetch all posts from db 
$query = "SELECT * FROM posts ORDER BY date_time DESC";
$posts = mysqli_query($connection, $query);
?>

<section class="search__bar">
    <form class="container search__bar-container" action="<?= ROOT_URL ?>search.php" method="GET">
        <div>
            <i class="uil uil-search"></i>
            <input type="search" name="search" placeholder="Search">
        </div>
        <button type="submit" name="submit" class="btn">Go</button>
    </form>

</section>
<!-- ========================END OF SEARCH -->


<!-- ========================END OF fatured -->
<section class="posts <?= $featured ? '' : 'section__extra-margin' ?>">
    <div class="container posts__container">
        <?php while ($post = mysqli_fetch_assoc($posts)) : ?>
            <article class="post">
                <div class="post__thumbnail">
                    <img src="./images/<?= $post['couverture'] ?>">
                </div>
                <div class=" post__info">
                    <?php
                    //fetch category from categories table using category_id of post 
                    $categry_id = $post['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id = $categry_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                    <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $post['category_id'] ?>" class="category__button"><?= $category['titre'] ?></a>
                    <h3 class="post__title">
                        <a href="<?= ROOT_URL ?>post.php?id=<?= $post['id'] ?>"><?= $post['titre'] ?></a>
                    </h3>
                    <p class="post__body">
                        <?= substr($post['body'], 0, 150) ?>...
                    </p>
                    <div class="post__author">
                        <?php
                        //fetch author from users table using author_id of post 
                        $author_id = $post['author_id'];
                        $author_query = "SELECT * FROM users WHERE id = $author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);

                        ?>
                        <div class="post__author-avatar">
                            <img src="./images/<?= $author['avatar'] ?>">
                        </div>
                        <div class="post__author-info">
                            <h5>Par: <?= "{$author['prenom']} {$author['nom']}" ?></h5>
                            <small>
                                <?= date("M d, Y- H:i", strtotime($post['date_time'])) ?>
                            </small>
                        </div>
                    </div>
                </div>
            </article>
        <?php endwhile ?>
    </div>
    <!-- ========================END OF posts-->
    <div class="category__buttons">
        <div class="container category__buttons-container">
            <?php
            $all_categories_query = "SELECT * FROM categories";
            $all_categories_result = mysqli_query($connection, $all_categories_query);

            ?> <?php while ($category = mysqli_fetch_assoc($all_categories_result)) : ?>
                <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $category['id'] ?>" class="category__button"><?= $category['titre'] ?></a>
            <?php endwhile ?>
        </div>
    </div>
    <!---- ========================END OF categoreis -->
    <?php include 'partials/footer.php' ?>