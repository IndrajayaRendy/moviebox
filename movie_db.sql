-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Jan 2024 pada 10.39
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `genre` varchar(255) NOT NULL,
  `release_date` date DEFAULT NULL,
  `director` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `movies`
--

INSERT INTO `movies` (`id`, `title`, `genre`, `release_date`, `director`, `created_at`, `updated_at`) VALUES
(1, 'The Avengers', 'Action, Adventure, Sci-Fi', '2012-05-04', 'Joss Whedon', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(2, 'Jurassic Park', 'Action, Adventure, Sci-Fi', '1993-06-11', 'Steven Spielberg', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(3, 'Titanic', 'Drama, Romance', '1997-12-19', 'James Cameron', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(5, 'The Lion King', 'Animation, Adventure, Drama', '1994-06-15', 'Roger Allers, Rob Minkoff', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(6, 'Harry Potter and the Sorcerer\'s Stone', 'Adventure, Family, Fantasy', '2001-11-16', 'Chris Columbus', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(8, 'The Incredibles', 'Animation, Action, Adventure', '2004-11-05', 'Brad Bird', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(9, 'The Terminator', 'Action, Sci-Fi', '1984-10-26', 'James Cameron', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(10, 'The Shawshank Redemption', 'Drama', '1994-09-23', 'Frank Darabont', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(11, 'The Dark Knight', 'Action, Crime, Drama', '2008-07-18', 'Christopher Nolan', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(12, 'Pulp Fiction', 'Crime, Drama', '1994-10-14', 'Quentin Tarantino', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(14, 'Inception', 'Action, Adventure, Sci-Fi', '2010-07-16', 'Christopher Nolan', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(15, 'The Matrix', 'Action, Sci-Fi', '1999-03-31', 'Lana Wachowski, Lilly Wachowski', '2023-12-21 16:06:38', '2023-12-21 16:06:38'),
(16, 'Power Ranger', 'metal', '2024-01-18', 'Boy', '2024-01-05 15:34:21', '2024-01-05 15:34:21'),
(17, 'Surat Cinta Untuk Starla', 'Romantic', '2024-01-13', 'Boyy', '2024-01-05 16:00:53', '2024-01-05 16:00:53'),
(19, 'Ironman', 'Action', '2024-01-11', 'Boyy', '2024-01-07 06:51:27', '2024-01-07 06:51:27'),
(24, '13 Bom di Jakarta', 'Action', '2023-12-02', 'Angga Dwimas Sasongko', '2024-01-10 02:47:14', '2024-01-10 02:47:14'),
(25, 'Siksa Neraka', 'Horror', '2023-12-15', 'Anggy Umbara', '2024-01-10 02:48:06', '2024-01-10 02:48:06'),
(26, 'Ancika 1995', 'Rom', '2024-01-25', 'Benni Setiawan', '2024-01-10 02:48:47', '2024-01-10 02:48:47'),
(27, 'Aquaman And The Lost Kingdom', 'Action, Fantasy', '2023-11-15', 'Jason Momoa', '2024-01-10 02:50:05', '2024-01-10 02:50:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'kaka', '$2y$10$u/NNbRhahWTI82WObnZ09O9cTZJj84Umn0QtgZjatpEgudkI9VUGy', 'admin'),
(2, 'boy', '$2y$10$bDt4EeQrxcOwAt.m080ut.1EvHcjrBXS6FD5CwBSlryAWZov.2yO.', 'user'),
(4, 'ifam', '$2y$10$NNhySY/jzZIa0C/zprmI4.eMAbM576/n1GD4CMDGjz4IyIhr56MK2', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
