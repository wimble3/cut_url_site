<?php

require_once $_SERVER['DOCUMENT_ROOT'] . '/core/w3.php';

if ($_SERVER['REQUEST_URI'] !== '') {
    $arr = getFileToArray();
    foreach ($arr as $row) {
        if ($row[1] === 'http://' . 'localhost' . ':' . '8888' . $_SERVER['REQUEST_URI']) {
            header('Location: ' . $row[0]);
            die();
        }
    }
}

function getFileToArray(): array
{
    $arr = [];
    $file = file($_SERVER['DOCUMENT_ROOT'] . '/local/short_urls/short_urls.csv');

    foreach ($file as $row) {
        $row = explode(';', $row);
        $arr[$row[0]] = $row;
    }
    return $arr;
}
