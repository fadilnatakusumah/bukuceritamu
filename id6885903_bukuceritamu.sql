-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 31, 2018 at 03:22 PM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `id6885903_bukuceritamu`
--

-- --------------------------------------------------------

--
-- Table structure for table `assets`
--

CREATE TABLE `assets` (
  `id` int(10) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `blockedwords`
--

CREATE TABLE `blockedwords` (
  `id` int(10) UNSIGNED NOT NULL,
  `blocked_word` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `profile_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cover` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `finished` tinyint(1) NOT NULL DEFAULT '0',
  `approved` tinyint(1) NOT NULL DEFAULT '0',
  `denied` tinyint(1) NOT NULL DEFAULT '0',
  `explanation` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `canvas`
--

CREATE TABLE `canvas` (
  `id` int(10) UNSIGNED NOT NULL,
  `book_id` int(11) NOT NULL,
  `json_data` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Latar Belakang', '2018-08-30 07:30:22', '2018-08-30 07:30:22'),
(2, 'Hewan', '2018-08-30 07:33:38', '2018-08-30 07:33:38');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_05_27_004259_create_profiles_table', 1),
(4, '2018_05_27_004342_create_assets_table', 1),
(5, '2018_05_27_004425_create_canvas_table', 1),
(6, '2018_05_27_004539_create_categories_table', 1),
(7, '2018_05_27_004618_create_books_table', 1),
(8, '2018_07_30_101144_create_suggestions_table', 1),
(9, '2018_08_05_225347_create_blockedwords_table', 1),
(10, '2018_08_06_000752_create_stopwords_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `avatar`, `username`, `address`, `created_at`, `updated_at`) VALUES
(1, 1, 'assets/avatars/default.png', 'admin', 'Jl. Kaliurang', '2018-08-30 05:01:51', '2018-08-30 05:01:51');

-- --------------------------------------------------------

--
-- Table structure for table `stopwords`
--

CREATE TABLE `stopwords` (
  `id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `words` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `stopwords`
--

INSERT INTO `stopwords` (`id`, `created_at`, `updated_at`, `words`) VALUES
(1, NULL, NULL, 'ada'),
(2, NULL, NULL, 'adalah'),
(3, NULL, NULL, 'adanya'),
(4, NULL, NULL, 'adapun'),
(5, NULL, NULL, 'agak'),
(6, NULL, NULL, 'agaknya'),
(7, NULL, NULL, 'agar'),
(8, NULL, NULL, 'akan'),
(9, NULL, NULL, 'akankah'),
(10, NULL, NULL, 'akhir'),
(11, NULL, NULL, 'akhiri'),
(12, NULL, NULL, 'akhirnya'),
(13, NULL, NULL, 'aku'),
(14, NULL, NULL, 'akulah'),
(15, NULL, NULL, 'amat'),
(16, NULL, NULL, 'amatlah'),
(17, NULL, NULL, 'anda'),
(18, NULL, NULL, 'andalah'),
(19, NULL, NULL, 'antar'),
(20, NULL, NULL, 'antara'),
(21, NULL, NULL, 'antaranya'),
(22, NULL, NULL, 'apa'),
(23, NULL, NULL, 'apaan'),
(24, NULL, NULL, 'apabila'),
(25, NULL, NULL, 'apakah'),
(26, NULL, NULL, 'apalagi'),
(27, NULL, NULL, 'apatah'),
(28, NULL, NULL, 'artinya'),
(29, NULL, NULL, 'asal'),
(30, NULL, NULL, 'asalkan'),
(31, NULL, NULL, 'atas'),
(32, NULL, NULL, 'atau'),
(33, NULL, NULL, 'ataukah'),
(34, NULL, NULL, 'ataupun'),
(35, NULL, NULL, 'awal'),
(36, NULL, NULL, 'awalnya'),
(37, NULL, NULL, 'bagai'),
(38, NULL, NULL, 'bagaikan'),
(39, NULL, NULL, 'bagaimana'),
(40, NULL, NULL, 'bagaimanakah'),
(41, NULL, NULL, 'bagaimanapun'),
(42, NULL, NULL, 'bagi'),
(43, NULL, NULL, 'bagian'),
(44, NULL, NULL, 'bahkan'),
(45, NULL, NULL, 'bahwa'),
(46, NULL, NULL, 'bahwasanya'),
(47, NULL, NULL, 'baik'),
(48, NULL, NULL, 'bakal'),
(49, NULL, NULL, 'bakalan'),
(50, NULL, NULL, 'balik'),
(51, NULL, NULL, 'banyak'),
(52, NULL, NULL, 'bapak'),
(53, NULL, NULL, 'baru'),
(54, NULL, NULL, 'bawah'),
(55, NULL, NULL, 'beberapa'),
(56, NULL, NULL, 'begini'),
(57, NULL, NULL, 'beginian'),
(58, NULL, NULL, 'beginikah'),
(59, NULL, NULL, 'beginilah'),
(60, NULL, NULL, 'begitu'),
(61, NULL, NULL, 'begitukah'),
(62, NULL, NULL, 'begitulah'),
(63, NULL, NULL, 'begitupun'),
(64, NULL, NULL, 'bekerja'),
(65, NULL, NULL, 'belakang'),
(66, NULL, NULL, 'belakangan'),
(67, NULL, NULL, 'belum'),
(68, NULL, NULL, 'belumlah'),
(69, NULL, NULL, 'benar'),
(70, NULL, NULL, 'benarkah'),
(71, NULL, NULL, 'benarlah'),
(72, NULL, NULL, 'berada'),
(73, NULL, NULL, 'berakhir'),
(74, NULL, NULL, 'berakhirlah'),
(75, NULL, NULL, 'berakhirnya'),
(76, NULL, NULL, 'berapa'),
(77, NULL, NULL, 'berapakah'),
(78, NULL, NULL, 'berapalah'),
(79, NULL, NULL, 'berapapun'),
(80, NULL, NULL, 'berarti'),
(81, NULL, NULL, 'berawal'),
(82, NULL, NULL, 'berbagai'),
(83, NULL, NULL, 'berdatangan'),
(84, NULL, NULL, 'beri'),
(85, NULL, NULL, 'berikan'),
(86, NULL, NULL, 'berikut'),
(87, NULL, NULL, 'berikutnya'),
(88, NULL, NULL, 'berjumlah'),
(89, NULL, NULL, 'berkali-kali'),
(90, NULL, NULL, 'berkata'),
(91, NULL, NULL, 'berkehendak'),
(92, NULL, NULL, 'berkeinginan'),
(93, NULL, NULL, 'berkenaan'),
(94, NULL, NULL, 'berlainan'),
(95, NULL, NULL, 'berlalu'),
(96, NULL, NULL, 'berlangsung'),
(97, NULL, NULL, 'berlebihan'),
(98, NULL, NULL, 'bermacam'),
(99, NULL, NULL, 'bermacam-macam'),
(100, NULL, NULL, 'bermaksud'),
(101, NULL, NULL, 'bermula'),
(102, NULL, NULL, 'bersama'),
(103, NULL, NULL, 'bersama-sama'),
(104, NULL, NULL, 'bersiap'),
(105, NULL, NULL, 'bersiap-siap'),
(106, NULL, NULL, 'bertanya'),
(107, NULL, NULL, 'bertanya-tanya'),
(108, NULL, NULL, 'berturut'),
(109, NULL, NULL, 'berturut-turut'),
(110, NULL, NULL, 'bertutur'),
(111, NULL, NULL, 'berujar'),
(112, NULL, NULL, 'berupa'),
(113, NULL, NULL, 'besar'),
(114, NULL, NULL, 'betul'),
(115, NULL, NULL, 'betulkah'),
(116, NULL, NULL, 'biasa'),
(117, NULL, NULL, 'biasanya'),
(118, NULL, NULL, 'bila'),
(119, NULL, NULL, 'bilakah'),
(120, NULL, NULL, 'bisa'),
(121, NULL, NULL, 'bisakah'),
(122, NULL, NULL, 'boleh'),
(123, NULL, NULL, 'bolehkah'),
(124, NULL, NULL, 'bolehlah'),
(125, NULL, NULL, 'buat'),
(126, NULL, NULL, 'bukan'),
(127, NULL, NULL, 'bukankah'),
(128, NULL, NULL, 'bukanlah'),
(129, NULL, NULL, 'bukannya'),
(130, NULL, NULL, 'bulan'),
(131, NULL, NULL, 'bung'),
(132, NULL, NULL, 'cara'),
(133, NULL, NULL, 'caranya'),
(134, NULL, NULL, 'cukup'),
(135, NULL, NULL, 'cukupkah'),
(136, NULL, NULL, 'cukuplah'),
(137, NULL, NULL, 'cuma'),
(138, NULL, NULL, 'dahulu'),
(139, NULL, NULL, 'dalam'),
(140, NULL, NULL, 'dan'),
(141, NULL, NULL, 'dapat'),
(142, NULL, NULL, 'dari'),
(143, NULL, NULL, 'daripada'),
(144, NULL, NULL, 'datang'),
(145, NULL, NULL, 'dekat'),
(146, NULL, NULL, 'demi'),
(147, NULL, NULL, 'demikian'),
(148, NULL, NULL, 'demikianlah'),
(149, NULL, NULL, 'dengan'),
(150, NULL, NULL, 'depan'),
(151, NULL, NULL, 'di'),
(152, NULL, NULL, 'dia'),
(153, NULL, NULL, 'diakhiri'),
(154, NULL, NULL, 'diakhirinya'),
(155, NULL, NULL, 'dialah'),
(156, NULL, NULL, 'diantara'),
(157, NULL, NULL, 'diantaranya'),
(158, NULL, NULL, 'diberi'),
(159, NULL, NULL, 'diberikan'),
(160, NULL, NULL, 'diberikannya'),
(161, NULL, NULL, 'dibuat'),
(162, NULL, NULL, 'dibuatnya'),
(163, NULL, NULL, 'didapat'),
(164, NULL, NULL, 'didatangkan'),
(165, NULL, NULL, 'digunakan'),
(166, NULL, NULL, 'diibaratkan'),
(167, NULL, NULL, 'diibaratkannya'),
(168, NULL, NULL, 'diingat'),
(169, NULL, NULL, 'diingatkan'),
(170, NULL, NULL, 'diinginkan'),
(171, NULL, NULL, 'dijawab'),
(172, NULL, NULL, 'dijelaskan'),
(173, NULL, NULL, 'dijelaskannya'),
(174, NULL, NULL, 'dikarenakan'),
(175, NULL, NULL, 'dikatakan'),
(176, NULL, NULL, 'dikatakannya'),
(177, NULL, NULL, 'dikerjakan'),
(178, NULL, NULL, 'diketahui'),
(179, NULL, NULL, 'diketahuinya'),
(180, NULL, NULL, 'dikira'),
(181, NULL, NULL, 'dilakukan'),
(182, NULL, NULL, 'dilalui'),
(183, NULL, NULL, 'dilihat'),
(184, NULL, NULL, 'dimaksud'),
(185, NULL, NULL, 'dimaksudkan'),
(186, NULL, NULL, 'dimaksudkannya'),
(187, NULL, NULL, 'dimaksudnya'),
(188, NULL, NULL, 'diminta'),
(189, NULL, NULL, 'dimintai'),
(190, NULL, NULL, 'dimisalkan'),
(191, NULL, NULL, 'dimulai'),
(192, NULL, NULL, 'dimulailah'),
(193, NULL, NULL, 'dimulainya'),
(194, NULL, NULL, 'dimungkinkan'),
(195, NULL, NULL, 'dini'),
(196, NULL, NULL, 'dipastikan'),
(197, NULL, NULL, 'diperbuat'),
(198, NULL, NULL, 'diperbuatnya'),
(199, NULL, NULL, 'dipergunakan'),
(200, NULL, NULL, 'diperkirakan'),
(201, NULL, NULL, 'diperlihatkan'),
(202, NULL, NULL, 'diperlukan'),
(203, NULL, NULL, 'diperlukannya'),
(204, NULL, NULL, 'dipersoalkan'),
(205, NULL, NULL, 'dipertanyakan'),
(206, NULL, NULL, 'dipunyai'),
(207, NULL, NULL, 'diri'),
(208, NULL, NULL, 'dirinya'),
(209, NULL, NULL, 'disampaikan'),
(210, NULL, NULL, 'disebut'),
(211, NULL, NULL, 'disebutkan'),
(212, NULL, NULL, 'disebutkannya'),
(213, NULL, NULL, 'disini'),
(214, NULL, NULL, 'disinilah'),
(215, NULL, NULL, 'ditambahkan'),
(216, NULL, NULL, 'ditandaskan'),
(217, NULL, NULL, 'ditanya'),
(218, NULL, NULL, 'ditanyai'),
(219, NULL, NULL, 'ditanyakan'),
(220, NULL, NULL, 'ditegaskan'),
(221, NULL, NULL, 'ditujukan'),
(222, NULL, NULL, 'ditunjuk'),
(223, NULL, NULL, 'ditunjuki'),
(224, NULL, NULL, 'ditunjukkan'),
(225, NULL, NULL, 'ditunjukkannya'),
(226, NULL, NULL, 'ditunjuknya'),
(227, NULL, NULL, 'dituturkan'),
(228, NULL, NULL, 'dituturkannya'),
(229, NULL, NULL, 'diucapkan'),
(230, NULL, NULL, 'diucapkannya'),
(231, NULL, NULL, 'diungkapkan'),
(232, NULL, NULL, 'dong'),
(233, NULL, NULL, 'dua'),
(234, NULL, NULL, 'dulu'),
(235, NULL, NULL, 'empat'),
(236, NULL, NULL, 'enggak'),
(237, NULL, NULL, 'enggaknya'),
(238, NULL, NULL, 'entah'),
(239, NULL, NULL, 'entahlah'),
(240, NULL, NULL, 'guna'),
(241, NULL, NULL, 'gunakan'),
(242, NULL, NULL, 'hal'),
(243, NULL, NULL, 'hampir'),
(244, NULL, NULL, 'hanya'),
(245, NULL, NULL, 'hanyalah'),
(246, NULL, NULL, 'hari'),
(247, NULL, NULL, 'harus'),
(248, NULL, NULL, 'haruslah'),
(249, NULL, NULL, 'harusnya'),
(250, NULL, NULL, 'hendak'),
(251, NULL, NULL, 'hendaklah'),
(252, NULL, NULL, 'hendaknya'),
(253, NULL, NULL, 'hingga'),
(254, NULL, NULL, 'ia'),
(255, NULL, NULL, 'ialah'),
(256, NULL, NULL, 'ibarat'),
(257, NULL, NULL, 'ibaratkan'),
(258, NULL, NULL, 'ibaratnya'),
(259, NULL, NULL, 'ibu'),
(260, NULL, NULL, 'ikut'),
(261, NULL, NULL, 'ingat'),
(262, NULL, NULL, 'ingat-ingat'),
(263, NULL, NULL, 'ingin'),
(264, NULL, NULL, 'inginkah'),
(265, NULL, NULL, 'inginkan'),
(266, NULL, NULL, 'ini'),
(267, NULL, NULL, 'inikah'),
(268, NULL, NULL, 'inilah'),
(269, NULL, NULL, 'itu'),
(270, NULL, NULL, 'itukah'),
(271, NULL, NULL, 'itulah'),
(272, NULL, NULL, 'jadi'),
(273, NULL, NULL, 'jadilah'),
(274, NULL, NULL, 'jadinya'),
(275, NULL, NULL, 'jangan'),
(276, NULL, NULL, 'jangankan'),
(277, NULL, NULL, 'janganlah'),
(278, NULL, NULL, 'jauh'),
(279, NULL, NULL, 'jawab'),
(280, NULL, NULL, 'jawaban'),
(281, NULL, NULL, 'jawabnya'),
(282, NULL, NULL, 'jelas'),
(283, NULL, NULL, 'jelaskan'),
(284, NULL, NULL, 'jelaslah'),
(285, NULL, NULL, 'jelasnya'),
(286, NULL, NULL, 'jika'),
(287, NULL, NULL, 'jikalau'),
(288, NULL, NULL, 'juga'),
(289, NULL, NULL, 'jumlah'),
(290, NULL, NULL, 'jumlahnya'),
(291, NULL, NULL, 'justru'),
(292, NULL, NULL, 'kala'),
(293, NULL, NULL, 'kalau'),
(294, NULL, NULL, 'kalaulah'),
(295, NULL, NULL, 'kalaupun'),
(296, NULL, NULL, 'kalian'),
(297, NULL, NULL, 'kami'),
(298, NULL, NULL, 'kamilah'),
(299, NULL, NULL, 'kamu'),
(300, NULL, NULL, 'kamulah'),
(301, NULL, NULL, 'kan'),
(302, NULL, NULL, 'kapan'),
(303, NULL, NULL, 'kapankah'),
(304, NULL, NULL, 'kapanpun'),
(305, NULL, NULL, 'karena'),
(306, NULL, NULL, 'karenanya'),
(307, NULL, NULL, 'kasus'),
(308, NULL, NULL, 'kata'),
(309, NULL, NULL, 'katakan'),
(310, NULL, NULL, 'katakanlah'),
(311, NULL, NULL, 'katanya'),
(312, NULL, NULL, 'ke'),
(313, NULL, NULL, 'keadaan'),
(314, NULL, NULL, 'kebetulan'),
(315, NULL, NULL, 'kecil'),
(316, NULL, NULL, 'kedua'),
(317, NULL, NULL, 'keduanya'),
(318, NULL, NULL, 'keinginan'),
(319, NULL, NULL, 'kelamaan'),
(320, NULL, NULL, 'kelihatan'),
(321, NULL, NULL, 'kelihatannya'),
(322, NULL, NULL, 'kelima'),
(323, NULL, NULL, 'keluar'),
(324, NULL, NULL, 'kembali'),
(325, NULL, NULL, 'kemudian'),
(326, NULL, NULL, 'kemungkinan'),
(327, NULL, NULL, 'kemungkinannya'),
(328, NULL, NULL, 'kenapa'),
(329, NULL, NULL, 'kepada'),
(330, NULL, NULL, 'kepadanya'),
(331, NULL, NULL, 'kesampaian'),
(332, NULL, NULL, 'keseluruhan'),
(333, NULL, NULL, 'keseluruhannya'),
(334, NULL, NULL, 'keterlaluan'),
(335, NULL, NULL, 'ketika'),
(336, NULL, NULL, 'khususnya'),
(337, NULL, NULL, 'kini'),
(338, NULL, NULL, 'kinilah'),
(339, NULL, NULL, 'kira'),
(340, NULL, NULL, 'kira-kira'),
(341, NULL, NULL, 'kiranya'),
(342, NULL, NULL, 'kita'),
(343, NULL, NULL, 'kitalah'),
(344, NULL, NULL, 'kok'),
(345, NULL, NULL, 'kurang'),
(346, NULL, NULL, 'lagi'),
(347, NULL, NULL, 'lagian'),
(348, NULL, NULL, 'lah'),
(349, NULL, NULL, 'lain'),
(350, NULL, NULL, 'lainnya'),
(351, NULL, NULL, 'lalu'),
(352, NULL, NULL, 'lama'),
(353, NULL, NULL, 'lamanya'),
(354, NULL, NULL, 'lanjut'),
(355, NULL, NULL, 'lanjutnya'),
(356, NULL, NULL, 'lebih'),
(357, NULL, NULL, 'lewat'),
(358, NULL, NULL, 'lima'),
(359, NULL, NULL, 'luar'),
(360, NULL, NULL, 'macam'),
(361, NULL, NULL, 'maka'),
(362, NULL, NULL, 'makanya'),
(363, NULL, NULL, 'makin'),
(364, NULL, NULL, 'malah'),
(365, NULL, NULL, 'malahan'),
(366, NULL, NULL, 'mampu'),
(367, NULL, NULL, 'mampukah'),
(368, NULL, NULL, 'mana'),
(369, NULL, NULL, 'manakala'),
(370, NULL, NULL, 'manalagi'),
(371, NULL, NULL, 'masa'),
(372, NULL, NULL, 'masalah'),
(373, NULL, NULL, 'masalahnya'),
(374, NULL, NULL, 'masih'),
(375, NULL, NULL, 'masihkah'),
(376, NULL, NULL, 'masing'),
(377, NULL, NULL, 'masing-masing'),
(378, NULL, NULL, 'mau'),
(379, NULL, NULL, 'maupun'),
(380, NULL, NULL, 'melainkan'),
(381, NULL, NULL, 'melakukan'),
(382, NULL, NULL, 'melalui'),
(383, NULL, NULL, 'melihat'),
(384, NULL, NULL, 'melihatnya'),
(385, NULL, NULL, 'memang'),
(386, NULL, NULL, 'memastikan'),
(387, NULL, NULL, 'memberi'),
(388, NULL, NULL, 'memberikan'),
(389, NULL, NULL, 'membuat'),
(390, NULL, NULL, 'memerlukan'),
(391, NULL, NULL, 'memihak'),
(392, NULL, NULL, 'meminta'),
(393, NULL, NULL, 'memintakan'),
(394, NULL, NULL, 'memisalkan'),
(395, NULL, NULL, 'memperbuat'),
(396, NULL, NULL, 'mempergunakan'),
(397, NULL, NULL, 'memperkirakan'),
(398, NULL, NULL, 'memperlihatkan'),
(399, NULL, NULL, 'mempersiapkan'),
(400, NULL, NULL, 'mempersoalkan'),
(401, NULL, NULL, 'mempertanyakan'),
(402, NULL, NULL, 'mempunyai'),
(403, NULL, NULL, 'memulai'),
(404, NULL, NULL, 'memungkinkan'),
(405, NULL, NULL, 'menaiki'),
(406, NULL, NULL, 'menambahkan'),
(407, NULL, NULL, 'menandaskan'),
(408, NULL, NULL, 'menanti'),
(409, NULL, NULL, 'menanti-nanti'),
(410, NULL, NULL, 'menantikan'),
(411, NULL, NULL, 'menanya'),
(412, NULL, NULL, 'menanyai'),
(413, NULL, NULL, 'menanyakan'),
(414, NULL, NULL, 'mendapat'),
(415, NULL, NULL, 'mendapatkan'),
(416, NULL, NULL, 'mendatang'),
(417, NULL, NULL, 'mendatangi'),
(418, NULL, NULL, 'mendatangkan'),
(419, NULL, NULL, 'menegaskan'),
(420, NULL, NULL, 'mengakhiri'),
(421, NULL, NULL, 'mengapa'),
(422, NULL, NULL, 'mengatakan'),
(423, NULL, NULL, 'mengatakannya'),
(424, NULL, NULL, 'mengenai'),
(425, NULL, NULL, 'mengerjakan'),
(426, NULL, NULL, 'mengetahui'),
(427, NULL, NULL, 'menggunakan'),
(428, NULL, NULL, 'menghendaki'),
(429, NULL, NULL, 'mengibaratkan'),
(430, NULL, NULL, 'mengibaratkannya'),
(431, NULL, NULL, 'mengingat'),
(432, NULL, NULL, 'mengingatkan'),
(433, NULL, NULL, 'menginginkan'),
(434, NULL, NULL, 'mengira'),
(435, NULL, NULL, 'mengucapkan'),
(436, NULL, NULL, 'mengucapkannya'),
(437, NULL, NULL, 'mengungkapkan'),
(438, NULL, NULL, 'menjadi'),
(439, NULL, NULL, 'menjawab'),
(440, NULL, NULL, 'menjelaskan'),
(441, NULL, NULL, 'menuju'),
(442, NULL, NULL, 'menunjuk'),
(443, NULL, NULL, 'menunjuki'),
(444, NULL, NULL, 'menunjukkan'),
(445, NULL, NULL, 'menunjuknya'),
(446, NULL, NULL, 'menurut'),
(447, NULL, NULL, 'menuturkan'),
(448, NULL, NULL, 'menyampaikan'),
(449, NULL, NULL, 'menyangkut'),
(450, NULL, NULL, 'menyatakan'),
(451, NULL, NULL, 'menyebutkan'),
(452, NULL, NULL, 'menyeluruh'),
(453, NULL, NULL, 'menyiapkan'),
(454, NULL, NULL, 'merasa'),
(455, NULL, NULL, 'mereka'),
(456, NULL, NULL, 'merekalah'),
(457, NULL, NULL, 'merupakan'),
(458, NULL, NULL, 'meski'),
(459, NULL, NULL, 'meskipun'),
(460, NULL, NULL, 'meyakini'),
(461, NULL, NULL, 'meyakinkan'),
(462, NULL, NULL, 'minta'),
(463, NULL, NULL, 'mirip'),
(464, NULL, NULL, 'misal'),
(465, NULL, NULL, 'misalkan'),
(466, NULL, NULL, 'misalnya'),
(467, NULL, NULL, 'mula'),
(468, NULL, NULL, 'mulai'),
(469, NULL, NULL, 'mulailah'),
(470, NULL, NULL, 'mulanya'),
(471, NULL, NULL, 'mungkin'),
(472, NULL, NULL, 'mungkinkah'),
(473, NULL, NULL, 'nah'),
(474, NULL, NULL, 'naik'),
(475, NULL, NULL, 'namun'),
(476, NULL, NULL, 'nanti'),
(477, NULL, NULL, 'nantinya'),
(478, NULL, NULL, 'nyaris'),
(479, NULL, NULL, 'nyatanya'),
(480, NULL, NULL, 'oleh'),
(481, NULL, NULL, 'olehnya'),
(482, NULL, NULL, 'pada'),
(483, NULL, NULL, 'padahal'),
(484, NULL, NULL, 'padanya'),
(485, NULL, NULL, 'pak'),
(486, NULL, NULL, 'paling'),
(487, NULL, NULL, 'panjang'),
(488, NULL, NULL, 'pantas'),
(489, NULL, NULL, 'para'),
(490, NULL, NULL, 'pasti'),
(491, NULL, NULL, 'pastilah'),
(492, NULL, NULL, 'penting'),
(493, NULL, NULL, 'pentingnya'),
(494, NULL, NULL, 'per'),
(495, NULL, NULL, 'percuma'),
(496, NULL, NULL, 'perlu'),
(497, NULL, NULL, 'perlukah'),
(498, NULL, NULL, 'perlunya'),
(499, NULL, NULL, 'pernah'),
(500, NULL, NULL, 'persoalan'),
(501, NULL, NULL, 'pertama'),
(502, NULL, NULL, 'pertama-tama'),
(503, NULL, NULL, 'pertanyaan'),
(504, NULL, NULL, 'pertanyakan'),
(505, NULL, NULL, 'pihak'),
(506, NULL, NULL, 'pihaknya'),
(507, NULL, NULL, 'pukul'),
(508, NULL, NULL, 'pula'),
(509, NULL, NULL, 'pun'),
(510, NULL, NULL, 'punya'),
(511, NULL, NULL, 'rasa'),
(512, NULL, NULL, 'rasanya'),
(513, NULL, NULL, 'rata'),
(514, NULL, NULL, 'rupanya'),
(515, NULL, NULL, 'saat'),
(516, NULL, NULL, 'saatnya'),
(517, NULL, NULL, 'saja'),
(518, NULL, NULL, 'sajalah'),
(519, NULL, NULL, 'saling'),
(520, NULL, NULL, 'sama'),
(521, NULL, NULL, 'sama-sama'),
(522, NULL, NULL, 'sambil'),
(523, NULL, NULL, 'sampai'),
(524, NULL, NULL, 'sampai-sampai'),
(525, NULL, NULL, 'sampaikan'),
(526, NULL, NULL, 'sana'),
(527, NULL, NULL, 'sangat'),
(528, NULL, NULL, 'sangatlah'),
(529, NULL, NULL, 'satu'),
(530, NULL, NULL, 'saya'),
(531, NULL, NULL, 'sayalah'),
(532, NULL, NULL, 'se'),
(533, NULL, NULL, 'sebab'),
(534, NULL, NULL, 'sebabnya'),
(535, NULL, NULL, 'sebagai'),
(536, NULL, NULL, 'sebagaimana'),
(537, NULL, NULL, 'sebagainya'),
(538, NULL, NULL, 'sebagian'),
(539, NULL, NULL, 'sebaik'),
(540, NULL, NULL, 'sebaik-baiknya'),
(541, NULL, NULL, 'sebaiknya'),
(542, NULL, NULL, 'sebaliknya'),
(543, NULL, NULL, 'sebanyak'),
(544, NULL, NULL, 'sebegini'),
(545, NULL, NULL, 'sebegitu'),
(546, NULL, NULL, 'sebelum'),
(547, NULL, NULL, 'sebelumnya'),
(548, NULL, NULL, 'sebenarnya'),
(549, NULL, NULL, 'seberapa'),
(550, NULL, NULL, 'sebesar'),
(551, NULL, NULL, 'sebetulnya'),
(552, NULL, NULL, 'sebisanya'),
(553, NULL, NULL, 'sebuah'),
(554, NULL, NULL, 'sebut'),
(555, NULL, NULL, 'sebutlah'),
(556, NULL, NULL, 'sebutnya'),
(557, NULL, NULL, 'secara'),
(558, NULL, NULL, 'secukupnya'),
(559, NULL, NULL, 'sedang'),
(560, NULL, NULL, 'sedangkan'),
(561, NULL, NULL, 'sedemikian'),
(562, NULL, NULL, 'sedikit'),
(563, NULL, NULL, 'sedikitnya'),
(564, NULL, NULL, 'seenaknya'),
(565, NULL, NULL, 'segala'),
(566, NULL, NULL, 'segalanya'),
(567, NULL, NULL, 'segera'),
(568, NULL, NULL, 'seharusnya'),
(569, NULL, NULL, 'sehingga'),
(570, NULL, NULL, 'seingat'),
(571, NULL, NULL, 'sejak'),
(572, NULL, NULL, 'sejauh'),
(573, NULL, NULL, 'sejenak'),
(574, NULL, NULL, 'sejumlah'),
(575, NULL, NULL, 'sekadar'),
(576, NULL, NULL, 'sekadarnya'),
(577, NULL, NULL, 'sekali'),
(578, NULL, NULL, 'sekali-kali'),
(579, NULL, NULL, 'sekalian'),
(580, NULL, NULL, 'sekaligus'),
(581, NULL, NULL, 'sekalipun'),
(582, NULL, NULL, 'sekarang'),
(583, NULL, NULL, 'sekarang'),
(584, NULL, NULL, 'sekecil'),
(585, NULL, NULL, 'seketika'),
(586, NULL, NULL, 'sekiranya'),
(587, NULL, NULL, 'sekitar'),
(588, NULL, NULL, 'sekitarnya'),
(589, NULL, NULL, 'sekurang-kurangnya'),
(590, NULL, NULL, 'sekurangnya'),
(591, NULL, NULL, 'sela'),
(592, NULL, NULL, 'selain'),
(593, NULL, NULL, 'selaku'),
(594, NULL, NULL, 'selalu'),
(595, NULL, NULL, 'selama'),
(596, NULL, NULL, 'selama-lamanya'),
(597, NULL, NULL, 'selamanya'),
(598, NULL, NULL, 'selanjutnya'),
(599, NULL, NULL, 'seluruh'),
(600, NULL, NULL, 'seluruhnya'),
(601, NULL, NULL, 'semacam'),
(602, NULL, NULL, 'semakin'),
(603, NULL, NULL, 'semampu'),
(604, NULL, NULL, 'semampunya'),
(605, NULL, NULL, 'semasa'),
(606, NULL, NULL, 'semasih'),
(607, NULL, NULL, 'semata'),
(608, NULL, NULL, 'semata-mata'),
(609, NULL, NULL, 'semaunya'),
(610, NULL, NULL, 'sementara'),
(611, NULL, NULL, 'semisal'),
(612, NULL, NULL, 'semisalnya'),
(613, NULL, NULL, 'sempat'),
(614, NULL, NULL, 'semua'),
(615, NULL, NULL, 'semuanya'),
(616, NULL, NULL, 'semula'),
(617, NULL, NULL, 'sendiri'),
(618, NULL, NULL, 'sendirian'),
(619, NULL, NULL, 'sendirinya'),
(620, NULL, NULL, 'seolah'),
(621, NULL, NULL, 'seolah-olah'),
(622, NULL, NULL, 'seorang'),
(623, NULL, NULL, 'sepanjang'),
(624, NULL, NULL, 'sepantasnya'),
(625, NULL, NULL, 'sepantasnyalah'),
(626, NULL, NULL, 'seperlunya'),
(627, NULL, NULL, 'seperti'),
(628, NULL, NULL, 'sepertinya'),
(629, NULL, NULL, 'sepihak'),
(630, NULL, NULL, 'sering'),
(631, NULL, NULL, 'seringnya'),
(632, NULL, NULL, 'serta'),
(633, NULL, NULL, 'serupa'),
(634, NULL, NULL, 'sesaat'),
(635, NULL, NULL, 'sesama'),
(636, NULL, NULL, 'sesampai'),
(637, NULL, NULL, 'sesegera'),
(638, NULL, NULL, 'sesekali'),
(639, NULL, NULL, 'seseorang'),
(640, NULL, NULL, 'sesuatu'),
(641, NULL, NULL, 'sesuatunya'),
(642, NULL, NULL, 'sesudah'),
(643, NULL, NULL, 'sesudahnya'),
(644, NULL, NULL, 'setelah'),
(645, NULL, NULL, 'setempat'),
(646, NULL, NULL, 'setengah'),
(647, NULL, NULL, 'seterusnya'),
(648, NULL, NULL, 'setiap'),
(649, NULL, NULL, 'setiba'),
(650, NULL, NULL, 'setibanya'),
(651, NULL, NULL, 'setidak-tidaknya'),
(652, NULL, NULL, 'setidaknya'),
(653, NULL, NULL, 'setinggi'),
(654, NULL, NULL, 'seusai'),
(655, NULL, NULL, 'sewaktu'),
(656, NULL, NULL, 'siap'),
(657, NULL, NULL, 'siapa'),
(658, NULL, NULL, 'siapakah'),
(659, NULL, NULL, 'siapapun'),
(660, NULL, NULL, 'sini'),
(661, NULL, NULL, 'sinilah'),
(662, NULL, NULL, 'soal'),
(663, NULL, NULL, 'soalnya'),
(664, NULL, NULL, 'suatu'),
(665, NULL, NULL, 'sudah'),
(666, NULL, NULL, 'sudahkah'),
(667, NULL, NULL, 'sudahlah'),
(668, NULL, NULL, 'supaya'),
(669, NULL, NULL, 'tadi'),
(670, NULL, NULL, 'tadinya'),
(671, NULL, NULL, 'tahu'),
(672, NULL, NULL, 'tahun'),
(673, NULL, NULL, 'tak'),
(674, NULL, NULL, 'tambah'),
(675, NULL, NULL, 'tambahnya'),
(676, NULL, NULL, 'tampak'),
(677, NULL, NULL, 'tampaknya'),
(678, NULL, NULL, 'tandas'),
(679, NULL, NULL, 'tandasnya'),
(680, NULL, NULL, 'tanpa'),
(681, NULL, NULL, 'tanya'),
(682, NULL, NULL, 'tanyakan'),
(683, NULL, NULL, 'tanyanya'),
(684, NULL, NULL, 'tapi'),
(685, NULL, NULL, 'tegas'),
(686, NULL, NULL, 'tegasnya'),
(687, NULL, NULL, 'telah'),
(688, NULL, NULL, 'tempat'),
(689, NULL, NULL, 'tengah'),
(690, NULL, NULL, 'tentang'),
(691, NULL, NULL, 'tentu'),
(692, NULL, NULL, 'tentulah'),
(693, NULL, NULL, 'tentunya'),
(694, NULL, NULL, 'tepat'),
(695, NULL, NULL, 'terakhir'),
(696, NULL, NULL, 'terasa'),
(697, NULL, NULL, 'terbanyak'),
(698, NULL, NULL, 'terdahulu'),
(699, NULL, NULL, 'terdapat'),
(700, NULL, NULL, 'terdiri'),
(701, NULL, NULL, 'terhadap'),
(702, NULL, NULL, 'terhadapnya'),
(703, NULL, NULL, 'teringat'),
(704, NULL, NULL, 'teringat-ingat'),
(705, NULL, NULL, 'terjadi'),
(706, NULL, NULL, 'terjadilah'),
(707, NULL, NULL, 'terjadinya'),
(708, NULL, NULL, 'terkira'),
(709, NULL, NULL, 'terlalu'),
(710, NULL, NULL, 'terlebih'),
(711, NULL, NULL, 'terlihat'),
(712, NULL, NULL, 'termasuk'),
(713, NULL, NULL, 'ternyata'),
(714, NULL, NULL, 'tersampaikan'),
(715, NULL, NULL, 'tersebut'),
(716, NULL, NULL, 'tersebutlah'),
(717, NULL, NULL, 'tertentu'),
(718, NULL, NULL, 'tertuju'),
(719, NULL, NULL, 'terus'),
(720, NULL, NULL, 'terutama'),
(721, NULL, NULL, 'tetap'),
(722, NULL, NULL, 'tetapi'),
(723, NULL, NULL, 'tiap'),
(724, NULL, NULL, 'tiba'),
(725, NULL, NULL, 'tiba-tiba'),
(726, NULL, NULL, 'tidak'),
(727, NULL, NULL, 'tidakkah'),
(728, NULL, NULL, 'tidaklah'),
(729, NULL, NULL, 'tiga'),
(730, NULL, NULL, 'tinggi'),
(731, NULL, NULL, 'toh'),
(732, NULL, NULL, 'tunjuk'),
(733, NULL, NULL, 'turut'),
(734, NULL, NULL, 'tutur'),
(735, NULL, NULL, 'tuturnya'),
(736, NULL, NULL, 'ucap'),
(737, NULL, NULL, 'ucapnya'),
(738, NULL, NULL, 'ujar'),
(739, NULL, NULL, 'ujarnya'),
(740, NULL, NULL, 'umum'),
(741, NULL, NULL, 'umumnya'),
(742, NULL, NULL, 'ungkap'),
(743, NULL, NULL, 'ungkapnya'),
(744, NULL, NULL, 'untuk'),
(745, NULL, NULL, 'usah'),
(746, NULL, NULL, 'usai'),
(747, NULL, NULL, 'waduh'),
(748, NULL, NULL, 'wah'),
(749, NULL, NULL, 'wahai'),
(750, NULL, NULL, 'waktu'),
(751, NULL, NULL, 'waktunya'),
(752, NULL, NULL, 'walau'),
(753, NULL, NULL, 'walaupun'),
(754, NULL, NULL, 'wong'),
(755, NULL, NULL, 'yaitu'),
(756, NULL, NULL, 'yakin'),
(757, NULL, NULL, 'yakni'),
(758, NULL, NULL, 'yang');

-- --------------------------------------------------------

--
-- Table structure for table `suggestions`
--

CREATE TABLE `suggestions` (
  `id` int(10) UNSIGNED NOT NULL,
  `suggestion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin` tinyint(4) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `admin`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Fadil Natakusumah', 'admin@gmail.com', '$2y$10$hhY2cuv1TLlb98pLEe3UGOMS7Xwk44ajJuBnsLVKB4kI7333XifM.', 1, NULL, '2018-08-30 09:03:07', '0000-00-00 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assets`
--
ALTER TABLE `assets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blockedwords`
--
ALTER TABLE `blockedwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `canvas`
--
ALTER TABLE `canvas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`(191));

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stopwords`
--
ALTER TABLE `stopwords`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suggestions`
--
ALTER TABLE `suggestions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assets`
--
ALTER TABLE `assets`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blockedwords`
--
ALTER TABLE `blockedwords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `canvas`
--
ALTER TABLE `canvas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stopwords`
--
ALTER TABLE `stopwords`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1024;

--
-- AUTO_INCREMENT for table `suggestions`
--
ALTER TABLE `suggestions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
