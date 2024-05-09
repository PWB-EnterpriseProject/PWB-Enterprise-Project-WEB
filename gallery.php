<?php
require 'config/config.php' ;

$sql = 'SELECT * FROM gallery';
$result = mysqli_query($conn,$sql);

// Penanganan error jika query gagal
if (!$result) {
    die('Error fetching gallery data: ' . mysqli_error($conn));
}
?>
?>

<!DOCTYPE html>
<html lang="en-US" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>Website PT Adi Dharma</title>
    <!--  
    Favicons
    =============================================
    -->
    <link rel="apple-touch-icon" sizes="57x57" href="assets/images/favicons/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="assets/images/favicons/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="assets/images/favicons/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="assets/images/favicons/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="assets/images/favicons/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="assets/images/favicons/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="assets/images/favicons/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="assets/images/favicons/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="assets/images/favicons/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="assets/images/favicons/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="assets/images/favicons/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="assets/images/favicons/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicons/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="assets/images/favicons/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--  
    Stylesheets
    =============================================
    
    -->
    <!-- Default stylesheets-->
    <link href="assets/lib/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Template specific stylesheets-->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Volkhov:400i" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800" rel="stylesheet">
    <link href="assets/lib/animate.css/animate.css" rel="stylesheet">
    <link href="assets/lib/components-font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="assets/lib/et-line-font/et-line-font.css" rel="stylesheet">
    <link href="assets/lib/flexslider/flexslider.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="assets/lib/owl.carousel/dist/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="assets/lib/magnific-popup/dist/magnific-popup.css" rel="stylesheet">
    <link href="assets/lib/simple-text-rotator/simpletextrotator.css" rel="stylesheet">
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">
  </head>
  <body data-spy="scroll" data-target=".onpage-navigation" data-offset="60">
    <main>
      <div class="page-loader">
        <div class="loader">Loading...</div>
      </div>
      <nav class="navbar navbar-custom navbar-fixed-top bg-dark" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand pt-0" href="index.php">
                    <img src="assets/images/logo_nav.png" />
                </a>
            </div>
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index.php">Home</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" href="#about" data-toggle="dropdown">About Us</a>
                        <ul class="dropdown-menu">
                            <li><a href="about.html">Profile</a></li>
                            <li><a href="team.html">Our Team</a></li>
                        </ul>
                    </li>
                    <li><a href="project.html">Our Projects</a></li>
                    <li class="dropdown"><a class="dropdown-toggle" href="#" data-toggle="dropdown">Documentation</a>
                        <ul class="dropdown-menu">
                            <li><a href="akad.html">Tanda Tangan Akad</a></li>
                            <li><a href="gallery.php">Gallery</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact Us</a></li>
                    <li><a href="login_admin.html">Login</a></li>
                </ul>
            </div>
        </div>
    </nav>

      <?php
      $query = "SELECT * FROM gallery";
      $result = mysqli_query($conn,$query);
      ?>
    <div class="main">
    <!-- Gallery -->
    <div class="row">
        <?php while ($row = mysqli_fetch_assoc($result)) : ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <img
                    src = "assets/images/<?=$row['image'];?>" class="w-100 shadow-1-strong rounded mb-4 py-4">
                    <br>

                    <!-- class="w-100 shadow-1-strong rounded mb-4 py-4"
                    alt="Boat on Calm Water"
                /> -->
            </div>
        <?php endwhile; ?>
    </div>
    <!-- Gallery -->

    <!-- footer -->
    <div class="module-small bg-dark" id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Contact Us</h5>
                            <p>"Jangan ragu untuk menghubungi kami jika Anda memiliki pertanyaan, masukan, atau kebutuhan bantuan. Kami siap membantu dengan senang hati."</p>
                            <p>Phone: <a href="https://wa.me/+6285172350542">0851-7235-0542</a></p>
                            <p>Email: <a href="mailto:bukitalampermai2000@gmail.com">bukitalampermai2000@gmail.com</a></p>
                            <!-- <div class="footer-social-links">
                                <a href="#" style="margin-right: 10px;"><i class="fa fa-facebook"></i></a>
                                <a href="#" style="margin-right: 10px;"><i class="fa fa-twitter"></i></a>
                                <a href="#" style="margin-right: 10px;"><i class="fa fa-dribbble"></i></a>
                                <a href="#" style="margin-right: 0;"><i class="fa fa-skype"></i></a>
                            </div> -->
                            
                        </div>
                    </div>
                    <div class="col-sm-3">
                        <div class="widget">
                            <h5 class="widget-title font-alt">Our Team</h5>
                            <ul class="icon-list">
                                <li>Epraim Siregar <a href="#">Direktur</a></li>
                                <li>Irzan Hidayat <a href="#">Komisaris</a></li>
                                <li>Powel H P Simatupang <a href="#">General Manager</a></li>
                                <li>Martin Kobaldi <a href="#">Manager Keu. & HRD</a></li>
                                <li>Jhon Salomon <a href="#">Manager Produksi</a></li>
                                <li>Herry Rifai <a href="#">Manager Umum</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="widget text-center">
                            <img src="assets/images/logo_foot.png" alt="Company Logo" style="width: 50%; height: auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr class="divider-d">
        <footer class="footer bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <!-- Footer social links removed from here -->
                    </div>
                </div>
            </div>
        </footer>
        </div>
      <div class="scroll-up"><a href="#totop"><i class="fa fa-angle-double-up"></i></a></div>
    </main>
    <!--  
    JavaScripts
    =============================================
    -->
    <script src="assets/lib/jquery/dist/jquery.js"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="assets/lib/wow/dist/wow.js"></script>
    <script src="assets/lib/jquery.mb.ytplayer/dist/jquery.mb.YTPlayer.js"></script>
    <script src="assets/lib/isotope/dist/isotope.pkgd.js"></script>
    <script src="assets/lib/imagesloaded/imagesloaded.pkgd.js"></script>
    <script src="assets/lib/flexslider/jquery.flexslider.js"></script>
    <script src="assets/lib/owl.carousel/dist/owl.carousel.min.js"></script>
    <script src="assets/lib/smoothscroll.js"></script>
    <script src="assets/lib/magnific-popup/dist/jquery.magnific-popup.js"></script>
    <script src="assets/lib/simple-text-rotator/jquery.simple-text-rotator.min.js"></script>
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>