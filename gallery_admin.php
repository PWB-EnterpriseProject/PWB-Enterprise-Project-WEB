<?php
require 'config/config.php';

$upload_success = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_FILES["image"]) && $_FILES["image"]["error"] == 0) {
        // Proses upload gambar
        $targetDir = "assets/images/";
        $targetName = basename($_FILES["image"]["name"]);
        $targetFile = $targetDir . $targetName;

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "adi_dharma";

        // Membuat koneksi
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Memeriksa koneksi
        if ($conn->connect_error) {
            die("Koneksi gagal: " . $conn->connect_error);
        }

        $sql_gallery = "INSERT INTO gallery VALUES ('', '$targetName');";

        if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile) && $conn->query($sql_gallery)) {
            // Tampilkan toast
            echo "<script>alert(Gambar berhasil ditambahkan);</script>";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "No file uploaded or an error occurred while uploading.";
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["delete_image"])) {
        $image_id = $_POST["delete_image"];
        // Hapus gambar dari database
        $sql_delete = "DELETE FROM gallery WHERE id = $image_id";
        if ($conn->query($sql_delete) === TRUE) {
            echo 'success';
            exit();
        } else {
            echo 'error';
            exit();
        }
    }
}


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

      <!-- navbar -->
      <nav class="navbar navbar-custom navbar-fixed-top bg-dark" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#custom-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand pt-0" style="width: fit-content;" href="index_admin.php">
                    <img src="assets/images/logo_nav.png">
                </a>
            </div>
            <div class="collapse navbar-collapse" id="custom-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="index_admin.php">Home</a></li>
                    <li><a href="gallery_admin.php">Gallery</a></li>
                    <li><a href="input.php">Form</a></li>
                    <li><a href="logout.php">Logout</a></li>
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
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" class="delete-form">
                <input type="hidden" name="delete_image" value="<?=$row['id'];?>">
                <button type="submit" class="btn btn-danger btn-sm delete-btn">Delete</button>
        </form>
                <br>
            </div>
        <?php endwhile; ?>
    </div>
    <!-- Gallery -->

    <!-- Form untuk input galeri -->
    <div class="module-small bg-dark" id="admin-gallery">
    <div class="container" style="justify-content: center;">
        <div class="row">
            <div class="col-sm-6">
                <div class="widget">
                    <h5 class="widget-title font-alt">Admin Gallery Input</h5>
                    <!-- Form untuk upload gambar -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="image">Select image to upload:</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>
                        <button type="submit" class="btn btn-primary">Upload Image</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>



    
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

    <script>
        $(document).ready(function() {
            $('.delete-form').submit(function(e) {
                e.preventDefault();
                var form = $(this);

                if (confirm("Are you sure you want to delete this image?")) {
                    var formData = form.serialize();

                    $.ajax({
                        type: 'POST',
                        url: form.attr('action'),
                        data: formData,
                        success: function(response) {
                            if (response == 'success') {
                                form.closest('.col-lg-4').remove();
                                // Tampilkan toast atau pesan sukses di sini jika diperlukan
                                location.reload(); // Refresh halaman
                            } else {
                                // Tampilkan pesan error di sini jika diperlukan
                            }
                        }
                    });
                }
            });
        });
    </script>




  </body>
</html>
