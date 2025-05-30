<?php
header('Content-Type: application/json');

$make = $_GET['make'] ?? '';
if (!$make) {
    echo json_encode(["error" => "Missing make parameter"]);
    exit;
}

$url = "https://www.carqueryapi.com/api/0.3/?cmd=getTrims&make=" . urlencode($make) . "&sold_in_us=1";

$response = @file_get_contents($url);

if ($response === false) {
    echo json_encode(["error" => "CarQuery API request failed"]);
    exit;
}

echo $response;

