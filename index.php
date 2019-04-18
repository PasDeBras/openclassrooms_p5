<?php
try {
    if (isset($_GET['action'])) {
        /* -------------------- User authentification -------------------- */
        /* ---------- Authentification views access ---------- */
        if ($_GET['action'] == 'auth_start') { /* Access login or register page */
            require('controller/authentification/authStartController.php');
        } elseif ($_GET['action'] == 'auth_New') { /* Access account registering page */
            require('controller/authentification/authNewController.php');
        } elseif ($_GET['action'] == 'auth_Verify') { /* Access account login page */
            require('controller/authentification/authVerifyController.php');
        /* ---------------- Account creation ---------------- */
        } elseif ($_GET['action'] == 'auth_New_Create') {
            require('controller/authentification/authNewController.php');
            if (isset($_POST['username'])) {
                if (isset($_POST['password'])) {
                    if (isset($_POST['email'])) {
                        if (isset($_POST['firstname'])) {
                            if (isset($_POST['firstname'])) {
                                if (isset($_POST['lastname'])) {
                                    createNewAccount($_POST['username'], $_POST['password'], $_POST['email'], $_POST['firstname'], $_POST['lastname']);
                                } 
                            }
                        }   
                    }
                }
            }
        /* ------------------ Account login ----------------- */
        } elseif ($_GET['action'] == 'auth_Verify_Login') {
            require('controller/authentification/authVerifyController.php');
            if (isset($_POST['email'])) {
                if (isset($_POST['password'])) {
                    verifyCredentials($_POST['email'], $_POST['password']);
                } else {
                    throw new Exception('Mot de passe non rempli');
                }
            } else {
                throw new Exception('E-mail non-rempli');
            }
        /* ------------- User account ------------ */
        } elseif ($_GET['action'] == 'auth_Verify_Cleared') {
            require('controller/account_management/userAccountController.php');
        }
    } else {
        require('controller/homepageController.php');
    }
    

}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    echo $errorMessage;
}