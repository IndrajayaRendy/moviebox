<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: datatable.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM movies WHERE id = $id");

}

header("Location: datatable.php");
exit();
?>
