<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Alaska - Jean Forteroche</title>
    <meta name="description" content="Jean Forteroche écrit toute les semaines un nouveau chapitre de son nouveau livre événement">
    <meta name="author" content="Lea Leroy">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="contenu/css/base.css">
    <link rel="stylesheet" href="contenu/css/vendor.css">
    <link rel="stylesheet" href="contenu/css/main.css">

    <!-- script
    ================================================== -->
    <script src="contenu/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

    <body id="top">


        <!-- header
        ================================================== -->
        <header class="s-header header">

            <div class="header__logo">
                <a class="logo" href="index.php">
                    Jean Forteroche
                </a>
            </div> <!-- end header__logo -->

            <a class="header__search-trigger" href="#0"></a>
            <div class="header__search">

                <form role="search" method="get" class="header__search-form" action="#">
                    <label>
                        <span class="hide-content">Search for:</span>
                        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>

                <a href="#0" title="Close Search" class="header__overlay-close">Close</a>

            </div>  <!-- end header__search -->

            <a class="header__toggle-menu" href="#0" title="Menu"><span>Menu</span></a>
            <nav class="header__nav-wrap">

                <h2 class="header__nav-heading h6">Navigate to</h2>

                <ul class="header__nav">
                    <li class="current">
                      <a href="index.php" title="">Accueil</a>
                    </li>

                    <li>
                        <a href="Modele/chapitres.php" title="">Chapitres</a>
                    </li>

                    <li>
                        <a href="Auteur.php" title="">Jean Forteroche</a>
                    </li>

                    <li>
                      <a href="page-contact.php" title="">Contact</a>
                    </li>

                    <li>
                      <a href="Modele/connexion.php" title="">Accès</a>
                    </li>
                </ul> <!-- end header__nav -->

                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </header> <!-- s-header -->

    <body>

          <?= $contenu ?>


<!-- s-footer
================================================== -->
<footer class="s-footer">

    <div class="s-footer__main">
      <div class="row">


                  </div>
              </div> <!-- end s-footer__main -->

              <div class="s-footer__bottom">
                  <div class="row">

                      <div class="col-six">
                          <ul class="footer-social">
                              <li>
                                  <a href="#0"><i class="fab fa-facebook"></i></a>
                              </li>
                              <li>
                                  <a href="#0"><i class="fab fa-twitter"></i></a>
                              </li>
                              <li>
                                  <a href="#0"><i class="fab fa-instagram"></i></a>
                              </li>
                              <li>
                                  <a href="#0"><i class="fab fa-youtube"></i></a>
                              </li>
                              <li>
                                  <a href="#0"><i class="fab fa-pinterest"></i></a>
                              </li>
                          </ul>
                      </div>

                      <div class="col-six">
                          <div class="s-footer__copyright">
                              <span><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          </span>
                          </div>
                      </div>

                  </div>
              </div> <!-- end s-footer__bottom -->

              <div class="go-top">
                  <a class="smoothscroll" title="Back to Top" href="#top"></a>
              </div>

          </footer> <!-- end s-footer -->


          <!-- Java Script
          ================================================== -->
          <script src="contenu/js/jquery-3.2.1.min.js"></script>
          <script src="contenu/js/plugins.js"></script>
          <script src="contenu/js/main.js"></script>

          </body>

          </html>
