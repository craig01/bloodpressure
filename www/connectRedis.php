<?php
include('/tmp/predis/predis-1.0');

require '/tmp/predis/predis-1.0/autoload.php';
PredisAutoloader::register();

try {
    $redis = new PredisClient();
/*
    $redis = new PredisClient(array(
        "scheme" => "tcp",
        "host" => "127.0.0.1",
        "port" => 6379));
*/
    echo "Successfully connected to Redis";
}
catch (Exception $e) {
    echo "Couldn't connected to Redis";
    echo $e->getMessage();
}

$redis->set("message", "Hello world");

// gets the value of message
$value = $redis->get('message');

// Hello world
print($value);

?>
