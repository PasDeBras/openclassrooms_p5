<?php
require_once('model/AccountManager.php');
require('view/backend/user/account_management/passwordChangeView.php');

function changeAccount_password($id, $newPassword) {
    $accountManager = new OpenClassrooms\P5\Model\AccountManager();
    $changePassword = $accountManager->changeAccountPassword($id, $newPassword);
    echo 'done';
}