<?php
require 'config/database.php';
if (isset($_POST['submit'])) {
    $author_id = $_SESSION['user-id'];
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];


    //set is_featured to 0 if unchecked 
    $is_featured = $is_featured == 1 ?: 0;

    //validate form 
    if (!$title) {
        $_SESSION['add-post'] = "Entrer le titre du post";
    } elseif (!$category_id) {
        $_SESSION['add-post'] = "Entrer la categorie du post";
    } elseif (!$body) {
        $_SESSION['add-post'] = "Entrer le body du post";
    } elseif (!$thumbnail['name']) {
        $_SESSION['add-post'] = "choisissez la couverture su post";
    } else {
        //work on thumbnail 
        //rename the image 
        $time = time(); //make each image name unique
        $thumbnail_name = $time . $thumbnail['name'];
        $thumbnail_tmp_name = $thumbnail['tmp_name'];
        $thumbnail_destiantion_path = '../images/' . $thumbnail_name;

        //make sure file is an image 
        $allowed_files = ['png', 'jpg', 'jpeg'];
        $extention = explode('.', $thumbnail_name);
        $extention = end($extention);
        if (in_array($extention, $allowed_files)) {
            //make sure image is not too big  (2mb+)
            if ($thumbnail['size'] < 2_000_000) {
                move_uploaded_file($thumbnail_tmp_name, $thumbnail_destiantion_path);
            } else {
                $_SESSION['add-post'] = "le fichier est trop volumineux";
            }
        } else {
            $_SESSION['add-post'] =  "le fichier doit être en png ,jpg ou jpg";
        }
    }
    // redirect back (with form data) to add-post page if there is any problem
    if (isset($_SESSION['add-post'])) {
        $_SESSION['add-post-data'] = $_POST;
        header('location:' . ROOT_URL . 'admin/add-post.php');
        die();
    } else {
        //set is_featured of all posts to 0 if is_featured for this post is 1

        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }
        //insert post into database

        $query = "INSERT INTO `posts`(`titre`, `body`, `couverture`, `category_id`, `author_id`, `is_featured`) VALUES ('$title','$body','$thumbnail_name',$category_id, $author_id,$is_featured)";
        $result = mysqli_query($connection, $query);

        if (!mysqli_errno($connection)) {
            $_SESSION['add-post-success'] = "Nouveau post a été ajouté avec succès";
            header('location:' . ROOT_URL . 'admin/');
            die();
        }
    }
}
header('location:' . ROOT_URL . 'admin/add-post.php');
die();
