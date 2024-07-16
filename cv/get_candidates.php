<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "candidates_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM candidates";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["name"] . "</td>";
        echo "<td>" . $row["phone"] . "</td>";
        echo "<td>" . $row["job_type"] . "</td>";
        echo "<td><img src='" . $row["cv_path"] . "' alt='CV Image' class='img-thumbnail cv-image' style='width:100px; height:auto;'></td>";
        echo "<td>";
        echo "<button class='btn btn-warning btn-sm edit-btn' data-id='" . $row["id"] . "' data-name='" . $row["name"] . "' data-phone='" . $row["phone"] . "' data-job_type='" . $row["job_type"] . "'>Edit</button> ";
        echo "<button class='btn btn-danger btn-sm delete-btn' data-id='" . $row["id"] . "'>Delete</button>";
        echo "</td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
