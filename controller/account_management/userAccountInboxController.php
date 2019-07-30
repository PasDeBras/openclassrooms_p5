<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

$inboxManager = new FriendshipRequestsManager();
$friendshipLinksManager = new FriendShipLinksManager();
if (!empty($_GET['send_FriendshipRequest'])) 
{
  $context= "friendReq_Sent";
  echo "friendshiprequest";
  $addedFriendshipRequest = $inboxManager->createFriendshipRequest($_GET['send_FriendshipRequest']);

} elseif (!empty($_GET['accept_FriendRequest']) && !empty($_GET['friend_Id'])) {
  $context= "link_created";
  echo "friendshiplink";
  $addedFriendshipLink = $inboxManager->acceptFriendshipRequest($_GET['accept_FriendRequest'], $_GET['friend_Id'], $_SESSION['id']);
}
else 
{
  echo "rien";
  $context= NULL;
  
}
$allFriendships = $friendshipLinksManager->listAllFriends($_SESSION['id']);
$friendshipRequests = $inboxManager->readFriendshipRequests($_SESSION['id']);
require('view/backend/user/account_management/userAccountInboxView.php');