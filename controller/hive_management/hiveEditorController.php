<?php
require_once('model/HiveManager.php');
$hiveManager = new OpenClassrooms\P5\Model\HiveManager();

if (!empty($_GET['editHive'])) {
    if ((!empty($_GET['editHive'])) && (!empty($_POST['hivename'])) && (!empty($_POST['hiveaddress'])) && (!empty($_POST['hivelat'])) && (!empty($_POST['hivelng']))) {
        $hive = $hiveManager->updateHiveMarker($_GET['editHive'], $_POST['hivename'], $_POST['hiveaddress'], $_POST['hivelat'], $_POST['hivelng']);
        $context = 'hiveEdited';
    } else {
        $hive = $hiveManager->retrieveHiveMarker($_GET['editHive']);
        $context = 'hiveEditor';
    }

} elseif (!empty($_GET['deleteHive'])) {
    $hive = $hiveManager->deleteHiveMarker($_GET['deleteHive']);
    $context = 'hiveDeleted';
} else {
    $context = NULL;
    $hives = $hiveManager->retrieveHiveMarkers();
}

require('view/backend/user/hive_management/hiveEditorView.php');