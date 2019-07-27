<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

require('view/backend/user/account_management/passwordChangeView.php');

function changeAccount_password($id, $newPassword) {
    $accountManager = new AccountManager();
    $changePassword = $accountManager->changeAccountPassword($id, $newPassword);
    echo 'done';
}