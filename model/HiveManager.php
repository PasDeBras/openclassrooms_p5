<?php

require_once('model/Manager.php');
class HiveManager extends Manager
{
    public function retrieveHiveMarkers()
    {
        $sql = 'SELECT hive_markers.id AS hiveId, 
        hive_markers.account_id AS hiveAccountId, 
        hive_markers.name AS hiveName,
        hive_markers.address AS hiveAddress,
        hive_markers.lat AS hiveLat,
        hive_markers.lng AS hiveLng,
        hive_markers.private AS isPrivate,
        accounts.username AS hiveOwner
        FROM hive_markers
        INNER JOIN accounts
        WHERE hive_markers.account_id = accounts.id';

        $hiveMarkers = $this->executeRequest($sql);
        return $hiveMarkers;
    }

    public function retrieveHiveMarker($id)
    {
        $sql = 'SELECT * FROM hive_markers WHERE id = ?';

        $hiveMarker = $this->executeRequest($sql, array($id));
        return $hiveMarker;
    }

    public function retrieveAccountHiveMarkers($account_Id) {
        $sql = 'SELECT * FROM hive_markers WHERE account_id = ?';

        $accountHiveMarkers = $this->executeRequest($sql, array($account_Id));
        return $accountHiveMarkers;
    }

    public function addHiveMarker($account_id, $name, $address, $lat, $lng, $private)
    {
        $sql = 'INSERT INTO hive_markers(account_id, name, address, lat, lng, private) VALUES(?, ?, ?, ?, ?, ?)';

        $hiveMarker = $this->executeRequest($sql, array($account_id, $name, $address, $lat, $lng, $private));
        return $hiveMarker;
    }

    public function updateHiveMarker($id, $name, $address, $lat, $lng)
    {
        $sql = 'UPDATE hive_markers 
        SET name = :newname, 
        address = :newaddress, 
        lat = :newlat, 
        lng = :newlng 
        WHERE id = :markerid';
        
        $hiveMarker = $this->executeRequest(
            $sql, 
            array(
                'newname' => $name,
                'newaddress' => $address,
                'newlat' => $lat,
                'newlng' => $lng,
                'markerid' => $id,
            )
        );
        return $hiveMarker;
    }

    public function deleteHiveMarker($id)
    {
        $sql = 'DELETE FROM hive_markers WHERE `id` = ?';
        
        $hiveMarker = $this->executeRequest($sql, array($id));
        return $hiveMarker;
    }
}