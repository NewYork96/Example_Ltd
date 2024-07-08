<?php

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    include ('user_action/list.php');
} elseif ($action == 'delete') {
    include ('user_action/delete.php');
} elseif ($action == 'edit') {
    include ('user_action/edit.php');
} elseif ($action == 'new') {
    include ('user_action/new.php');
} elseif ($action == 'show') {
    include ('user_action/show.php');
} elseif ($action == 'logout') {
    include ('user_action/logout.php');
} 
   

