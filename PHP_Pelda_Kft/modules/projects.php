<h1>Projects</h1>


<?php

$action = $_GET['action'] ?? 'list';

if ($action == 'list') {
    include ('projects_action/list.php');
} elseif ($action == 'delete') {
    include ('projects_action/delete.php');
} elseif ($action == 'edit') {
    include ('projects_action/edit.php');
} elseif ($action == 'new') {
    include ('projects_action/new.php');
} elseif ($action == 'show') {
    include ('projects_action/show.php');
}