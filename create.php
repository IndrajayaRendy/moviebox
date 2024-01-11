<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];
    $director = $_POST['director'];

    $sql = "INSERT INTO movies (title, genre, release_date, director) VALUES ('$title', '$genre', '$release_date', '$director')";
    $conn->query($sql);

    
    header("Location: datatable.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie CRUD</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background-color: #ff6600;}
    </style>
</head>
<body>
<div class="container mt-5">
<div class="card mx-auto" style="max-width: 600px;">
        <div class="card-header">
        <h2>Add Movie</h2>
        <br>
        <form action="create.php" method="POST">
            <div class="form-group">
                <label>Title:</label>
                <input type="text" class="form-control" name="title" required>
            </div>
            <div class="form-group">
                <label>Genre:</label>
                <input type="text" class="form-control" name="genre" required>
            </div>
            <div class="form-group">
                <label>Release Date:</label>
                <input type="date" class="form-control" name="release_date" required>
            </div>
            <div class="form-group">
                <label>Director:</label>
                <input type="text" class="form-control" name="director">
            </div>
            <button type="submit" class="btn btn-primary">Add Movie</button>
            <a href="datatable.php" class="btn btn-danger">Back</a>
        </form>
    </div>
</body>
</html>
