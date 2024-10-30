<?php
require_once("Mysql.php");
require_once("Candidat.php");

$mysql =new Mysql();
$mysql->connexion();

$candidat = new Candidat();

  
  if (isset($_POST['job'])) {
    $job_id = $_POST['job'];
  } else {
    echo "Error: Job ID is missing.";
    exit();
  }
  

$candidat->setJobId($_POST['job']);
$candidat->setCandidat($_POST['candidat']);
$candidat->setContenu($_POST['contenu']);
$candidat->setDate($_POST['date']);

$candidat->ajouter();

?>
