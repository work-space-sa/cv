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
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $job_type = $_POST['job_type'];
    $cv = $_FILES['cv']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["cv"]["name"]);

    if (move_uploaded_file($_FILES["cv"]["tmp_name"], $target_file)) {
        $sql = "INSERT INTO candidates (name, phone, job_type, cv_path) VALUES ('$name', '$phone', '$job_type', '$target_file')";
        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}

$conn->close();
?>
