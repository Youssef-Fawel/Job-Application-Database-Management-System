<?php require_once("Job.php"); 
$job=new Job();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Consultation</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa; 
            color: #343a40; 
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1, h2, h3, h4, h5 {
            color: #000; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2; 
            color: black; 
        }
        tr:nth-child(even) {
            background-color: #e8e8e8; 
        }
        .btn {
            padding: 8px 12px;
            margin: 2px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }
        .btn-primary {
            background-color: #66ccff; 
            color: #fff;
        }
        .btn-primary:hover {
            background-color: #6699ff; 
        }
        .btn-danger {
            background-color: #f80000; 
            color: #fff; 
        }
        .btn-danger:hover {
            background-color: #c82333; 
        }
        .btn-info {
            background-color: blue; 
            color: #fff;
        }
        .btn-info:hover {
            background-color: #309; 
        }
    </style>
</head>
<body>
    <h1>Consultation</h1>
    <div class="form-group">
        <h2>Les offres récentes</h2>
        <h5>Ci-dessous la liste des candidatures:</h5>
    </div>
  
    <?php
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "dbjob";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM candidature";
    $result = $conn->query($sql);

    echo "<table>
    <tr>
    <th>ID</th>
    <th>Job ID</th>
    <th>Candidat</th>
    <th>Contenu</th>
    <th></th>
    </tr>";

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row["id"] . "</td>";
            echo "<td>" . $row["job_id"] . "</td>";
            echo "<td>" . $row["candidat"] . "</td>";
            echo "<td>" . $row["contenu"] . "</td>";
            echo "<td>";
            echo "<a href='voir_cand.php?id=" . $row["id"] . "' class='btn btn-primary btn-info'>Voir</a>";
            echo "<a href='edit_canditature.php?id=" . $row["id"] . "' class='btn btn-primary'>Modifier</a>";
            echo "<a href='delete_cand.php?id=" . $row["id"] . "' class='btn btn-danger' onclick='return confirm(\"Are you sure you want to delete this candidature?\")'>Supprimer</a>";
            echo "</td>";
            echo "</tr>";
        }
    } else {
        echo "<tr><td colspan='5'>Aucun résultat trouvé</td></tr>";
    }
    echo "</table>";

    $conn->close();
    ?>

    <script>
        function viewCandidat(id) {
            console.log("Viewing candidat with ID: " + id);
        }
    </script>
</body>
</html>
