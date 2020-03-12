-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 12-Mar-2020 às 13:32
-- Versão do servidor: 5.7.26
-- versão do PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wbp`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `blog`
--

DROP TABLE IF EXISTS `blog`;
CREATE TABLE IF NOT EXISTS `blog` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `active` tinyint(1) NOT NULL,
  `title_pt` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `title_en` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content_pt` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `content_en` longtext COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `url_pt` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `url_en` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tag_pt` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `tag_en` varchar(200) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`id`, `active`, `title_pt`, `title_en`, `content_pt`, `content_en`, `url_pt`, `url_en`, `tag_pt`, `tag_en`) VALUES
(1, 1, 'blog text 1 pt', 'blog text 1 en', '<p>Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.\r\n</p>\r\n<p>\r\nMorbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.\r\n</p>\r\n<p>\r\nSuspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!\r\n</p>\r\n<p>\r\nProin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.\r\n</p>\r\n<p>\r\nAensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!\r\n</p>', '<p>EN Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas. </p> <p> Morbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor. </p> <p> Suspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante! </p> <p> Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est. </p> <p> Aensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est! </p>', 'blog-text-1-pt', 'blog-text-1-en', 'lorem/ipsum/dolor/sit/pt', 'lorem/ipsum/dolor/sit/en'),
(2, 1, 'blog text 2 pt', 'blog text 2 en', 'áàõü netus et muada fames ac turpis egestas.\r\n\r\nMorbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.\r\n\r\nSuspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'EN áàõü netus et muada fames ac turpis egestas.  Morbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.  Suspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'title-2-pt', 'title-2-en', 'lorem/ipsum/pt', 'lorem/ipsum/en'),
(3, 1, 'blog text 3 pt', 'blog text 3 en', 'Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.\r\n\r\nAensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!\r\n\r\nLorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.\r\n\r\nMorbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.\r\n\r\nSuspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'EN Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.  Aensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!  Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.  Morbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.  Suspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'title-3-pt', 'title-3-en', 'lorem/ipsum/pt', 'lorem/ipsum/en'),
(5, 1, 'blog text 4 en', 'blog text 4 en', 'Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.\n\nProin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.\n\nAensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!', 'EN Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.  Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.  Aensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!', 'blog-text-4-pt', 'blog-text-4-en', 'teste/teste2/pt', 'teste/teste2/en');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

DROP TABLE IF EXISTS `login`;
CREATE TABLE IF NOT EXISTS `login` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_unicode_520_ci NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`,`email`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id`, `email`, `password`, `active`) VALUES
(1, 'email@email.com', 'e10adc3949ba59abbe56e057f20f883e', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
