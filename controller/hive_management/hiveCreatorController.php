<?php
if (!empty($_POST['hivename']) && !empty($_POST['hiveadress']) && !empty($_POST['hivelat']) && !empty($_POST['hivelng'])) {
    require_once('model/HiveManager.php');
    $hiveManager = new OpenClassrooms\P5\Model\HiveManager();
    $hiveManager->addHiveMarker($_SESSION['id'], $_POST['hivename'], $_POST['hiveadress'], $_POST['hivelat'], $_POST['hivelng']);
    
    $context = 'hiveCreated';


    
} else {
    $context = NULL;
}

require('view/backend/user/hive_management/hiveCreatorView.php');