<?php

require_once('model/Manager.php');

class FriendshiplinksManager extends Manager
{
    public function createFriendshipLink($user_1_id, $user_2_id)
    {

        $db = $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO friendship_links(user_1_id, user_2_id) VALUES(?,?)');
        $req->execute(array($user_1_id, $user_2_id));

        return $req;
    }

    public function readAllFriendshipLinks()
    {
        
    }

    public function listAllFriends($id)
    {
        $db = $db = $this->dbConnect();
        $req = $db->prepare('SELECT friendship_links.id AS linkid, friendship_links.user_1_id AS user1id, friendship_links.user_2_id AS user2id, accounts.username AS friendname 
        FROM friendship_links 
        INNER JOIN accounts 
        ON (friendship_links.user_1_id = :id AND accounts.id = friendship_links.user_2_id)
        OR (friendship_links.user_2_id = :id AND accounts.id = friendship_links.user_1_id)');
        $req->execute(array(
            'id'=>$id));
        return $req;
    }

}