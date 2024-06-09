<?php include 'partials/header.php'; ?>

    <body>
        <section class="form__section">
            <div class="conatiner form__section-container">
                <h2>Modifier le post</h2>
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
                        <input type="checkbox" id="is_featured"checked>
                        <label for="is_featured">featured</label>
                    </div>
                    <div class="form__control">
                        <label for="thumbnail">changer la couverture</label>
                        <input type="file" name="" id="thumbnail">
                    </div>
                    <button type="submit" class="btn">Modifier le post</button>
                </form>
            </div>
        </section>
        <?php include '../partials/footer.php'; ?>
