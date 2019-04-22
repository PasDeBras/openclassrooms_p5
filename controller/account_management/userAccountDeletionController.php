<?php
require_once('model/AccountManager.php');
require('view/backend/user/account_management/accountDeleteView.php');

function deleteAccount($id) {
    $accountManager = new OpenClassrooms\P5\Model\AccountManager();
    $deleteAccount = $accountManager->deleteAccount($id);
    echo 'done';
}