<?php include 'partials/header.php'; ?>

<body>
    <section class="form__section">
        <div class="conatiner form__section-container">
            <h2>Ajouter un post</h2>
            <div class="alert__message error">
                <p>C'est un message d'erreur</p>
            </div>
            <form action="" enctype="multipart/form-data">
                <input type="text" name="" id="" placeholder=Titre">
                <select name="" id="">
                    <option value="1">Travel</option>
                    <option value="2">Travel</option>
                    <option value="3">Travel</option>
                    <option value="4">Travel</option>
                    <option value="5">Travel</option>
                    <option value="6">Travel</option>
                </select>
                <textarea name="" id="" rows="10" placeholder="Contenu"> </textarea>
                <div class="form__control inline">
                    <input type="checkbox" id="is_featured" checked>
                    <label for="is_featured">featured</label>
                </div>
                <div class="form__control">
                    <label for="thumbnail">Ajouter une couverture</label>
                    <input type="file" name="" id="thumbnail">
                </div>
                <button type="submit" class="btn">Ajouter le post</button>
            </form>
        </div>
    </section>
    <?php include '../partials/footer.php'; ?>