<?php
require('view/frontend/authentification/authNewView.php');
require_once('model/AccountManager.php');

function createNewAccount($username, $password, $email, $firstname, $lastname) {
    $accountManager = new OpenClassrooms\P5\Model\AccountManager();
    $accountManager->insertAccount($username, $password, $email, $firstname, $lastname);
    
}