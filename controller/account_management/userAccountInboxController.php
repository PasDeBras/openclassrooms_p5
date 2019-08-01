<?php
function classLoader($class)
{
  require 'model/' . $class . '.php';
}
spl_autoload_register('classLoader');

$inboxManager = new FriendshipRequestsManager();
$friendshipLinksManager = new FriendShipLinksManager();
$incidentManager = new IncidentManager();

if (!empty($_GET['send_FriendshipRequest'])) 
{
  $context= "friendReq_Sent";
  
  $createFriendshipRequest = $inboxManager->createFriendshipRequest($_GET['send_FriendshipRequest'], $_SESSION['id']);
  if ($createFriendshipRequest == "Existing") {
    echo "Existing";
  }

} elseif (!empty($_GET['accept_FriendshipRequest']) && !empty($_GET['friend_Id'])) 
{
  $context= "link_created";
  echo "friendshiplink";
  $acceptFriendshipRequest = $inboxManager->acceptFriendshipRequest($_GET['accept_FriendshipRequest'], $_GET['friend_Id'], $_SESSION['id']);

} elseif (!empty($_GET['refuse_FriendshipRequest'])) 
{
  $context= "refused";
  echo "refused";
  $deleteFriendshipRequest = $inboxManager->deleteFriendshipRequest($_GET['refuse_FriendshipRequest']);
} elseif (!empty($_GET['delete_Friendship'])) 
{
  $context= "deleted";
  echo "deleted friendship";
  $deleteFriendshipRequest = $friendshipLinksManager->deleteFriendshipLink($_GET['delete_Friendship']);
} elseif (!empty($_GET['delete_Incident'])) 
{
  $context= "deletedIncident";
  echo "deleted incident";
  $deleteincident = $incidentManager->deleteIncident($_GET['delete_Incident']);
}
else 
{
  echo "rien";
  $context= NULL;
  
}
$allFriendships = $friendshipLinksManager->readFriendshipLinks($_SESSION['id']);
$friendshipRequests = $inboxManager->readFriendshipRequests($_SESSION['id']);
$incidents = $incidentManager->readAllIncidents($_SESSION['id']);
require('view/backend/user/account_management/userAccountInboxView.php');