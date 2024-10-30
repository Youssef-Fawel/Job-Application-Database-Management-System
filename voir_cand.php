<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails du Candidat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <?php
        // Include the Candidat class file
        require_once("Candidat.php");

        // Create an instance of the Candidat class
        $candidat = new Candidat();

        // Check if the ID parameter is set in the URL
        if(isset($_GET['id'])) {
            // Get the candidate ID from the URL and sanitize it
            $candidate_id = $_GET['id'];

            // Fetch candidate details from the database
            $candidate = $candidat->getCandidatureDetails($candidate_id);

            // Check if the candidate exists
            if($candidate) {
                // Display candidate details
                echo "<h2>Détails du Candidat</h2>";
                echo "<p>Name: " . $candidate['candidat'] . "</p>";
                echo "<p>Job ID: " . $candidate['job_id'] . "</p>";
                echo "<p>Content: " . $candidate['contenu'] . "</p>";
                echo "<p>Date: " . $candidate['date'] . "</p>";
            } else {
                // Display error message if candidate not found
                echo "Candidate not found.";
            }
        } else {
            // Display message if candidate ID is not provided in the URL
            echo "Candidate ID not provided.";
        }
        ?>
    </div>
</body>
</html>
