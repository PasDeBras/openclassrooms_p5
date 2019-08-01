<?php

require_once('model/Manager.php');
class IncidentManager extends Manager
{
    function createIncident($hiveId, $ownerId, $incidentDetails)
    {
        $db = $this->dbConnect();
        $incident = $db->prepare('INSERT INTO hive_incidents(hive_id , owner_id, incident) VALUES(?, ?, ?)');
        $executeRequest = $incident->execute(array($hiveId, $ownerId, $incidentDetails));

        return $executeRequest;
    }

    function readAllIncidents($accountId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT hive_incidents.id AS incidentId, 
        hive_incidents.hive_id AS hiveId,
        hive_incidents.incident AS incident,
        hive_markers.name AS hiveName
        FROM hive_incidents
        INNER JOIN hive_markers
        ON hive_incidents.owner_id = ?
        AND hive_markers.id = hive_incidents.hive_id');
        $req->execute(array($account_Id));
        return $req;
    }

    function readIncident($incidentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT hive_incidents.id AS incidentId, 
        hive_incidents.hive_id AS hiveId,
        hive_incidents.owner_id AS ownerId,
        hive_markers.name AS hiveName
        FROM hive_incidents
        INNER JOIN hive_markers
        ON hive_incidents.id = ?
        AND hive_markers.id = hive_incidents.hive_id');
        $req->execute(array($account_Id));
        return $req;
    }

    function updateIncident($incidentId, $incidentDetails)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE hive_incidents SET incident = :newIncident WHERE id = :incidentId');
        $req->execute(array(
            'newIncident' => $incidentDetails,
            'incidentId' => $incidentId,
        ));

        return $req;
    }

    function deleteIncident($incidentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM hive_incidents WHERE `id` = ?');
        $req->execute(array($incidentId));

        return $req;
    }
}