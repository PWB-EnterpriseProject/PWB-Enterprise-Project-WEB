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

    // Ambil data pelanggan berdasarkan ID
    $sql_edit = "SELECT * FROM pelanggan WHERE id_pelanggan=" . $_GET['id'];
    $result_edit = $conn->query($sql_edit);
    $row_edit = $result_edit->fetch_assoc();
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
    <div class="edit_pelanggan">
        <h2>Edit Data Pelanggan</h2>
        <form action="edit-delete.php" method="POST">
            <input type="hidden" name="type" value="edit_pelanggan">
            <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>">
            <label for="nama">Nama Pelanggan:</label><br>
            <input type="text" id="nama" name="nama" value="<?php echo $row_edit['nama']; ?>" required><br><br>

            <label for="alamat">Alamat Pelanggan:</label><br>
            <textarea id="alamat" name="alamat" required><?php echo $row_edit['alamat']; ?></textarea><br><br>

            <label for="no_hp">No. HP Pelanggan:</label><br>
            <input type="text" id="no_hp" name="no_hp" value="<?php echo $row_edit['no_hp']; ?>" required><br><br>

            <input type="submit" name="submit" value="Simpan">
        </form>
    </div>

</body>
</html>