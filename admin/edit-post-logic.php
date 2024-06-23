<?php
require 'config/database.php';

// Make sure edit post button was clicked
if (isset($_POST['submit'])) {
    // Get updated form data 
    $id = filter_var($_POST['id'], FILTER_SANITIZE_NUMBER_INT);
    $previous_thumbnail_name = filter_var($_POST['previous_thumbnail_name'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $title = filter_var($_POST['title'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $body = filter_var($_POST['body'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
    $category_id = filter_var($_POST['category'], FILTER_SANITIZE_NUMBER_INT);
    $is_featured = filter_var($_POST['is_featured'], FILTER_SANITIZE_NUMBER_INT);
    $thumbnail = $_FILES['thumbnail'];

    // Set is_featured to 0 if it was unchecked 
    $is_featured = $is_featured == 1 ?: 0;

    // Validate form 
    if (!$title) {
        $_SESSION['edit-post'] = "Impossible de modifier le titre du post";
    } elseif (!$category_id) {
        $_SESSION['edit-post'] = "Impossible de modifier la catégorie du post";
    } elseif (!$body) {
        $_SESSION['edit-post'] = "Impossible de modifier le contenu du post";
    } else {
        // Delete existing thumbnail if new thumbnail is available
        if ($thumbnail['name']) {
            $previous_thumbnail_path = '../images/' . $previous_thumbnail_name;
            if (file_exists($previous_thumbnail_path)) {
                unlink($previous_thumbnail_path);
            }
            // Work on new thumbnail 
            // Rename the image 
            $time = time(); // Make each image name unique
            $thumbnail_name = $time . '_' . $thumbnail['name'];
            $thumbnail_tmp_name = $thumbnail['tmp_name'];
            $thumbnail_destination_path = '../images/' . $thumbnail_name;

            // Make sure file is an image 
            $allowed_files = ['png', 'jpg', 'jpeg'];
            $extension = explode('.', $thumbnail_name);
            $extension = end($extension);
            if (in_array($extension, $allowed_files)) {
                // Make sure image is not too big (2MB+)
                if ($thumbnail['size'] < 2000000) {
                    // Upload thumbnail
                    move_uploaded_file($thumbnail_tmp_name, $thumbnail_destination_path);
                } else {
                    $_SESSION['edit-post'] = "Le fichier est trop volumineux";
                }
            } else {
                $_SESSION['edit-post'] = "Le fichier doit être en format png, jpg ou jpeg";
            }
        }
    }

    if (isset($_SESSION['edit-post'])) {
        // Redirect to manage form if form was invalid
        header('Location: ' . ROOT_URL . 'admin/');
        die();
    } else {
        // Set is_featured of all posts to 0 if is_featured for this post is 1
        if ($is_featured == 1) {
            $zero_all_is_featured_query = "UPDATE posts SET is_featured=0";
            $zero_all_is_featured_result = mysqli_query($connection, $zero_all_is_featured_query);
        }

        // Set thumbnail name if a new one was uploaded, else keep the previous one
        $thumbnail_to_insert = $thumbnail_name ?? $previous_thumbnail_name;

        // Update the post
        $query = "UPDATE posts SET titre='$title', body='$body', couverture='$thumbnail_to_insert', category_id=$category_id, is_featured=$is_featured WHERE id=$id LIMIT 1";
        $result = mysqli_query($connection, $query);
    }
    if (!mysqli_errno($connection)) {
        $_SESSION['edit-post-success'] = "Le post a été modifié avec succès";
    }
}
header('Location: ' . ROOT_URL . 'admin/');
die();
