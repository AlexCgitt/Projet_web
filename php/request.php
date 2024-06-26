<?php
require_once('Database.php');

$requestMethod = $_SERVER['REQUEST_METHOD'];
$request = substr($_SERVER['PATH_INFO'], 1);
$request = explode('/', $request);
$requestRessource = array_shift($request);

$id = array_shift($request);
if ($id == '')
    $id = NULL;
$result = null;

$db = Database::connexionDB();
if (!$db) {
    header('HTTP/1.1 503 Service Unavailable');
    exit;
}

switch ($requestRessource) {
    case "arbres":
        switch($requestMethod){
            case "GET":
                $result= dbRequestArbres($db) ;
                break;
        }
        break;
}

if (!empty($result)) {
    
    header('Content-Type: application/json; charset=utf-8');
    header('Cache-control: no-store, no-cache, must-revalidate');
    header('Pragma: no-cache');
    header('HTTP/1.1 200 OK');
    echo json_encode($result);
    exit();
    
}

// Bad request case.
header('HTTP/1.1 400 Bad Request');
?>    