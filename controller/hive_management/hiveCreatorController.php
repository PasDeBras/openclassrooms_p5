<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

if (!empty($_POST['hivename']) && !empty($_POST['hiveadress']) && !empty($_POST['hivelat']) && !empty($_POST['hivelng'])) {
    require_once('model/HiveManager.php');
    $hiveManager = new HiveManager();
    $hiveManager->addHiveMarker($_SESSION['id'], $_POST['hivename'], $_POST['hiveadress'], $_POST['hivelat'], $_POST['hivelng']);
    
    $context = 'hiveCreated';


    
} else {
    $context = NULL;
}

require('view/backend/user/hive_management/hiveCreatorView.php');