 <?php
    include 'partials/header.php';
    //fetch featured posts from db 
    $featured_query  = "SELECT * FROM posts WHERE is_featured =1";
    $featured_result = mysqli_query($connection, $featured_query);
    $featured = mysqli_fetch_assoc($featured_result);

    //fetch 9 posts from db 
    $query = "SELECT * FROM posts ORDER BY date_time DESC LIMIT 9";
    $posts = mysqli_query($connection, $query);
    ?>


 <!-- show featured post if there is only one post in db -->
 <?php if (mysqli_num_rows($featured_result) == 1) : ?>
     <section class="featured">
         <div class="container featured__container">
             <div class="post__thumbnail">
                 <img src="./images/<?= $featured['couverture'] ?>">
             </div>
             <div class="post__info">
                 <?php
                    //fetch category from categories table using category_id of post 
                    $categry_id = $featured['category_id'];
                    $category_query = "SELECT * FROM categories WHERE id = $categry_id";
                    $category_result = mysqli_query($connection, $category_query);
                    $category = mysqli_fetch_assoc($category_result);
                    ?>
                 <a href="<?= ROOT_URL ?>category-posts.php?id=<?= $featured['category_id'] ?>" class="category__button"><?= $category['titre'] ?></a>
                 <h2 class="post__title"><a href="<?= ROOT_URL ?>post.php?id=<?= $featured['id'] ?>"><?= $featured['titre'] ?></a></h2>
                 <p class="post__body">
                     <?= substr($featured['body'], 0, 300) ?>...
                 </p>
                 <div class="post__author">
                     <?php
                        //fetch author from users table using author_id of post 
                        $author_id = $featured['author_id'];
                        $author_query = "SELECT * FROM users WHERE id = $author_id";
                        $author_result = mysqli_query($connection, $author_query);
                        $author = mysqli_fetch_assoc($author_result);

                        ?>
                     <div class="post__author-avatar">
                         <img src="./images/<?= $author['avatar'] ?>">
                     </div>
                     <div class="post__author-info">
                         <h5>Par: <?= "{$author['prenom']} {$author['nom']}" ?></h5>
                         <small><?= date("M d, Y- H:i", strtotime($featured['date_time'])) ?></small>
                     </div>
                 </div>
             </div>
         </div>
     </section>
 <?php endif ?>
 <!-- ========================END OF featured -->
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
 </section>
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