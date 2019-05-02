<?php

namespace OpenClassrooms\P5\Model;

require_once('model/Manager.php');
class HiveManager extends Manager
{
    public function retrieveHiveMarkers()
    {
        $db = $this->dbConnect();
        $hiveMarkers = $db->query('SELECT * FROM hive_markers WHERE 1');
        return $hiveMarkers;
    }
}