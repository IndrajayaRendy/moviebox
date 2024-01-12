<!DOCTYPE html>
<html lang="en">
   <head>
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
         background-color: #000000; /* background color */
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
         background-color: #000000; /* background color */
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
         <a href="#">Home</a>
         <a href="movie.php" class="Movie-link">Movies</a>
         <a href="login.php" class="login-link">Login</a>
      </nav>
      <h2>Now Showing</h2>
      <section>
         <article>
            <h3>Siksa Neraka</h3>
            <p>Genre: Horror</p>
            <img src="film2.jpeg" alt="Siksa Neraka">
            <p>When your mouth can't speak. The sins in the world are witnesses that produce the painful torment of Hell.</p>
         </article>
         <article>
            <h3>Ancika 1995</h3>
            <p>Genre: Romance </p>
            <img src="film3.jpeg" alt="1995">
            <p>Dilan and Ancika Mehrunisa Rabu form a close friendship that blossoms into love, ultimately evolving into a romantic relationship.</p>
         </article>
         <article>
            <h3>13 Bom di Jakarta</h3>
            <p>Genre: Action</p>
            <img src="film4.jpeg" alt="13 Bom di Jakarta">
            <p>An organization races against time to uncover the mastermind behind the placement of 13 bombs in Jakarta before the city falls into chaos.</p>
         </article>
         <article>
            <h3>Aquaman And The Lost Kingdom</h3>
            <p>Genre: Action, Fantasy</p>
            <img src="film1.jpeg" alt="Aquaman And The Lost Kingdom">
            <p>To defend Atlantis, Aquaman forges an alliance with his imprisoned brother. They must protect the kingdom.</p>
         </article>
      </section>
      <footer>
         <p>&copy; 2024 Movie Box. All rights reserved.</p>
      </footer>
   </body>
</html>
