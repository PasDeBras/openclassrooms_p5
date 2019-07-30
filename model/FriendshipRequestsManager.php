<?php

require_once('model/Manager.php');
require_once('model/FriendshipLinksManager.php');
class FriendshipRequestsManager extends Manager // 
{
    public function createFriendshipRequest($receiverId)
    {
        $db = $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO friendship_requests(sender_id, receiver_id) VALUES(?,?)');
        $req->execute(array($_SESSION['id'],$receiverId));

        return $req;
    }
    
    public function readFriendshipRequests($receiverId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT friendship_requests.id AS requestid, accounts.username AS sendername, accounts.id AS senderid 
        FROM friendship_requests 
        INNER JOIN accounts 
        ON friendship_requests.receiver_id = ? 
        AND accounts.id = friendship_requests.sender_id');
        $req->execute(array($receiverId));
        return $req;
    }

    public function deleteFriendshipRequest($friendShipRequestId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM friendship_requests WHERE id = ?');
        $req->execute(array($friendShipRequestId));
    }

    public function acceptFriendshipRequest($friendShipRequestId, $sender_id, $receiver_id)
    {
        $db = $this->dbConnect();
        $this->deleteFriendshipRequest($friendShipRequestId);

        $friendShipLinkManager = new FriendshipLinksManager();
        $friendShipLinkManager->createFriendshipLink($sender_id, $receiver_id);

        
    }



}