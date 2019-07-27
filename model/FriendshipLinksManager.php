<?php

require_once('model/Manager.php');

class FriendshiplinksManager extends Manager
{
    public function createFriendshipLink($sender_id, $receiver_id)
    {

        $db = $db = $this->dbConnect();
        $req = $db->prepare('');
        $req->execute(array($sender_id, $receiver_id));

        return $req;
    }

    public function readAllFriendshipLinks()
    {
        
    }

}