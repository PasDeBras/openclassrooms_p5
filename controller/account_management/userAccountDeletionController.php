<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

require('view/backend/user/account_management/accountDeleteView.php');

function deleteAccount($id) {
    $accountManager = new AccountManager();
    $deleteAccount = $accountManager->deleteAccount($id);
    echo 'done';
}