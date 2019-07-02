<?php

header("Access-Control-Allow-Origin: *");
//header("Content-Type: application/json; charset=UTF-8");

include_once './model/HiveManager.php'; // ***

$hives = new OpenClassrooms\P5\Model\HiveManager();

$result = $hives->retrieveHiveMarkers();
$numberOfHives = $result->rowCount();

if ($numberOfHives > 0) {
    $hives = array();

    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {

        extract($row);

        $hive = array(
            "id" => $id,
            "account_id" => $account_id,
            "name" => $name,
            "address" => $address,
            "lat" => $lat,
            "lng" => $lng 
        );

        array_push($hives, $hive);
    }

    http_response_code(200);
    echo json_encode($hives);
} else {
    http_response_code(404);
    echo json_encode(
        array("message" => "No hives found.")
    );
} 

