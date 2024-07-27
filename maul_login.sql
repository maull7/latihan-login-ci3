-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Jul 2024 pada 06.55
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maul_login`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'rehan', 'rehanmaulanaa21@gmail.com', 'default.jpg', '$2y$10$MsFsnLAxWMQK4P11c8vtNOrAPJ2fDWYKcVr9LDmVvpl1yy6HUrJTu', 2, 1, 1719363196),
(2, 'tengku', 'tukull21@gmail.com', 'default.jpg', '$2y$10$.QnPPaaB20QsECPP1N8IyuIvEvLii3CG0qLSS6ckyY6kRZcaefRP2', 2, 1, 1719363734),
(3, 'anggit', 'anggit@gmail.com', 'default.jpg', '$2y$10$j6lphKnNiyphJdpBauI7su.FfdTu0/az4IdkJYf6CCkxKPZGwX6Fa', 2, 1, 1719363844),
(4, 'ghandur', 'ghandur@gmail.com', 'default.jpg', '$2y$10$dPhfFXEk8v0G4PFdLiXjKue.i/sgap1gRT6MB2lM/CWChHdqzt8VK', 2, 1, 1719382846),
(5, 'iko', 'ikoaljeriko@gmail.com', 'default.jpg', '$2y$10$rzPwD.mMNPx7Xt780.65I.A0fiv2zW1Lm09obGqz2FnlXiHSAUuB.', 2, 0, 1719382875),
(6, 'rehan', 'maul@gmail.com', 'pramuka.png', '$2y$10$qNPvkRafmyv6wExeS02T2ui1Tg1ghVcJ4gF/5JRysMgxyYMblPq/C', 1, 1, 1719444764),
(7, 'nnrehan', 'rehan@gmail.com', 'default.jpg', '$2y$10$eWXOstzRf95AKl00WZ8ZeeHZXB96upiuOXd1KfZ9/TDso5CC53OE6', 2, 0, 1719812974),
(8, 'maulana', 'jsjhoihed@gmail.com', 'default.jpg', '$2y$10$K/stKIZ9eiR6Dprpli0AyOlkrUIoUcUTMfsCHWc6837qRGGj312um', 2, 0, 1722011591),
(9, 'rehann', 'pindi@gmail.com', 'default.jpg', '$2y$10$vB/DElE7NGgGmkSVfdLL4.e96C84j.iwSCeMAKsOsP2w2QyOCCzfS', 2, 0, 1722011631),
(10, 'rehannn', 'mmm@gmail.com', 'default.jpg', '$2y$10$I5PqzUxfrRy7hdvngEtqX.jcDkNWSr.rRpNSVSxMGuCJdYWihMvxC', 1, 1, 1722011697);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(5, 1, 4),
(6, 1, 8),
(7, 1, 8),
(8, 2, 8),
(10, 1, 8),
(11, 1, 9),
(14, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`) VALUES
(1, 'admin'),
(2, 'user'),
(3, 'menu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'administrator'),
(2, 'member'),
(3, 'tes');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `sub_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `tittle` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`sub_id`, `menu_id`, `tittle`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'dashboard', 'admin', 'fas fa-fw fa-tachometer-alt', 1),
(2, 2, ' My profilee', ' user', ' fas fa-fw fa-user-alt', 1),
(3, 2, 'edit profile', 'user/edit', 'fas fa-fw fa-user-edit', 1),
(4, 3, 'Menu Management', 'menu', 'fas fa-fw fa-folder', 1),
(6, 3, 'Sub Menu Management', 'menu/submenu', 'fas fa-fw fa-folder-open', 1),
(9, 1, 'role', 'admin/role', 'fas fa-fw fa-user-tie', 1),
(10, 2, 'change password', 'user/change', 'fas fa-fw fa-key', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`sub_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `sub_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
