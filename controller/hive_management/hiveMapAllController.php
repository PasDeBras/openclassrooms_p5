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
            $incident = $incidentManager->createIncident($_GET['Hive'], $_GET['Hive'], $_POST['incident']);
            echo "success";
        } else {
            echo "variable incident vide ou manquante";
        }   
    } else {
        echo "owner manquant";
    }
}

require('view/backend/user/hive_management/hiveMapAllView.php');
