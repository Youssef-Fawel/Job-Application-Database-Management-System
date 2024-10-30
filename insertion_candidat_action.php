<?php
require_once("Mysql.php");
require_once("candidat.php");

$mysql =new Mysql();
$candidature = new Candidat();
$candidature->setJobId($_POST['job']);
$candidature->setCandidat($_POST['candidat']);
$candidature->setContenu($_POST['contenu']);
$candidature->setDate($_POST['date']);


$candidature->ajouter();

?>