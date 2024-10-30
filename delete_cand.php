<?php

if(isset($_GET['id'])) {
    $candidature_id = $_GET['id'];

    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "dbjob";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "DELETE FROM candidature WHERE id = $candidature_id";

    if ($conn->query($sql) === TRUE) {
        echo "Candidature deleted successfully.";
    } else {
        echo "Error deleting candidature: " . $conn->error;
    }

    $conn->close();
    header("location:edit.php");
} else {
    echo "Candidature ID not provided.";
}

?>
