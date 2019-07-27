<?php

require_once('model/Manager.php');
class HiveManager extends Manager
{
    public function retrieveHiveMarkers()
    {
        $db = $this->dbConnect();
        $hiveMarkers = $db->query('SELECT * FROM hive_markers WHERE 1'); // -where
        return $hiveMarkers;
    }

    public function retrieveHiveMarker($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM hive_markers WHERE id = ?');
        $req->execute(array($id));
        return $req;
    }

    public function retrieveAccountHiveMarkers($account_Id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT * FROM hive_markers WHERE account_id = ?');
        $req->execute(array($account_Id));
        return $req;
    }

    public function addHiveMarker($account_id, $name, $address, $lat, $lng)
    {
        $db = $this->dbConnect();
        $markers = $db->prepare('INSERT INTO hive_markers(account_id, name, address, lat, lng) VALUES(?, ?, ?, ?, ?)');
        $executeRequest = $markers->execute(array($account_id, $name, $address, $lat, $lng));

        return $executeRequest;
    }

    public function updateHiveMarker($id, $name, $address, $lat, $lng)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE hive_markers SET name = :newname, address = :newaddress, lat = :newlat, lng = :newlng WHERE id = :markerid');
        $req->execute(array(
            'newname' => $name,
            'newaddress' => $address,
            'newlat' => $lat,
            'newlng' => $lng,
            'markerid' => $id,
        ));

        return $req;
    }

    public function deleteHiveMarker($id)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM hive_markers WHERE `id` = ?');
        $req->execute(array($id));

        return $req;
    }
}