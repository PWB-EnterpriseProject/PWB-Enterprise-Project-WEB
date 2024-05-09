<?php
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

    // Query untuk menampilkan data pelanggan
    $sql_pelanggan = "SELECT * FROM pelanggan";
    $result_pelanggan = $conn->query($sql_pelanggan);

    // Query untuk menampilkan data proyek
    $sql_project = "SELECT * FROM project";
    $result_project = $conn->query($sql_project);

    // Menutup koneksi
    $conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--  
    Document Title
    =============================================
    -->
    <title>PT Adi Dharma</title>
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
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
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

    <section>
        <div class="pelanggan">
            <h2>Form Pelanggan</h2>
            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                <label for="nama">Nama Pelanggan:</label><br>
                <input type="text" id="nama" name="nama_pelanggan" required><br><br>
                
                <label for="alamat">Alamat Pelanggan:</label><br>
                <textarea id="alamat" name="alamat_pelanggan" required></textarea><br><br>
                
                <label for="no_hp">No. HP Pelanggan:</label><br>
                <input type="text" id="no_hp" name="no_hp_pelanggan" required><br><br>
                
                <hr>
                
                <label for="nama_project">Nama Project:</label><br>
                <input type="text" id="nama_project" name="nama_project" required><br><br>
                
                <label for="tgl_transaksi">Tanggal Transaksi:</label><br>
                <input type="text" id="tgl_transaksi" name="tgl_transaksi" class="datepicker" required><br><br>

                
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>

        <h2 id="nav-table">Data Pelanggan</h2>
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No. HP</th>
                <th id="aksi">Aksi</th>
            </tr>
            <?php
            if ($result_pelanggan->num_rows > 0) {
                while($row = $result_pelanggan->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_pelanggan'] . "</td>";
                    echo "<td>" . $row['nama'] . "</td>";
                    echo "<td>" . $row['alamat'] . "</td>";
                    echo "<td>" . $row['no_hp'] . "</td>";
                    echo "<td><a href='edit_pelanggan.php?type=edit_pelanggan&id=" . $row['id_pelanggan'] . "'>Edit</a> | <a href='edit-delete.php?type=delete_pelanggan&id=" . $row['id_pelanggan'] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Tidak ada data</td></tr>";
            }
            ?>
        </table>

        <h2 id="nav-table">Data Project</h2>
        <table border="1">
            <tr>
                <th>Id Project</th>
                <th>Nama Project</th>
                <th>Tanggal Transaksi</th>
                <th id="aksi">Aksi</th>
            </tr>
            <?php
            if ($result_project->num_rows > 0) {
                while($row = $result_project->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id_project'] . "</td>";
                    echo "<td>" . $row['nama_project'] . "</td>";
                    echo "<td>" . $row['tgl_transaksi'] . "</td>";
                    echo "<td><a href='edit_project.php?type=edit_project&id=" . $row['id_project'] . "'>Edit</a> | <a href='edit-delete.php?type=delete_project&id=" . $row['id_project'] . "'>Hapus</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>Tidak ada data</td></tr>";
            }
            ?>
        </table>


    </section>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

        // Mengambil data dari formulir
        $nama_pelanggan = $_POST['nama_pelanggan'];
        $alamat_pelanggan = $_POST['alamat_pelanggan'];
        $no_hp_pelanggan = $_POST['no_hp_pelanggan'];
        $nama_project = $_POST['nama_project'];
        $tgl_transaksi = $_POST['tgl_transaksi'];

        // Menyiapkan query SQL untuk pelanggan
        $sql_pelanggan = "INSERT INTO pelanggan (nama, alamat, no_hp) VALUES ('$nama_pelanggan', '$alamat_pelanggan', '$no_hp_pelanggan')";
        // Menyiapkan query SQL untuk project
        $sql_project = "INSERT INTO project (nama_project, tgl_transaksi) VALUES ('$nama_project', '$tgl_transaksi')";

        // Menjalankan query untuk pelanggan
        if ($conn->query($sql_pelanggan) === TRUE) {
            echo "Data pelanggan berhasil disimpan<br>";
        } else {
            echo "Error: " . $sql_pelanggan . "<br>" . $conn->error;
        }

        // Menjalankan query untuk project
        if ($conn->query($sql_project) === TRUE) {
            echo "Data project berhasil disimpan<br>";
        } else {
            echo "Error: " . $sql_project . "<br>" . $conn->error;
        }

        // Menutup koneksi
        $conn->close();

        // Redirect kembali ke halaman form
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }

    ?>

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
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
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
        $( function() {
            $( "#tgl_transaksi" ).datepicker({
                dateFormat: 'yy-mm-dd'
            });
        } );
    </script>

</body>
</html>