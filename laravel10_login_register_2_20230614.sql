-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2023 pada 13.45
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
-- Database: `laravel10_login_register_2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `google_account`
--

CREATE TABLE `google_account` (
  `google_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permission` enum('user','worker','admin') NOT NULL,
  `email` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `google_account`
--

INSERT INTO `google_account` (`google_id`, `name`, `permission`, `email`, `remember_token`, `created_at`, `updated_at`) VALUES
('100070725142610616365', 'Arya Sotya', 'user', 'aryasotya2003@gmail.com', NULL, '2023-06-01 02:09:20', '2023-06-01 02:09:20'),
('105005748369970929815', '12-ADITRIUTAMA- 2B MI', 'user', 'komangadi2313@gmail.com', NULL, '2023-06-05 04:26:04', '2023-06-05 04:26:04'),
('105374468511765573441', '20-ASTA-2B MI', 'user', 'wayanasta345@gmail.com', NULL, '2023-06-12 17:50:57', '2023-06-12 17:50:57'),
('107601711114323108703', 'Tech Drive', 'user', 'techdrive2003@gmail.com', NULL, '2023-06-01 02:09:56', '2023-06-01 02:09:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2023_05_20_080157_create_orders_table', 1),
(4, '2023_05_20_110140_pricing', 1),
(5, '2023_05_23_112416_google_account', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(255) NOT NULL,
  `item` text NOT NULL,
  `qty` int(11) NOT NULL,
  `price` bigint(20) NOT NULL,
  `total_price` bigint(20) NOT NULL,
  `service_status` enum('processing','ontheway','working','complete') NOT NULL,
  `worker` varchar(255) NOT NULL,
  `paid_status` enum('Unpaid','Paid') NOT NULL,
  `paymentToken` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `name`, `email`, `address`, `phone`, `item`, `qty`, `price`, `total_price`, `service_status`, `worker`, `paid_status`, `paymentToken`, `created_at`, `updated_at`) VALUES
(2, 'Arya Sotya', 'aryasotya2003@gmail.com', 'unud', '11111111111', 'bersih_rumah', 133, 40000, 5320000, 'complete', 'techdrive2003@gmail.com', 'Paid', '09041d5d-7667-463c-8446-ac4cfae9841c', '2023-05-02 03:09:28', '2023-06-13 03:42:34'),
(3, 'Arya Sotya', 'aryasotya2003@gmail.com', 'bali', '11111111111', 'tukang_kebun', 14, 50000, 700000, 'complete', 'techdrive2003@gmail.com', 'Paid', '09041d5d-7667-463c-8446-ac4cfae9841c', '2023-06-03 00:11:08', '2023-06-13 03:42:34'),
(4, 'Arya Sotya', 'aryasotya2003@gmail.com', 'bali', '11111111111', 'bersih_rumah', 1, 40000, 40000, 'complete', 'techdrive2003@gmail.com', 'Paid', '09041d5d-7667-463c-8446-ac4cfae9841c', '2023-06-03 02:08:54', '2023-06-13 03:42:34'),
(9, 'Arya Sotya', 'aryasotya2003@gmail.com', 'unud', '11111111111', 'bersih_rumah', 15, 40000, 600000, 'complete', 'techdrive2003@gmail.com', 'Paid', '09041d5d-7667-463c-8446-ac4cfae9841c', '2023-06-06 18:50:12', '2023-06-13 03:42:34'),
(120230613114233, 'Arya Sotya', 'aryasotya2003@gmail.com', 'politeknik', '11111111111', 'perbaikan_elektronik', 1, 70000, 70000, 'complete', 'techdrive2003@gmail.com', 'Paid', '09041d5d-7667-463c-8446-ac4cfae9841c', '2023-06-13 03:42:33', '2023-06-13 03:44:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pricing`
--

CREATE TABLE `pricing` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pricing`
--

INSERT INTO `pricing` (`id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(1, 'bersih_rumah', 40000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(2, 'perbaikan_elektronik', 70000, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(3, 'tukang_kebun', 50000, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `google_id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `no_telp` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('active','working') NOT NULL,
  `permission` enum('user','worker','admin') NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `google_id`, `name`, `email`, `no_telp`, `password`, `status`, `permission`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, '100070725142610616365', 'Arya Sotya', 'aryasotya2003@gmail.com', '11111111111', '$2y$10$P4vN5b7xmTlT7zmrvFZDYuawnkKQKPjNEAHs4tjBnpz3CsdYFXnlC', 'active', 'user', NULL, '2023-06-01 02:09:25', '2023-06-01 02:09:25'),
(2, '107601711114323108703', 'Tech Drive', 'techdrive2003@gmail.com', '1111111111', '$2y$10$rnpHH8ip5RgyS9a94WHltuC6tHWi6zuGaqjYPDeOLnznW2TVhXvZO', 'active', 'worker', NULL, '2023-06-01 02:10:02', '2023-06-13 03:44:01'),
(3, '105374468511765573441', '20-ASTA-2B MI', 'wayanasta345@gmail.com', '111111111', '$2y$10$Yv63NWuOvy9xEjrlff3Yi.977Y4lslwQlnm37bJfVnMiHA2ZHvGnG', 'active', 'user', NULL, '2023-06-12 17:51:37', '2023-06-12 17:51:37');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `google_account`
--
ALTER TABLE `google_account`
  ADD UNIQUE KEY `google_account_google_id_unique` (`google_id`),
  ADD UNIQUE KEY `google_account_email_unique` (`email`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `pricing`
--
ALTER TABLE `pricing`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pricing`
--
ALTER TABLE `pricing`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
