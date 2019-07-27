<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

$inboxManager = new FriendshipRequestsManager(); 
if (!empty($_GET['friendId'])) 
{
  $context= "friendReq_Sent";
  $addedFriendshipRequest = $inboxManager->createFriendshipRequest($_GET['friendId']);
  $friendshipRequests = $inboxManager->readFriendshipRequests($_SESSION['id']);
} 
else 
{
  $context= NULL;
  $friendshipRequests = $inboxManager->readFriendshipRequests($_SESSION['id']);
}


require('view/backend/user/account_management/userAccountInboxView.php');