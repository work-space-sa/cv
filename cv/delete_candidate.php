<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidates_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['id']) && is_numeric($_POST['id'])) {
        $id = intval($_POST['id']);
        $sql = "DELETE FROM candidates WHERE id='$id'";

        if ($conn->query($sql) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Invalid ID";
    }
}

$conn->close();
?>
