<?php
require_once("Candidat.php");
require_once("Mysql.php");

if(isset($_GET['id'])) {
    $candidat_id = $_GET['id'];
    $candidat = new Candidat();

    $candidat_details = $candidat->getCandidatureDetails($candidat_id);

    if($candidat_details) {
        $id = $candidat_details['id'];
        $job_id = $candidat_details['job_id'];
        $candidat_name = $candidat_details['candidat'];
        $contenu = $candidat_details['contenu'];
        $date = $candidat_details['date'];
    } else {
        echo "Candidat details not found.";
        exit; 
    }
} else {
    echo "Candidat ID not provided.";
    exit; 
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!empty($_POST['candidat']) && !empty($_POST['contenu']) && !empty($_POST['job_id']) && !empty($_POST['date'])) {

        $candidat_id = $_POST['candidat_id']; 
        $candidat_name = $_POST['candidat'];
        $contenu = $_POST['contenu'];
        $job_id = $_POST['job_id'];
        $date = $_POST['date'];

        $candidat = new Candidat();
        $result = $candidat->updateCandidature($candidat_id, $candidat_name, $contenu, $job_id, $date);

        if ($result) {
            echo "Candidature updated successfully.";
        } else {
            echo "Failed to update candidature.";
        }
    } else {
        echo "Please fill all required fields.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #007bff;
        }
        form {
            margin-top: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="text"],
        input[type="date"],
        textarea,
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            font-size: 16px;
            border-radius: 4px;
            cursor: pointer;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
    <title>Edit Candidature</title>
</head>
<body>
    <div class="container">
        <h1>Edit Candidature</h1>
        <form method="post">
            <input type="hidden" name="candidat_id" value="<?php echo $id; ?>">
            
            <div class="form-group">
                <label for="id">ID</label>
                <input type="text" class="form-control" id="id" value="<?php echo $id; ?>" readonly>  
            </div>

            <div class="form-group">
                <label for="candidat">Nom du candidat</label>
                <input type="text" class="form-control" id="candidat" value="<?php echo $candidat_name; ?>" placeholder="Enter votre nom" name="candidat">  
            </div>
            
            <div class="form-group">
                <label for="contenu">Contenu</label>
                <textarea name="contenu" class="form-control"><?php echo $contenu; ?></textarea>
            </div>
            <div class="form-group">
                <label for="job_id">Choix de l'offre</label>
                <select class="form-control" name="job_id">
                    <?php
                    require_once("Job.php");
                    $job = new Job();
                    $les_jobs = $job->editAll();
                    foreach ($les_jobs as $job_item) {
                        echo "<option value='".$job_item['id']."' ".($job_item['id'] == $job_id ? 'selected' : '').">".$job_item['type']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" name="date" class="form-control" id="date" value="<?php echo $date; ?>" placeholder="Enter un date">
            </div>
            
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
