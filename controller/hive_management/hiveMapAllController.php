<?php

function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

$incidentManager = new IncidentManager();

if (!empty($_GET['Hive'])) {
    if (!empty($_GET['Owner'])) {
        if (!empty($_POST['incident'])) {
            $incident = $incidentManager->createIncident($_GET['Hive'], $_GET['Owner'], $_POST['incident']);
            $message = "Signalement réussi !";
            echo "<script type='text/javascript'>alert('$message');</script>";
            echo "succes";
        } else {
            echo "variable incident vide ou manquante";
        }   
    } else {
        echo "owner manquant";
    }
}

require('view/backend/user/hive_management/hiveMapAllView.php');
