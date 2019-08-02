<?php

namespace OpenClassrooms\P5\Model;

require_once('model/Manager.php');
class HiveManager extends Manager
{
    public function retrieveHiveMarkers()
    {
        $db = $this->dbConnect();
        $hiveMarkers = $db->query('SELECT hive_markers.id AS hiveId, 
        hive_markers.account_id AS hiveAccountId, 
        hive_markers.name AS hiveName,
        hive_markers.address AS hiveAddress,
        hive_markers.lat AS hiveLat,
        hive_markers.lng AS hiveLng,
        hive_markers.private AS isPrivate,
        accounts.username AS hiveOwner
        FROM hive_markers
        INNER JOIN accounts
        WHERE hive_markers.account_id = accounts.id');
        return $hiveMarkers;
    }

    public function retrieveAccountHiveMarkers($account_Id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM hive_markers WHERE account_id = ?');
        $req->execute(array($account_Id));
        return $req;
    }


}