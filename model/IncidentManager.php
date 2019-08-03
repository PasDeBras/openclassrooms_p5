<?php

require_once('model/Manager.php');
class IncidentManager extends Manager
{
    function createIncident($hiveId, $ownerId, $incidentDetails)
    {
        $sql = 'INSERT INTO hive_incidents(hive_id , owner_id, incident) VALUES(?, ?, ?)';

        $incident = $this->executeRequest($sql, array($hiveId, $ownerId, $incidentDetails));
        return $incident;
    }

    function readAllIncidents($accountId)
    {
        $sql = 'SELECT hive_incidents.id AS incidentId, 
        hive_incidents.hive_id AS hiveId,
        hive_incidents.incident AS incident,
        hive_markers.name AS hiveName
        FROM hive_incidents
        INNER JOIN hive_markers
        ON hive_incidents.owner_id = ?
        AND hive_markers.id = hive_incidents.hive_id';

        $incident = $this->executeRequest($sql, array($accountId));
        return $incident ;
    }

    function readIncident($incidentId)
    {
        $sql = 'SELECT hive_incidents.id AS incidentId, 
        hive_incidents.hive_id AS hiveId,
        hive_incidents.owner_id AS ownerId,
        hive_markers.name AS hiveName
        FROM hive_incidents
        INNER JOIN hive_markers
        ON hive_incidents.id = ?
        AND hive_markers.id = hive_incidents.hive_id';

        $incident = $this->executeRequest($sql, array($account_Id));
        return $incident;
    }

    function updateIncident($incidentId, $incidentDetails)
    {
        $sql = 'UPDATE hive_incidents SET incident = :newIncident WHERE id = :incidentId';
        
        $incident = $this->executeRequest(
            $sql, 
            array(
                'newIncident' => $incidentDetails,
                'incidentId' => $incidentId
            )
        );
        return $incident;
    }

    function deleteIncident($incidentId)
    {
        $sql = 'DELETE FROM hive_incidents WHERE `id` = ?';

        $incident = $this->executeRequest($sql, array($incidentId));
        return $incident;
    }
}