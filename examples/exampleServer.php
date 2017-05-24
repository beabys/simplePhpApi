<?php
require __DIR__ . '/../vendor/autoload.php';

use SimplePhpApi\Server;

//set null Request url
$requestInfo = null;
//$input = null;

// get the HTTP method, path and body of the Request
$requestMethod = $_SERVER['REQUEST_METHOD'];

//if PATH INFO is set
if (isset($_SERVER['PATH_INFO'])) {
    $requestInfo = $_SERVER['PATH_INFO'];
}

//get input parameters
$input = file_get_contents('php://input');

//new instance for server
$server = new Server($requestMethod, $requestInfo, $input);

//Return the message in json encode
echo $server->getMessage();
