<?php

require_once('model/Manager.php');

class FriendshiplinksManager extends Manager
{
    public function createFriendshipLink($user_1_id, $user_2_id)
    {
        $check = $this->checkExistingFriendshipLink($user_1_id, $user_2_id);
        if (!$check) {
            $sql = 'INSERT INTO friendship_links(user_1_id, user_2_id) VALUES(?,?)';
            $friendshipLink = $this->executeRequest($sql, array($user_1_id, $user_2_id));
            return $friendshipLink;
        } else {
            echo "Friendship already exist";
        }    
    }

    public function checkExistingFriendshipLink($myId, $friendId)
    {
        $sql = 'SELECT id 
        FROM friendship_links 
        WHERE (user_1_id = :myId AND user_2_id = :friendId)
        OR (user_2_id = :myId AND user_1_id = :friendId)';

        $friendshipLink = $this->executeRequest(
            $sql, 
            array(
                'myId'=>$myId, 
                'friendId'=>$friendId
            )
        );
        return $friendshipLink->rowCount()>0;
    }

    public function readFriendshipLinks($userId)
    {
        $sql = 'SELECT friendship_links.id AS linkid, 
        accounts.id AS accountid, 
        accounts.username AS friendname 
        FROM friendship_links 
        INNER JOIN accounts 
        ON (friendship_links.user_1_id = :id AND accounts.id = friendship_links.user_2_id)
        OR (friendship_links.user_2_id = :id AND accounts.id = friendship_links.user_1_id)';

        $friendshipLinks = $this->executeRequest(
            $sql, 
            array(
                'id'=>$userId
            )
        );
        return $friendshipLinks;
    }

    public function deleteFriendshipLink($friendshipLinkId)
    {
        $sql = 'DELETE FROM friendship_links WHERE id = ?';
        $friendshipLink = $this->executeRequest($sql, array($friendshipLinkId));

        return $friendshipLink;
    }

}