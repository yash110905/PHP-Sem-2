<?php
include 'config.php';
if(!isset($_SESSION['user_id']) || $_SESSION['is_admin'] != 1){ header("Location: login.php"); exit; }
$id = $_GET['id'];
$conn->query("DELETE FROM items WHERE id=$id");
header("Location: index.php");
?>
