<?php
try {
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'auth_start') {
            require('controller/authentification/authStartController.php');
        }
    } else {
        require('controller/homepageController.php');
    }
    

}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    echo $errorMessage;
}