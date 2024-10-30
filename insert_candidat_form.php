<?php require_once("Job.php"); 
$job=new Job();
?>
<!DOCTYPE html>
<html>
<head>
<style>
    form{
    margin-left:auto;
    margin-right:auto;
    width:500px; }
</style>
<title>insert candidat</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body>

<form action="insert_candidat_action.php" method="post">
<h1>Ajout d'une nouvelle Candidature</h1>
  <div class="form-group">
    <label for="candidat">Nom du candidat</label>
    <input type="text" class="form-control" id="candidat"  placeholder="Enter votre nom" name="candidat">  
  </div>
  
  <div class="form-group">
    <label for="contenu">contenu</label>
    <textarea name="contenu" class="form-control"></textarea>
  </div>
  <div class="form-group">
    <label for="job">Choix de l'offre</label>
    <select class="form-control"  name="job">
<?php
$les_jobs=$job->editAll();
 // Récupérer les offres de job depuis la BdD :
    echo "<option>----Choix de l’offre ----</option>";
    foreach ($les_jobs as $item) {
    echo "<option value='$item[0]'>$item[1]</option>";
    }
?>
 </select>

 <div class="form-group">
    <label for="date">date</label>
    <input  type ="date" name="date" class="form-control" id="date"  placeholder="Enter un date "></input>
  </div>
  
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</body>
</html>