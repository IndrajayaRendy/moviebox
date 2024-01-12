<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $genre = $_POST['genre'];
    $release_date = $_POST['release_date'];
    $director = $_POST['director'];



    $sql = "UPDATE movies SET title=?, genre=?, release_date=?, director=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $genre, $release_date, $director, $id);
    $stmt->execute();
    $stmt->close();

    // Redirect ke halaman index setelah proses edit selesai
    header("Location: datatable.php");
    exit();
}

// Ambil data film berdasarkan ID yang dikirim melalui parameter GET
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM movies WHERE id = $id");

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        // Redirect ke halaman index jika film dengan ID yang diberikan tidak ditemukan
        header("Location: datatable.php");
        exit();
    }
} else {
    // Redirect ke halaman index jika ID tidak di-set dalam permintaan GET
    header("Location: datatable.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Movie</title>
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
                <h2>Edit Movie</h2>
                <br>
                <form action="edit.php" method="POST">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label>Title:</label>
                        <input type="text" class="form-control" name="title" value="<?php echo $row['title']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Genre:</label>
                        <input type="text" class="form-control" name="genre" value="<?php echo $row['genre']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Release Date:</label>
                        <input type="date" class="form-control" name="release_date" value="<?php echo $row['release_date']; ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Director:</label>
                        <input type="text" class="form-control" name="director" value="<?php echo $row['director']; ?>">
                    </div>
                    <button type="submit" class="btn btn-primary">Update Movie</button>
                    <a href="datatable.php" class="btn btn-danger">Back</a>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
