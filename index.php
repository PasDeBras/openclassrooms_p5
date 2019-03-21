<?php
try {
    require('controller/homepageController.php');

}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    echo $errorMessage;
}