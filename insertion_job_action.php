<?php
require_once("Mysql.php");
require_once("Job.php");

$mysql =new Mysql();
$mysql->connexion();

$job = new Job();

$job->setType($_POST['type']);
$job->setCompany($_POST['company']);
$job->setDescription($_POST['description']);
$job->setExpiresAt($_POST['date_expiration']);
$job->setEmail($_POST['email']);

$job->ajouter();

?>
