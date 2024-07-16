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
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $job_type = $_POST['job_type'];
    $cv_path = '';

    if (isset($_FILES['cv']) && $_FILES['cv']['name']) {
        $cv = $_FILES['cv']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["cv"]["name"]);
        
        if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
            $cv_path = ", cv_path='$target_file'";
        }
    }

    $sql = "UPDATE candidates SET name='$name', phone='$phone', job_type='$job_type' $cv_path WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error: " . $conn->error;
    }
}

$conn->close();
?>
