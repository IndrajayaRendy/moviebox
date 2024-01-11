

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Movie Box</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
    <style>
        body {
            background-color: ##f8f8f8;
        }
        table#myTable thead {
            background-color: #ff6600;}
    </style>
    
</head>
<body style=background-color: #ff6600;>
<?php
session_start();
require_once 'koneksi.php';

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

$role = $_SESSION['role'];

$sql = "SELECT * FROM movies";
$result = $conn->query($sql);
?>

<div class="container mx-10" style="max-width: 1450px">

        <div class="row">
            <div class="col-md-12 col-md-offset-3">
            <table class="table table-bordered">
            <img src="11.png" class="rounded mx-auto d-block" alt="logo">

        <h2>Movie List</h2> 
        <?php
                    if ($role === 'admin') {
                        echo "<a href='create.php' class='btn btn-primary mb-3'><i class='fa fa-plus'></i> Add Movie</a>";
                    }
                    ?>
                    <a href="logout.php" class="btn btn-danger float-right"><i class='fa fa-sign-out'></i> Logout</a>
                    <table id="myTable" class="table table-hover">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Release Date</th>
                    <th>Director</th>
                    <?php
                        if ($_SESSION['role'] == 'admin') {
                            echo '<th>Action</th>';
                        }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>{$row['title']}</td>";
                        echo "<td>{$row['genre']}</td>";
                        echo "<td>{$row['release_date']}</td>";
                        echo "<td>{$row['director']}</td>";
                        if ($_SESSION['role'] == 'admin') {
                            echo "<td>
                            <a href='edit.php?id={$row['id']}' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                            <a href='delete.php?id={$row['id']}' class='btn btn-danger' onclick='return confirmDelete()'><i class='fa fa-trash'></i> Delete</a>
                        </td>";
                    }
                    echo "</tr>";
                    }
                ?>
            </tbody>
            <script>
             function confirmDelete() {
            return confirm("Are you sure you want to delete this movie?");
                }
            </script>
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Add Javascript DataTables -->
<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>

<script>
        $(document).ready( function () {
            $('#myTable').DataTable();
        } );
</script>
</body>
</html>
