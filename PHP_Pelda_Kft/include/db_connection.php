<?php

$db = @mysqli_connect(
    '127.0.0.1',
    'root',
    '',
    'minta_kft',
);

if (mysqli_connect_error()) {
    header('maintenance.php');
    exit;
}
