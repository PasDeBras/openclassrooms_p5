<?php
session_start();
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
            login();
        /* ---------------- Account creation ---------------- */
        } elseif ($_GET['action'] == 'auth_New_Create') {
            require('controller/authentification/authNewController.php');
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
        } elseif ($_GET['action'] == 'auth_Verify_Disconnect'){
            require('controller/authentification/authVerifyController.php');
            disconnectUser();
        /* ------------- User account ------------ */
        } elseif ($_GET['action'] == 'auth_Verify_Cleared') {
            require('controller/account_management/userAccountController.php');
        } elseif ($_GET['action'] == 'user_Account_Manage') {
            /*require('controller/authentification/authVerifyController.php');
            verifyStoredCredentials();*/
            require('controller/account_management/userAccountController.php');
        } elseif ($_GET['action'] == 'user_Account_Change_Password') {
            require('controller/account_management/userAccountPasswordChangeController.php');
        } elseif ($_GET['action'] == 'Change_Password') {
            require('controller/account_management/userAccountPasswordChangeController.php');
            changeAccount_password($_SESSION['id'], $_POST['password']);
        } elseif ($_GET['action'] == 'user_Account_Deletion') {
            require('controller/account_management/userAccountDeletionController.php');
        } elseif ($_GET['action'] == 'Delete_Account') {
            if ($_POST['delete'] = true) {
                require('controller/account_management/userAccountDeletionController.php');
                deleteAccount($_SESSION['id']);
            } else {}
        }
    } elseif (!empty($_SESSION['user_username'])) {
        require('controller/account_management/userAccountController.php');
    } else {
        require('controller/homepageController.php');
    }
    

}
catch(Exception $e) {
    $errorMessage = $e->getMessage();
    echo $errorMessage;
}