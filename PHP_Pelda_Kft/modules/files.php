<?php

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    include ('files_action/list.php');
} elseif ($action == 'delete') {
    include ('files_action/delete.php');
} elseif ($action == 'edit') {
    include ('files_action/edit.php');
} elseif ($action == 'new') {
    include ('files_action/new.php');
} elseif ($action == 'show') {
    include ('files_action/show.php');
}