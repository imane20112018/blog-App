<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Website</title>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="style.css">
    <!-- ICONSOUT -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <!-- GOOGLE FONT (MONTSERRAT) -->
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">
</head>

<body>
    <nav>
        <div class="container nav__container">
            <a href="index.html" class="nav__logo">My Blog Website</a>
            <ul class="nav__items">
                <li> <a href="blog.html">Blog</a></li>
                <li> <a href="about.html">A propos</a></li>
                <li> <a href="services.html">Services</a></li>
                <li> <a href="contact.html">Contact</a></li>
                <!-- <li> <a href="signin.html">Se connecter</a></li> -->
                <li class="nav__profile">
                    <div class="avatar">
                        <img src="./images/avatar1.webp" alt="">
                    </div>
                    <ul>
                        <li><a href="dashboard.html">Tableau de bord </a></li>
                        <li><a href="logout.html">Se deconnecter</a></li>
                    </ul>
                </li>
            </ul>
            <button id="open__nav-btn"><i class="uil uil-bars"></i></button>
            <button id="close__nav-btn"><i class="uil uil-multiply"></i></button>
        </div>
    </nav>
    <!-- ========================END OF NAV -->

    <section class="singlepost">
        <div class="container singlepost__container">
            <h2>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quisquam, maxime.</h2>
            <div class="post__author">
                <div class="post__author-avatar">
                    <img src="./images/avatar2.webp" alt="">
                </div>
                <div class="post__author-info">
                    <h5>Par:Imane eddouni</h5>
                    <small>Juin 2, 2024 - 18:54</small>
                </div>
            </div>
            <div class="singlepost__thumbnail">
                <img src="./images/blog3.webp" alt="">
            </div>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam nostrum consequuntur repudiandae vel vitae? Harum ipsam consequuntur maxime aut expedita dignissimos possimus molestiae! Repellendus modi obcaecati dolore perspiciatis veniam nulla? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam nostrum consequuntur repudiandae vel vitae? Harum ipsam consequuntur maxime aut expedita dignissimos possimus molestiae! Repellendus modi obcaecati dolore perspiciatis veniam nulla?</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam nostrum consequuntur repudiandae vel vitae? Harum ipsam consequuntur maxime aut expedita dignissimos possimus molestiae! Repellendus modi obcaecati dolore perspiciatis veniam nulla? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam nostrum consequuntur repudiandae vel vitae? Harum ipsam consequuntur maxime aut expedita dignissimos possimus molestiae! Repellendus modi obcaecati dolore perspiciatis veniam nulla?</p>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam nostrum consequuntur repudiandae vel vitae? Harum ipsam consequuntur maxime aut expedita dignissimos possimus molestiae! Repellendus modi obcaecati dolore perspiciatis veniam nulla? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam nostrum consequuntur repudiandae vel vitae? Harum ipsam consequuntur maxime aut expedita dignissimos possimus molestiae! Repellendus modi obcaecati dolore perspiciatis veniam nulla?</p>
        </div>
    </section>
    <!---- ========================END of single post -->
    <footer>
        <div class="footer__socials">
            <a href="https://youtube.com"><i class="uil uil-youtube"></i></a>
            <a href="https://facebook.com"><i class="uil uil-facebook"></i></a>
            <a href="https://instagram.com"><i class="uil uil-instagram"></i></a>
            <a href="https://twitter.com"><i class="uil uil-twitter"></i></a>
            <a href="https://linkedin.com"><i class="uil uil-linkedin"></i></a>
        </div>
        <div class="container footer__container">
            <article>
                <h4>Categories</h4>
                <ul>
                    <li><a href="">ART</a></li>
                    <li><a href="">ART</a></li>
                    <li><a href="">ART</a></li>
                    <li><a href="">ART</a></li>
                    <li><a href="">ART</a></li>
                    <li><a href="">ART</a></li>

                </ul>
            </article>
            <article>
                <h4>Support</h4>
                <ul>
                    <li><a href="">Support Online</a></li>
                    <li><a href="">Numeros</a></li>
                    <li><a href="">Email</a></li>
                    <li><a href="">Localisation</a></li>
                </ul>
            </article>
            <article>
                <h4>Permaliens</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">A propos</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
            <article>
                <h4>Permaliens</h4>
                <ul>
                    <li><a href="">Home</a></li>
                    <li><a href="">Blog</a></li>
                    <li><a href="">A propos</a></li>
                    <li><a href="">Services</a></li>
                    <li><a href="">Contact</a></li>
                </ul>
            </article>
        </div>
        <div class="footer__copyright">
            <small>Copiright &copy; Eddouni Imane</small>
        </div>
    </footer>
    <script src="main.js"></script>
</body>

</html>