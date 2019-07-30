<?php

require_once('model/Manager.php');

class FriendshiplinksManager extends Manager
{
    public function createFriendshipLink($user_1_id, $user_2_id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO friendship_links(user_1_id, user_2_id) VALUES(?,?)');
        $req->execute(array($user_1_id, $user_2_id));

        return $req;
    }

    public function checkExistingFriendshipLink($myId, $friendId){
        
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id 
        FROM friendship_links 
        WHERE (user_1_id = :myId AND user_2_id = :friendId)
        OR (user_2_id = :myId AND user_1_id = :friendId)');
        $req->execute(array(
            'myId'=>$myId, 
            'friendId'=>$friendId));

        return $req->rowCount()>0;
    }

    public function readFriendshipLinks($userId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT friendship_links.id AS linkid, friendship_links.user_1_id AS user1id, friendship_links.user_2_id AS user2id,accounts.id AS accountid, accounts.username AS friendname 
        FROM friendship_links 
        INNER JOIN accounts 
        ON (friendship_links.user_1_id = :id AND accounts.id = friendship_links.user_2_id)
        OR (friendship_links.user_2_id = :id AND accounts.id = friendship_links.user_1_id)');
        $req->execute(array(
            'id'=>$userId));
        return $req;
    }

    public function deleteFriendshipLink($friendshipLinkId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM friendship_links WHERE id = ?');
        $req->execute(array($friendshipLinkId));

        return $req;
    }

}