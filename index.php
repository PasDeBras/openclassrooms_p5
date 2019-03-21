<?php
try {
    if (isset($_GET['action'])) {
        /* User authentification */
        if ($_GET['action'] == 'auth_start') { /* Access login or register page */
            require('controller/authentification/authStartController.php');
        } elseif ($_GET['action'] == 'auth_New') { /* Access account registering page */
            require('controller/authentification/authNewController.php');
        } elseif ($_GET['action'] == 'auth_Verify') { /* Access account login page */
            require('controller/authentification/authVerifyController.php');
        }
    } else {
        require('controller/homepageController.php');
    }
    

}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    echo $errorMessage;
}