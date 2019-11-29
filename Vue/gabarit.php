<!DOCTYPE html>
<html lang="fr">
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
    <script src="https://kit.fontawesome.com/8ce6adae27.js" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="contenu/css/bootstrap.min.css">-->

    <!--script TinyMCE-->
    <script src="https://cdn.tiny.cloud/1/78mkrrxmcpeanii9qztublptgkaurxri8bz5npmreh11moog/tinymce/5/tinymce.min.js" ></script>
    <script>
        tinymce.init({
        selector: 'titre',
        selector: 'chapitres.tinymce',
        });
    </script>

    <!-- script
    ================================================== -->
    <script src="contenu/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.jpg" type="image/x-icon">

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

            <!-- end header__search -->

            <a class="header__toggle-menu" href="index.php" title="Menu"><span>Menu</span></a>
            <nav class="header__nav-wrap">

                <h2 class="header__nav-heading h6">Navigate to</h2>

                <ul class="header__nav">

                    <li class="current">
                        <a href="index.php" title="">Accueil</a>
                    </li>

                    <li>
                        <a href="index.php?action=chapitres">Chapitres</a>
                    </li>

                    <li>
                      <a href="index.php?action=contact">Contact</a>
                    </li>

                    <li>
                        <a href="index.php?action=connexion">Connexion</a>
                    </li>

                </ul> <!-- end header__nav -->

                <a href="#0" title="Close Menu" class="header__overlay-close close-mobile-menu">Close</a>

            </nav> <!-- end header__nav-wrap -->

        </header> <!-- s-header -->

    

        <?= $contenu; ?>


        <!-- s-footer
        ================================================== -->

        <footer class="s-footer">

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
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> Tout droit réservé | Ce thème  a été fait avec <i class="fa fa-heart" aria-hidden="true"></i> <br />par <a href="https://lea-leroy.com" target="_blank">Lea Leroy</a>
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
                <script src="https://cdn.tiny.cloud/1/78mkrrxmcpeanii9qztublptgkaurxri8bz5npmreh11moog/tinymce/5/tinymce.min.js"></script>

    </body>

</html>
