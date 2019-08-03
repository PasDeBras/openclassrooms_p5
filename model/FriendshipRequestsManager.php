<?php

require_once('model/Manager.php');
require_once('model/FriendshipLinksManager.php');
class FriendshipRequestsManager extends Manager // 
{
    public function createFriendshipRequest($receiverId, $myid)
    {
        $flm = new FriendshipLinksManager();
        if ($this->checkExistingFriendshipRequest($receiverId, $myid) || $flm->checkExistingFriendshipLink($myid,$receiverId)){
          return "Existing";  
        }
        $sql = 'INSERT INTO friendship_requests(sender_id, receiver_id) VALUES(?,?)';

        $friendshipRequest = $this->executeRequest($sql, array($myid,$receiverId));
        return $friendshipRequest;
    }

    public function checkExistingFriendshipRequest($receiverId, $myid) 
    {
        $sql = 'SELECT id FROM friendship_requests WHERE receiver_id = ? AND sender_id = ?';

        $friendshipRequest = $this->executeRequest($sql, array($receiverId, $myid));
        return $friendshipRequest->rowCount()>0;
    }

    public function acceptFriendshipRequest($friendShipRequestId, $sender_id, $receiver_id)
    {
        $this->deleteFriendshipRequest($friendShipRequestId);

        $friendShipLinkManager = new FriendshipLinksManager();
        $friendShipLinkManager->createFriendshipLink($sender_id, $receiver_id);  
    }

    public function readFriendshipRequests($receiverId)
    {
        $sql = 'SELECT friendship_requests.id AS requestid, 
        accounts.username AS sendername, 
        accounts.id AS senderid 
        FROM friendship_requests 
        INNER JOIN accounts 
        ON friendship_requests.receiver_id = ? 
        AND accounts.id = friendship_requests.sender_id';

        $friendshipRequest = $this->executeRequest($sql, array($receiverId));
        return $friendshipRequest;
    }

    public function deleteFriendshipRequest($friendShipRequestId)
    {
        $sql = 'DELETE FROM friendship_requests WHERE id = ?';
        
        $friendshipRequest = $this->executeRequest($sql, array($friendShipRequestId));
    }
}