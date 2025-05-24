-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2025 at 06:58 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_setting`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`id`, `image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'banners/8KnH7TvdsA9S2VtKgqn9amz807b07jhUgWFf48VJ.png', 1, '2025-05-15 19:27:20', '2025-05-15 20:09:18'),
(2, 'banners/XOxUX0FN5g72uu8XaGHuHpv8hhOhc3YpZGVrCZXw.png', 1, '2025-05-16 00:20:25', '2025-05-16 00:20:25'),
(4, 'banners/egqr1tOOFm2qymVzWYZM4aVUHR3venbSmPbzvOnx.png', 1, '2025-05-16 01:31:15', '2025-05-18 18:22:30');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `jabatan` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `nowa` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `foto`, `nama`, `jabatan`, `email`, `nowa`, `created_at`, `updated_at`) VALUES
(1, 'contacts/bDtv9ZNrc20S3w8HdnDlKev5tqvoKyhQ5i6ols1w.jpg', 'Fauzan Nashiruddin', 'manajer', 'admin@gmail.com', '628535205423', '2025-05-15 19:58:32', '2025-05-15 20:05:03'),
(2, 'contacts/HTHcWxTvhol5I1gP9iKn6ppHGZMTukbLR1PoU6oo.jpg', 'Rumah Modern', 'manajer', 'fauzannashiruddin50@gmail.com', '628535205423', '2025-05-15 20:08:03', '2025-05-15 20:08:03');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_05_07_031348_create_property_types_table', 1),
(6, '2025_05_07_031435_create_properties_table', 1),
(7, '2025_05_15_030045_create_testimonis_table', 1),
(8, '2025_05_15_080000_create_banners_table', 1),
(9, '2025_05_16_013444_create_portofolios_table', 1),
(10, '2025_05_16_023508_create_contacts_table', 2),
(11, '2024_03_19_000000_add_role_to_users_table', 3),
(12, '2024_05_18_000001_add_alamat_to_users_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `portofolios`
--

CREATE TABLE `portofolios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `pemilik` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `portofolios`
--

INSERT INTO `portofolios` (`id`, `gambar`, `judul`, `pemilik`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'portofolios/Mv3lnXNAO2tJVsZSAwADGq0vdkEaCsUwCMo0i1Dx.jpg', 'Rumah Modern', 'sumantos', 'Jl. Kenanga Raya No. 25, RT 04/RW 06\r\nKelurahan Berkoh, Kecamatan Purwokerto Selatan\r\nKabupaten Banyumas', '2025-05-15 19:27:33', '2025-05-18 21:41:20');

-- --------------------------------------------------------

--
-- Table structure for table `properties`
--

CREATE TABLE `properties` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `images` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `address` text NOT NULL,
  `city` varchar(255) NOT NULL,
  `province` varchar(255) NOT NULL,
  `kecamatan` varchar(255) DEFAULT NULL,
  `price` varchar(255) NOT NULL,
  `type_id` bigint(20) UNSIGNED NOT NULL,
  `status` enum('Dijual','Disewa') NOT NULL,
  `bedrooms` int(11) NOT NULL,
  `bathrooms` int(11) NOT NULL,
  `area_size` int(11) NOT NULL,
  `certificate_type` varchar(255) DEFAULT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT 0,
  `is_verified` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `properties`
--

INSERT INTO `properties` (`id`, `user_id`, `images`, `title`, `description`, `address`, `city`, `province`, `kecamatan`, `price`, `type_id`, `status`, `bedrooms`, `bathrooms`, `area_size`, `certificate_type`, `is_delete`, `is_verified`, `created_at`, `updated_at`) VALUES
(1, 1, 'fd3d409f-1abf-4bc1-b22a-8ef6e70d8262.jpg|73CfZH90NS055pgCxgU5FuXI1fRm0AzoS5NBqi4g.jpg|CpMryLcqm2LWslZu29xbI7eX6t5LVG2TVnLA5eHA.jpg|rkoBvpPnicZLlrC4okBDU0fksVKe2GrCkHEx1sFc.jpg', 'Rumah Modern', '<p class=\"\" data-start=\"101\" data-end=\"370\">Temukan kenyamanan tinggal di hunian bergaya klasik yang menawan ini, berlokasi strategis di <strong data-start=\"194\" data-end=\"228\">Nusa Tenggara Barat, Kota Bima</strong>. Rumah ini menghadirkan kesan hangat dan bersih dengan eksterior putih, jendela besar berjajar rapi, serta taman depan yang asri dan terawat.</p>\r\n<p class=\"\" data-start=\"372\" data-end=\"441\">Properti ini memiliki luas bangunan <strong data-start=\"408\" data-end=\"421\">12.234 m&sup2;</strong>, dilengkapi dengan:</p>\r\n<ul data-start=\"442\" data-end=\"577\">\r\n<li class=\"\" data-start=\"442\" data-end=\"484\">\r\n<p class=\"\" data-start=\"444\" data-end=\"484\"><strong data-start=\"444\" data-end=\"461\">3 Kamar Tidur</strong> yang nyaman dan terang</p>\r\n</li>\r\n<li class=\"\" data-start=\"485\" data-end=\"511\">\r\n<p class=\"\" data-start=\"487\" data-end=\"511\"><strong data-start=\"487\" data-end=\"504\">3 Kamar Mandi</strong> modern</p>\r\n</li>\r\n<li class=\"\" data-start=\"512\" data-end=\"550\">\r\n<p class=\"\" data-start=\"514\" data-end=\"550\"><strong data-start=\"514\" data-end=\"533\">Garasi tertutup</strong> di samping rumah</p>\r\n</li>\r\n<li class=\"\" data-start=\"551\" data-end=\"577\">\r\n<p class=\"\" data-start=\"553\" data-end=\"577\"><strong data-start=\"553\" data-end=\"570\">Tipe properti</strong>: Villa</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p class=\"\" data-start=\"579\" data-end=\"798\">Rumah ini cocok untuk Anda yang mencari ketenangan dan suasana rumah keluarga yang harmonis. Keunikan desain rumah dengan jendela besar dan balkon mungil di lantai atas menambah karakter klasik dan elegan pada bangunan.</p>', 'NUSA TENGGARA BARAT, KOTA BIMA', '5272', '52', NULL, '50000000', 1, 'Dijual', 3, 3, 53, NULL, 0, 0, '2025-05-15 19:27:02', '2025-05-18 21:36:12'),
(3, 1, '8nqiJCOXoByjbCLkzZchd3PVRAldKW3qsoulXPV3.jpg|fLFLHttSSkRomfc7O3sWSWL5CAV5psgUkWNYZxHV.jpg|WeYPG7guCKLUBhsfSAAngQ8HxssqZ5nwfNXHsmCy.jpg|y2vQuMhIhCNE66uxQnbN96mzxLHnNuaVZn6bDRhn.jpg|SLoFsIVSseBbQf2It6ERMglt5cnmqn04je2qMJOs.jpg|OK4WFMFW6l3NjXP4TOVGEVEwczxeslgU8vm64xfp.jpg', 'Rumah Kota', '<p class=\"\" data-start=\"101\" data-end=\"370\">Temukan kenyamanan tinggal di hunian bergaya klasik yang menawan ini, berlokasi strategis di&nbsp;<strong data-start=\"194\" data-end=\"228\">Nusa Tenggara Barat, Kota Bima</strong>. Rumah ini menghadirkan kesan hangat dan bersih dengan eksterior putih, jendela besar berjajar rapi, serta taman depan yang asri dan terawat.</p>\r\n<p class=\"\" data-start=\"372\" data-end=\"441\">Properti ini memiliki luas bangunan&nbsp;<strong data-start=\"408\" data-end=\"421\">12.234 m&sup2;</strong>, dilengkapi dengan:</p>\r\n<ul data-start=\"442\" data-end=\"577\">\r\n<li class=\"\" data-start=\"442\" data-end=\"484\">\r\n<p class=\"\" data-start=\"444\" data-end=\"484\"><strong data-start=\"444\" data-end=\"461\">3 Kamar Tidur</strong>&nbsp;yang nyaman dan terang</p>\r\n</li>\r\n<li class=\"\" data-start=\"485\" data-end=\"511\">\r\n<p class=\"\" data-start=\"487\" data-end=\"511\"><strong data-start=\"487\" data-end=\"504\">3 Kamar Mandi</strong>&nbsp;modern</p>\r\n</li>\r\n<li class=\"\" data-start=\"512\" data-end=\"550\">\r\n<p class=\"\" data-start=\"514\" data-end=\"550\"><strong data-start=\"514\" data-end=\"533\">Garasi tertutup</strong>&nbsp;di samping rumah</p>\r\n</li>\r\n<li class=\"\" data-start=\"551\" data-end=\"577\">\r\n<p class=\"\" data-start=\"553\" data-end=\"577\"><strong data-start=\"553\" data-end=\"570\">Tipe properti</strong>: Villa</p>\r\n</li>\r\n</ul>\r\n<p>&nbsp;</p>\r\n<p class=\"\" data-start=\"579\" data-end=\"798\">Rumah ini cocok untuk Anda yang mencari ketenangan dan suasana rumah keluarga yang harmonis. Keunikan desain rumah dengan jendela besar dan balkon mungil di lantai atas menambah karakter klasik dan elegan pada bangunan.</p>', 'BALI, KOTA DENPASAR', '5171', '51', NULL, '2500000000', 1, 'Dijual', 5, 2, 43, NULL, 1, 0, '2025-05-18 19:30:45', '2025-05-18 21:38:36');

-- --------------------------------------------------------

--
-- Table structure for table `property_types`
--

CREATE TABLE `property_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `property_types`
--

INSERT INTO `property_types` (`id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Villa', '2025-05-15 19:26:41', '2025-05-18 19:27:28'),
(3, 'Rumah', '2025-05-18 19:29:08', '2025-05-18 19:29:08'),
(4, 'Apartemen', '2025-05-18 19:29:16', '2025-05-18 19:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `testimonis`
--

CREATE TABLE `testimonis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `pekerjaan` varchar(255) NOT NULL,
  `testimoni` text NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `testimonis`
--

INSERT INTO `testimonis` (`id`, `nama`, `pekerjaan`, `testimoni`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Jhon', 'Investor', '“Saya sangat puas beli rumah di Griya Asri Residence. Adminnya responsif, proses KPR dibantu sampai tuntas, dan unit rumahnya persis seperti di foto. Terima kasih sudah membantu mewujudkan rumah impian kami.”', 'testimonials/QgiVI5MNJ1H79UP3lEqwYxnRoNn0NdvmEhH31Dof.jpg', '2025-05-15 19:27:12', '2025-05-18 21:40:16'),
(2, 'budi', 'Pengusaha', '“Saya sangat puas beli rumah di Griya Asri Residence. Adminnya responsif, proses KPR dibantu sampai tuntas, dan unit rumahnya persis seperti di foto. Terima kasih sudah membantu mewujudkan rumah impian kami.”', 'testimonials/5LU7SSDNq13aFrOkjpPlO70TMsm4MxZBskyTkpqK.jpg', '2025-05-18 21:40:03', '2025-05-18 21:40:03');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL DEFAULT 'user',
  `alamat` varchar(255) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `alamat`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', 'user', NULL, NULL, '$2y$10$/0OA8NpBz/hrygk5zn3rBe23NAaGOeBwg6JsIUHncW.J.UK9PhzPG', NULL, NULL, NULL),
(45, 'Fauzan', 'fauzannashiruddin50@gmail.com', 'user', NULL, NULL, '$2y$10$exubMsTek6XJ3xf6PMGJnet36WnGCBkVrljlLi.ifCHLEa0VMiUKy', NULL, '2025-05-18 04:33:08', '2025-05-18 04:33:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `contacts_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `portofolios`
--
ALTER TABLE `portofolios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`),
  ADD KEY `properties_user_id_index` (`user_id`),
  ADD KEY `properties_type_id_index` (`type_id`);

--
-- Indexes for table `property_types`
--
ALTER TABLE `property_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonis`
--
ALTER TABLE `testimonis`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_name_unique` (`name`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `portofolios`
--
ALTER TABLE `portofolios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `property_types`
--
ALTER TABLE `property_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `testimonis`
--
ALTER TABLE `testimonis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `properties`
--
ALTER TABLE `properties`
  ADD CONSTRAINT `properties_type_id_foreign` FOREIGN KEY (`type_id`) REFERENCES `property_types` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `properties_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
