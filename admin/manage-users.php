<?php include 'partials/header.php'; ?>

<section class="dashboard">
    <div class="container dashboard__container">
        <button id="show__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-right-b"></i></button>
        <button id="hide__sidebar-btn" class="sidebar__toggle"><i class="uil uil-angle-left-b"></i></button>
        <aside>
            <ul>
                <li>
                    <a href="add-post.php"><i class="uil uil-pen"></i>
                        <h5>Ajouter Post</h5>
                    </a>
                </li>
                <li>
                    <a href="dashboard.php"><i class="uil uil-postcard"></i>
                        <h5>Gérer les Posts</h5>
                    </a>
                </li>
                <?php if (isset($_SESSION['user_is_admin'])) : ?>

                    <li>
                        <a href="add-user.php"><i class="uil uil-user-plus"></i>
                            <h5>Ajouter Utilisateur</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-users.php" class="active"><i class="uil uil-users-alt"></i>
                            <h5>Gérer les Utilisateurs</h5>
                        </a>
                    </li>
                    <li>
                        <a href="add-category.php"><i class="uil uil-edit"></i>
                            <h5>Ajouter Catégorie</h5>
                        </a>
                    </li>
                    <li>
                        <a href="manage-categories.php"><i class="uil uil-list-ul"></i>
                            <h5>Gérer les catégories</h5>
                        </a>
                    </li>
                <?php endif ?>
            </ul>
        </aside>
        <main>
            <h2>Gérer les Utilisateurs</h2>
            <table>
                <thead>
                    <tr>
                        <th>Prenom</th>
                        <th>Nom</th>
                        <th>Modifier</th>
                        <th>Supprimer</th>
                        <th>Admin</th>

                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Traverl</td>
                        <td>Traverl</td>
                        <td><a href="edit-user.php" class="btn sm">Modifier</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Supprimer</a></td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>Traverl</td>
                        <td>Traverl</td>
                        <td><a href="edit-user.php" class="btn sm">Modifier</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Supprimer</a></td>
                        <td>Oui</td>
                    </tr>
                    <tr>
                        <td>Traverl</td>
                        <td>Traverl</td>
                        <td><a href="edit-user.php" class="btn sm">Modifier</a></td>
                        <td><a href="delete-category.php" class="btn sm danger">Supprimer</a></td>
                        <td>Oui</td>
                    </tr>
                </tbody>
            </table>
        </main>
    </div>
</section>
<?php include '../partials/footer.php'; ?>