<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "adi_dharma";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['type']) && isset($_POST['id'])) {
        $type = $_POST['type'];
        $id = $_POST['id'];
        if ($type == 'edit_pelanggan') {
            $nama = $_POST['nama'];
            $alamat = $_POST['alamat'];
            $no_hp = $_POST['no_hp'];

            $sql = "UPDATE pelanggan SET nama='$nama', alamat='$alamat', no_hp='$no_hp' WHERE id_pelanggan=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully" ;
                header("Location: input.php");
                exit(); 
            } else {
                echo "Error updating record: " . $conn->error;
            }
        } elseif ($type == 'edit_project') {
            $nama_project = $_POST['nama_project'];
            $tgl_transaksi = $_POST['tgl_transaksi'];

            $sql = "UPDATE project SET nama_project='$nama_project', tgl_transaksi='$tgl_transaksi' WHERE id_project=$id";

            if ($conn->query($sql) === TRUE) {
                echo "Record updated successfully";
                header("Location: input.php");
                exit(); 
            } else {
                echo "Error updating record: " . $conn->error;
            }
        }
    } elseif ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['type']) && isset($_GET['id'])) {
        $type = $_GET['type'];
        $id = $_GET['id'];
        if ($type == 'delete_pelanggan') {
            $sql = "DELETE FROM pelanggan WHERE id_pelanggan=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
                header("Location: input.php");
                exit();
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        } elseif ($type == 'delete_project') {
            $sql = "DELETE FROM project WHERE id_project=$id";
            if ($conn->query($sql) === TRUE) {
                echo "Record deleted successfully";
                header("Location: input.php");
                exit();
            } else {
                echo "Error deleting record: " . $conn->error;
            }
        }
    }

    $conn->close();
?>
