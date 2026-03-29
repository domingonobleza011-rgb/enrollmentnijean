<?php
require_once 'classes/conn.php';
require_once 'classes/main.class.php';

$eusebia = new EUSEBIAClass();
$id = $_GET['id'] ?? null;
$action = $_GET['action'] ?? null;

if ($id && $action) {
    $status = ($action === 'archive') ? 1 : 0;
    // Call the function we just created
    if ($eusebia->archiveRecord('students', $id, $status)) {
        header("Location: dashboard.php?msg=success");
    } else {
        header("Location: dashboard.php?msg=error");
    }
}
?>