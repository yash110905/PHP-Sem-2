<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM subscribers WHERE id=$id";
    $conn->query($sql);
}

header("Location: view.php");
exit();
?>
