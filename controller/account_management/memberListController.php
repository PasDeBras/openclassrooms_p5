<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

$accountManager = new AccountManager();
$friendshipLinksManager = new FriendshiplinksManager();

$context= NULL;
$listOfAccounts = $accountManager->readAllAccounts();

/* $listOfFriends = $friendshipLinksManager->readFriendshipLinks($_SESSION['id']);
$friendsArray = array();
while ($row = $listOfFriends->fetch(PDO::FETCH_ASSOC)) {
  $friendsArray[] = $row;
}  */

require('view/backend/user/account_management/membersListView.php');