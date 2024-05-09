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

    // Ambil data project berdasarkan ID
    $sql_edit_project = "SELECT * FROM project WHERE id_project=" . $_GET['id'];
    $result_edit_project = $conn->query($sql_edit_project);
    $row_edit_project = $result_edit_project->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- Tautan ke jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Tautan ke jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"></script>
    <!-- Main stylesheet and color file-->
    <link href="assets/css/style.css" rel="stylesheet">
    <link id="color-scheme" href="assets/css/colors/default.css" rel="stylesheet">

</head>
<body>
    <div class="project">
        <h2>Edit Data Project</h2>
        <form action="edit-delete.php" method="POST">
            <input type="hidden" name="type" value="edit_project">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <label for="nama_project">Nama Project:</label><br>
            <input type="text" id="nama_project" name="nama_project" value="<?php echo $row_edit_project['nama_project']; ?>" required><br><br>

            <label for="tgl_transaksi">Tanggal Transaksi:</label><br>
            <input type="text" id="tgl_transaksi" name="tgl_transaksi" class="datepicker" value="<?php echo $row_edit_project['tgl_transaksi']; ?>" required><br><br>

            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>
</body>
</html>



<script>
    $(document).ready(function() {
        $( "#tgl_transaksi" ).datepicker({
            dateFormat: 'yy-mm-dd'
        });
    });
</script>


