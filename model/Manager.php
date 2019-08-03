<?php

abstract class Manager
{
    private $db;
    protected function executeRequest($sql, $params = NULL) {
        if ($params == NULL) {
            $result = $this->getDb()->query($sql);
        }
        else {
            $result = $this->getDb()->prepare($sql);
            $result->execute($params);
        }
        return $result;
    }

    private function getDb() {
        if ($this->db == null) {
          $this->db = new PDO('mysql:host=localhost;dbname=project_oc_p5;charset=utf8',
            'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
        }
        return $this->db;
    }
}