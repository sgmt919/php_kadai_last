-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 7 月 29 日 16:21
-- サーバのバージョン： 10.4.19-MariaDB
-- PHP のバージョン: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `closet_db`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `capacity_list`
--

CREATE TABLE `capacity_list` (
  `id` int(11) NOT NULL,
  `tops_ss_capa` int(2) NOT NULL,
  `bottoms_ss_capa` int(2) NOT NULL,
  `dress_ss_capa` int(2) NOT NULL,
  `coat_ss_capa` int(2) NOT NULL,
  `tops_aw_capa` int(2) NOT NULL,
  `bottoms_aw_capa` int(2) NOT NULL,
  `dress_aw_capa` int(2) NOT NULL,
  `coat_aw_capa` int(2) NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `capacity_list`
--

INSERT INTO `capacity_list` (`id`, `tops_ss_capa`, `bottoms_ss_capa`, `dress_ss_capa`, `coat_ss_capa`, `tops_aw_capa`, `bottoms_aw_capa`, `dress_aw_capa`, `coat_aw_capa`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 1, -1, '0000-00-00 00:00:00'),
(2, 1, 1, 1, 1, 1, 1, 1, -1, '0000-00-00 00:00:00'),
(3, 5, 4, 4, 4, 5, 4, 3, 3, '0000-00-00 00:00:00'),
(4, 3, 4, 4, 4, 4, 5, 4, 5, '0000-00-00 00:00:00'),
(5, 8, 4, 3, 3, 4, 4, 3, 3, '0000-00-00 00:00:00'),
(6, 10, 8, 4, 5, 11, 7, 7, 6, '0000-00-00 00:00:00'),
(7, 5, 3, 4, 3, 3, 3, 4, 3, '2021-07-29 23:02:20'),
(8, 4, 4, 4, 4, 4, 4, 3, 4, '2021-07-29 23:17:23');

-- --------------------------------------------------------

--
-- テーブルの構造 `event_table`
--

CREATE TABLE `event_table` (
  `id` int(11) NOT NULL,
  `event_date` date NOT NULL,
  `event` varchar(10) NOT NULL,
  `image2` varchar(256) NOT NULL,
  `memo2` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `event_table`
--

INSERT INTO `event_table` (`id`, `event_date`, `event`, `image2`, `memo2`) VALUES
(4, '2021-06-12', '結婚式', 'upload/20210729145129890ceee5d82cc53b5b43c4a767ec191d.webp', ''),
(5, '2021-07-23', 'プレゼン', 'upload/2021072915071653c8ee24194051ae0159cf3de232cabd.jpg', 'ddd'),
(6, '2020-03-21', '入学・卒業式', 'upload/2021072915185693a1852f02009d1a2a82864ccc83d731.jpg', 'ああああ'),
(7, '2020-11-26', '褒められた！', 'upload/202107291519342ec912ab7a5de02817cbab3cc5a7d676.jpg', 'vvvv'),
(8, '2021-04-08', '褒められた！', 'upload/20210729152002caf44757ad18fbc4edd6e2127236687f.jpg', 'kkkk'),
(9, '2021-05-12', '参観日', 'upload/202107291520259b6bcfe44ab9fa7cfb9610adcfa68a8d.jpg', 'vvvv'),
(10, '2021-09-14', '褒められた！', 'upload/202107291521224423a59285e50dc79bcccf9675074bef.jpg', 'bbb'),
(11, '2021-04-06', '入学・卒業式', 'upload/20210729152153d975bdb05dfb5f31fbd7a4292424ebac.jpg', 'vvvv'),
(12, '2021-07-15', '食事会', 'upload/2021072915223252cf0bcbf626fe0f860774926570a39f.jpg', 'bbbb');

-- --------------------------------------------------------

--
-- テーブルの構造 `like_table`
--

CREATE TABLE `like_table` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- テーブルの構造 `list_table`
--

CREATE TABLE `list_table` (
  `id` int(11) NOT NULL,
  `image` varchar(256) NOT NULL,
  `color` varchar(128) NOT NULL,
  `season` varchar(10) NOT NULL,
  `item1` varchar(30) NOT NULL,
  `item2` varchar(30) NOT NULL,
  `purchase` date NOT NULL,
  `shop` varchar(30) NOT NULL,
  `favorite` varchar(1) NOT NULL,
  `memo` varchar(256) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `list_table`
--

INSERT INTO `list_table` (`id`, `image`, `color`, `season`, `item1`, `item2`, `purchase`, `shop`, `favorite`, `memo`) VALUES
(10, 'upload/20210722063822b20934acf83df638a1a21d284d69bfc0.JPG', '白', '春夏', 'tops', 'shirts', '0000-00-00', 'cccc', '', 'aaaaa'),
(13, 'upload/20210722064230acb0ad3c7f317dd2e0ef154497b53d49.PNG', '白', '春夏', 'tops', 'shirts', '0000-00-00', 'ccc', '', 'ccccc'),
(27, 'upload/20210724150226e05136edccaa375bd895b482cd2f16d0.JPG', 'ブラウン', '秋冬', 'tops', 'knitt', '2021-07-28', '111', '1', 'nnnnn'),
(28, 'upload/20210724155712fbf67f4f6058db5f5bc2454be389838b.JPG', 'その他', '秋冬', 'tops', 'knitt', '2021-01-06', 'mmmm', '3', '11111'),
(29, 'upload/202107241558051272c77be9227d5a0c33199a672f2329.JPG', '黒', '秋冬', 'dress', 'others', '2021-07-06', 'ユニクロ', '3', '333'),
(30, 'upload/20210724155916e6aa0b48f34073ab877e0baaa10b6934.JPG', 'red', '秋冬', 'bottoms', 'pants', '2020-02-05', 'UA', '3', '派手すぎた'),
(31, 'upload/20210724160024ec88f36316450bacaa8a52020e1cab4a.JPG', 'その他', '秋冬', 'dress', 'others', '2017-12-14', 'BEAMS', '5', '最高'),
(32, 'upload/20210724160125325654b446d7fe9528869f73e344b32c.JPG', 'その他', '秋冬', 'tops', 'jacket', '2017-01-06', 'HERNO', '3', '寒い'),
(33, 'upload/202107241602159a848565236412b0741806089acbc0b0.JPG', 'その他', '秋冬', 'bottoms', 'skirt', '2021-01-05', 'ZARA', '4', 'むむむ'),
(34, 'upload/202107241603421d39030080e8f80dfd02c97da7d16c1b.JPG', 'ブラウン', 'シーズンレス', 'bottoms', 'pants', '2021-07-16', 'ユニクロ', '2', '地味'),
(35, 'upload/202107241604304746c9e062e90a4643beb41392736051.JPG', '白', '秋冬', 'tops', 'shirts', '2021-07-12', 'ZARA', '4', '汚すのが気になる'),
(36, 'upload/20210724160826297a180e166bd34cbcd1d1d6a0ed75b9.JPG', '白', '春夏', 'dress', 'others', '2021-04-08', 'UA', '4', 'お出かけ'),
(37, 'upload/20210724160912ec12f43d1850f83a090a2db776b443ed.JPG', 'ブラウン', '秋冬', 'bottoms', 'skirt', '2021-07-29', 'H＆M', '1', 'おほほ'),
(38, 'upload/20210724161015f98d076a69359d064adc93451759361f.JPG', 'その他', 'シーズンレス', 'dress', 'others', '2021-07-20', 'GU', '5', 'AAAaa'),
(39, 'upload/202107241613245b0d0cb1f49e43c1b23458de27114305.JPG', '黒', '秋冬', 'tops', 'coat', '2021-07-26', 'しまむら', '1', 'ccccccccc'),
(40, 'upload/20210724161408e4113dcf272c3542c50ad9f508ed7825.JPG', 'その他', '秋冬', 'tops', 'knitt', '2021-07-04', 'bbbbbbb', '4', 'vvvVvvv'),
(41, 'upload/20210727044236f63001adf60977421123270ba63ad7b9.JPG', '白', '春夏', 'tops', 'shirts', '2021-07-22', 'おおお', '3', 'mmm'),
(42, 'upload/2021072707082555cf66248f93c716c6e313cec0992394.PNG', '黒', '春夏', 'tops', 'shirts', '2019-06-03', 'ユニクロ', '1', 'しましましま'),
(43, 'upload/20210727070959c340e059c2b59270be5ab17a04cfe637.PNG', 'その他', 'シーズンレス', 'bottoms', 'pants', '2021-07-06', 'しまむら', '2', 'vvvvv'),
(44, 'upload/202107270710423a7eefb2024ef8404200eb57bd7635d0.JPG', 'ブラウン', '春夏', 'tops', 'shirts', '2020-12-09', 'mmmm', '4', 'fffff'),
(45, 'upload/2021072707113506c1f8f891dda77885c75414a743a442.PNG', 'その他', '春夏', 'tops', 'shirts', '2021-07-05', 'bbbb', '3', 'bbbbb'),
(46, 'upload/2021072707120768b5806c24042eb2c5c70b1eb050360b.PNG', '黒', 'シーズンレス', 'bottoms', 'skirt', '2021-07-29', 'fffff', '3', 'ffffff'),
(47, 'upload/2021072707124012fa6ec9b55e4e5c23d8118fc216c186.PNG', '黒', '春夏', 'tops', 'shirts', '2021-07-14', 'pppp', '1', 'pppp'),
(48, 'upload/20210727081257d3671a57e955ed76b094e608348fb815.JPG', 'ブラウン', '秋冬', 'tops', 'knitt', '2021-07-06', 'mmmm', '1', '4444'),
(49, 'upload/2021072815453954ca0344a0ff8e7d5e12f65d369a3c1d.jpg', 'brown', '春夏', 'tops', 'shirts', '2021-07-06', 'ttt', '2', 'ttttt'),
(50, 'upload/20210729134514194d1a74306467082300a87dac93a9aa.JPG', 'その他', '春夏', 'dress', 'others', '2021-07-20', 'nnnn', '1', '33333');

-- --------------------------------------------------------

--
-- テーブルの構造 `users_table`
--

CREATE TABLE `users_table` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `is_admin` int(1) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- テーブルのデータのダンプ `users_table`
--

INSERT INTO `users_table` (`id`, `username`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, '111', 'aaa', 0, 0, '2021-07-19 00:00:00', '2021-07-20 10:32:52'),
(2, '111', 'aaa', 0, 0, '2021-07-19 00:00:00', '2021-07-20 10:33:04');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `capacity_list`
--
ALTER TABLE `capacity_list`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `like_table`
--
ALTER TABLE `like_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `list_table`
--
ALTER TABLE `list_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `users_table`
--
ALTER TABLE `users_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `capacity_list`
--
ALTER TABLE `capacity_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- テーブルの AUTO_INCREMENT `event_table`
--
ALTER TABLE `event_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- テーブルの AUTO_INCREMENT `like_table`
--
ALTER TABLE `like_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- テーブルの AUTO_INCREMENT `list_table`
--
ALTER TABLE `list_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- テーブルの AUTO_INCREMENT `users_table`
--
ALTER TABLE `users_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
