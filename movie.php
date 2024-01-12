<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <title>Movie Box</title>
      <!-- Call css bootstrap -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <!-- Add jQuery -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <!-- Add Javascript DataTables -->
      <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.js"></script>
      <!-- Add css DataTables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
      <script>
         $(document).ready( function () {
             $('#myTable').DataTable();
         } );
      </script>
      </script>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Movie Box</title>
      <style>
         body {
         font-family: 'Arial', sans-serif;
         margin: 0;
         padding: 0;
         background-color: #f8f8f8;
         display: flex;
         flex-direction: column;
         min-height: 100vh;
         }
         header {
         background-color: #000000; 
         color: white;
         text-align: center;
         padding: 1em;
         }
         nav {
         background-color: #ff6600;
         padding: 0.5em;
         text-align: center;
         }
         nav a {
         color: white;
         text-decoration: none;
         margin: 0 1em;
         font-weight: bold;
         transition: color 0.3s;
         }
         nav a:hover {
         color: #444; /* Yellow on hover */
         }
         section {
         flex: 1;
         padding: 1em;
         display: flex;
         flex-wrap: wrap;
         justify-content: space-around;
         }
         article {
         flex: 1;
         margin: 1em;
         background-color: #fff;
         padding: 1em;
         border-radius: 8px;
         box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
         transition: transform 0.3s;
         }
         article:hover {
         transform: scale(1.05);
         }
         article img {
         width: 100%;
         height: auto;
         border-radius: 8px;
         }
         footer {
         background-color: #000000; 
         color: white;
         text-align: center;
         padding: 1em;
         margin-top: auto;
         }
         h2 {
         text-align: center; /* Center text horizontally */
         }
      </style>
   </head>
   <body>
      <header>
      <img src="22222.png" class="rounded mx-auto d-block" alt="logo">
      </header>
      <nav>
         <a href="index.php" class="Index-link">Home</a>
         <a href="movie.php" class="Movie-link">Movies</a>
         <a href="login.php" class="login-link">Login</a>
      </nav>
      <br>
      <h2>Movie List</h2>
      </head>
      <body>
         <?php
            // Call file koneksi.php
            include_once("koneksi.php");
            // Retrieve all data from "movies"
            $sql = "SELECT * FROM movies";
            $result = $conn->query($sql);
            ?>
         <br>
         <br>

         <div class="col-md-12 col-md-offset-3">
         <div class="container" style="margin-bottom: 25px;">
            <div class="row" >
               <div class="col-md-12 col-md-offset-3">
                  <table id="myTable" class="table table-bordered">
                     <thead>
                        <tr>
                           <th>Title</th>
                           <th>Genre</th>
                           <th>Release Date</th>
                           <th>Director</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php  
                           while($data = mysqli_fetch_array($result)) {         
                               echo "<tr>";
                               echo "<td>".$data['title']."</td>";
                               echo "<td>".$data['genre']."</td>";
                               echo "<td>".$data['release_date']."</td>";
                               echo "<td>".$data['director']."</td>";    
                               echo "</tr>";
                           }
                           ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
         <footer>
            <p>&copy; 2024 Movie Box. All rights reserved.</p>
         </footer>
   </body>
</html>
