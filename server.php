<?php

$action = $_REQUEST['action'] ?? 'get';

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if ($action == 'get') {
    echo file_get_contents('db.json');
}

if ($action == 'set') {
    $player = $_REQUEST['player'];
    $x = $_REQUEST['x'];
    $y = $_REQUEST['y'];
    $db = json_decode(file_get_contents('db.json'), true);
    $db[$player]['x'] = $x;
    $db[$player]['y'] = $y;
    file_put_contents('db.json', json_encode($db));

    echo '{"status": "ok"}';
}