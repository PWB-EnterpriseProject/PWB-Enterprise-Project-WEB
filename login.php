<?php
$servername = "localhost";
$dbname = "adi_dharma";
$username = "root"; 
$password = ""; 

try {
    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        throw new Exception("Connection failed: " . $conn->connect_error);
    }

    // Process login
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Login success
            session_start();
            $_SESSION['username'] = $username;
            header("Location: index_admin.php");
            exit;
        } else {
            // Login failed
            echo "<script>alert('Login failed. Invalid username or password.');</script>";
        }
    }

    $conn->close();
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
}
?>
