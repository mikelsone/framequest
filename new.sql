-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2023 at 10:32 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `new`
--

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `upload_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `username`, `image_path`, `description`, `upload_date`) VALUES
(2, 'test', 'uploads/test_Surrealism-inspired designs (11).png', 'A graphic I made', '2023-12-17 02:14:35'),
(3, 'test', 'uploads/test_Landscape_Photo_Tips.webp', 'landscape I like', '2023-12-17 02:20:11'),
(4, 'test', 'uploads/test_what-is-personality-2795416_sketch-5b63480c46e0fb00250e38b2.png', 'ey', '2023-12-17 02:22:58'),
(5, 'test', 'uploads/test_what-is-personality-2795416_sketch-5b63480c46e0fb00250e38b2.png', 'ey', '2023-12-17 02:23:02'),
(6, 'test', 'uploads/test_Screenshot_8.jpg', 'fotografs', '2023-12-17 02:24:55'),
(7, 'test', 'uploads/test_3879a23a-8e3d-4e3c-8692-b3eef8837ffa (1).png', 'yersss', '2023-12-17 02:26:09'),
(8, 'mans', 'uploads/mans_360_F_203941827_S94nsre07WqEfLqYhazkAidUWT4rfVjy.jpg', 'girls', '2023-12-17 02:29:51'),
(9, 'mans', 'uploads/mans_3879a23a-8e3d-4e3c-8692-b3eef8837ffa (1).png', 'yessssssssssss', '2023-12-17 02:32:02'),
(10, 'mans', 'uploads/mans_featured-730x350.png', '', '2023-12-17 02:33:50'),
(11, 'jauns', 'uploads/jauns_marshmello-lil-peep-spotlight-1518447107.webp', '', '2023-12-17 02:36:09'),
(12, 'jauns', 'uploads/jauns_860x394.jpg', 'sss3', '2023-12-17 02:37:59'),
(13, 'jauns', 'uploads/jauns_1_wBsfNDuVuxTIPNQDV2trmw.webp', '123', '2023-12-17 02:38:37'),
(14, 'jauns', 'uploads/jauns_b7f07225d2cc99b3d67470c47ad4a94f.jpg', 'moon', '2023-12-17 02:40:25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_picture` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `role` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `profile_picture`, `email`, `name`, `surname`, `phone`, `gender`, `role`) VALUES
(1, 'test', '$2y$10$ZFk0rGilQdn0uov/7MFcMudpevf5vFWuQnabOjoYK/WLraeGqK1oW', 'uploads/test_Screenshot_8.jpg', '', '', '', '', '', ''),
(2, 'testy', '$2y$10$js.UISwYz8bAMgY8UUdPU.oN7Ph8Tk9hwusd28IHM29QZor1MmAAC', 'uploads/testy_Lali_4742-Edit.webp', '', '', '', '', '', ''),
(4, 'VairsnavMANS', '$2y$10$Ubf.X5ak1wjUctMvmUe.ueGt4d/5/a55Awq1KrJig59xs06hvQOXS', 'uploads/mans_wefwerfgwefwe.jpg', '', '', '', '', '', ''),
(6, 'tavs', '$2y$10$nKi3kbR2HgNdUjQQppkzw.CFyCTsnJczNtItDhYOetym0XB2GjPSG', 'uploads/tavs_zhuD02SP_4x.jpg', '', '', '', '', '', ''),
(8, 'jauns', '$2y$10$at/VISOy1pVgXe5dDox2tOARIcddpXQSBhgeGJj05xKSb18Mn.gqO', NULL, '', '', '', '', '', ''),
(9, 'Aiga', '$2y$10$QlNfbptSNXSIbG4q8mPukuWX2XEEMyxrOOrSECzP6gcH8zMLTm7ea', NULL, '', '', '', '', '', ''),
(10, 'Maija', '$2y$10$IgUHwe8S28DOmvgPvAFAuu9mXflsqOxc7kLtB5Bdh2tbIan/Ex9Yq', NULL, '', '', '', '', '', ''),
(11, 'Mirdza', '$2y$10$dGCrDM69mFKwRsvKDn4VN.MHUoX6j9vq9u9oBCfxXObehxIklKO82', NULL, '', '', '', '', '', ''),
(12, '123', '$2y$10$QdWBdpVTc/sWCXfDkT5Ep.H0AII5pl6DbMAWVd5ys0HhRIMrJ1R.6', NULL, '', '', '', '', '', ''),
(13, '12', '$2y$10$/VI6nhVOvsz3CCHzj7i4xOhdazhPgZL11QsZ..nS1Uxuq/5NPyvaa', NULL, '', '', '', '', '', ''),
(14, 'tesst', '$2y$10$Gtf.itMXWta0awGEthG1ve7emvvGiEMEH3HDUOGstTeU7yBmW4CQq', NULL, '', '', '', '', '', ''),
(15, 'tessss', '$2y$10$RFkiaWD.F8ii5e4eLkJrm.WooNAocyCNDxKxdknk9j.LD6wCSBBgG', NULL, '', '', '', '', '', ''),
(16, 'Mirdzins', '$2y$10$34kdeahQ4JJeuZFhEJttHu/umbopsWFz.b03xGlvsG0j7V17aP6.a', NULL, '', '', '', '', '', ''),
(17, 'vyn', '$2y$10$c8.O1iLEtbmPODOU1kxGlulVFOnb6APotNPUC2WIfRv5Xw33J0CJG', NULL, 'vyn@gmail.com', 'Vyn', 'Tex', '2094562', 'female', 'work'),
(18, 'vilis', '$2y$10$oi5BZtSKdRQ9zT9AjkQ63.4nYrZIjrN9U6mgqx58R1c9dr0hI6cKe', 'uploads/vilis_aaa9cc97-936f-4725-9668-7ba6f52b0c2c.png', 'vilis@gmail.com', 'Vilis', 'Untals', '22345678', 'male', 'work'),
(19, 'Miks112', '$2y$10$SHJsVi7fWYyoRYx2n3GdOuymkoU68CQXLhYZ.LmMDgD/twJdNlHti', NULL, 'miko@gmail.com', 'Miko', 'Sessz', '26589503', 'other', 'hire'),
(20, 'wfwef', '$2y$10$6ENZDy/ZWH3LCuhf.iOKoerjOvRgsjn.chpnp.EccxWK8BuFiol5C', NULL, 'wf@gmail.com', 'ees', 'esss', '22234566', 'female', 'hire'),
(21, 'eee', '$2y$10$GU3WHq40.j0YGd7W0CJamOzbcV2OmoYz8mldyqvOPohFmt9Tz5NXi', NULL, 'ee@gmail.com', 'eee', 'eee', 'eee', 'female', 'hire'),
(22, 'rrr', '$2y$10$lL95ZgVJQYl0LnWTFQsSX.VjiAH/YjTQElA4YyRwA5Jh3EPrek4E2', NULL, 'ss@gmail.com', 'sss', 'sss', '26867482', 'female', 'hire'),
(23, 'eeef', '$2y$10$QUQiHtnKJ0RDp6U1i9fC6eItezZkobltcuGUb7BCTUBzFJqnNNN9W', NULL, 'ei@gmail.com', 'wefwefwef', 'Miķelsone', '26867482', 'female', 'hire'),
(24, 'erferf', '$2y$10$u2i.vEthKcrP7eDUj33IaO.5i5Cy8JqVRw0kD896XS/5x2zOUEXE6', NULL, 'efeef@gmail.com', 'Melānija', 'Miķelsone', '26867482', 'female', 'hire'),
(25, 'ergerg', '$2y$10$KfUopYR9p6Ox8bMaLIXLc.Uw94lS1XzdKURDW4oK5s5Eal7iKDzXa', NULL, 'ERGER@GMAIL.COM', 'erjger', 'sss', '26867482', 'female', 'hire'),
(26, 'ee', '$2y$10$MpsST3xOAD7KNlgxiccsJ.47PKVXEVUmbyfF2GFi3Ov7kV7VhxfES', NULL, 'ees2@gmail.com', 'Melānija', 'Miķelsone', '26867482', 'female', 'hire'),
(27, 'erfergerg', '$2y$10$uz/yE8b1edi50SM6IV1g4.a2k4HrsrCUghSx6CEvofIGlZ8kIuAx2', NULL, 'ergergerg@gmail.com', 'ergergergerg', 'ergergerg', 'ergergergerg', 'female', 'hire'),
(30, 'tt', '$2y$10$YJ5NA0P5F4pEY8Zb3GELXur/X1aQsk22b/5PUQSxOuMZ2wZsik8pW', NULL, 'tt@gmail.com', 'ttt', 'tt', '2', 'female', 'hire'),
(31, 'ttt', '$2y$10$u7lfIyoLVHarbVy2HEra5ukAqaAWvpmp0bgPLjeSf4WXSvVnTir4i', NULL, 'ttt@gmail.com', 'ttt', 'ttt', '20002344', 'female', 'hire'),
(35, 'manisaucjauns', '$2y$10$3CV/.2ZMCGZVpO.Lev9boeu3U2fNS.DfU4NMw0yr8uy91ZQf7Zdem', NULL, 'maniiiis@gmail.com', 'Jaunsssssss', 'Vardssdsd', '26467482', 'female', 'hire'),
(36, 'tesssssss', '$2y$10$kJHJj9xMm9BpzQ1isR4AUejeoLsqFCN63sg2b9IMgn2D6C48LQWb.', NULL, '2gg@gmail.com', 'esssts', 'estyuus', '266767482', 'other', 'hire'),
(37, 'Mantik', '$2y$10$IW7tEmq/luIMeR/BAMDwq.DnhHCDM/b7JSpgdUldSBBty2Y2by.4G', NULL, 'manist@gmail.com', 'testyuus', 'anits', '2095782', 'male', 'hire'),
(38, 'ttttssssssss', '$2y$10$tTSuFt3hT5PzSh/Df15FJui5IKwTecZpc8oUuBH3yVXyhVciBhTT2', NULL, 'ssssssss@gmail.com', 'ssssssssssssss', 'saaaaaaaas', '26867482', 'female', 'hire'),
(39, 'ttttwserfsdfsdf', '$2y$10$yf/wHOBYNhe9JIeSoQ.Cle/svIReJeKPJNlyHtUKnljT2W7i30zm.', NULL, 'sdfsdgsgsgr@gmail.com', '34t34tergerg', 'ergergerg', '22423452345', 'female', 'hire'),
(40, 'ergergergerg', '$2y$10$vzAAJvwc/.HWm5LlYTDECul3KxLJGYz1VmZ0Xbd03iYXB8iSwLV1m', NULL, 'ergergergerg@gmail.com', 'efefsdfsdgh', 'rtyhrthrth', '2352345234', 'female', 'hire'),
(47, 'minis', '$2y$10$fdHvr7t9ccKK.5EyVf9Hh.piiuFId6c6UWQs0ava1Y4QmbXcyfwYG', NULL, 'minis@gmail.com', 'minis', 'meino', '22234533', 'female', 'hire'),
(49, 'maikksss', '$2y$10$KgpbnOCbJrldKhL0d20Er.XAy82HdWCW828ovrYSBJPdefIEEV6Ii', NULL, 'mmelssd@gmail.com', 'esstu', 'esttyys', '33344535', 'female', 'hire'),
(50, 'testt7uytuty', '$2y$10$ooTmfqC9SAtiFQAyR.THGelhn8c9OtLEH6/fMsUmrh4o9jnV9EIRu', NULL, '23sdf@gmail.com', 'tttefdg', 'fgdfgdfgdfg', '2323232', 'male', 'hire'),
(51, 'tefsdfgsdf', '$2y$10$LNwC0jYhATrKunPeRUssReNKrprQVk2iVYMfY6cPEMAGUoNT8Bdem', NULL, 'rgrth@gmail.com', 'erterter', 'werfwesdf', '22323', 'female', 'hire'),
(52, 'Maisss', '$2y$10$JXAnALPbAiobnQIYpkeuxO/I.80gf5Ndv1ib.1eGSiFXAhg1.p6ZS', NULL, 'maisooo@gmail.com', 'tessrt', 'rtgergdf', '234234234', 'female', 'hire'),
(74, 'Maikkssse', '$2y$10$KzlguOIAs.U8VMU9WfCY6OxuQBwQ6bCtUzUh74rU0b0t.GuG8NkYG', NULL, 't323@gmail.com', 'fgggrt', 'efwe', '22234', 'male', 'hire'),
(76, 'myusernames', '$2y$10$Fs2lVhVUGThMImBCZ3zf2uN8je96rpdzYPaQ543Tp.EgAAcm.yz9u', NULL, 'test@gmail.com', 'melssdsf', 'gergr3ge', '2235345645', 'female', 'hire');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
