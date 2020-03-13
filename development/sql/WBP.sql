-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 13-Mar-2020 às 13:41
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
  `view` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- Extraindo dados da tabela `blog`
--

INSERT INTO `blog` (`id`, `active`, `title_pt`, `title_en`, `content_pt`, `content_en`, `url_pt`, `url_en`, `tag_pt`, `tag_en`, `view`) VALUES
(1, 1, 'Título do blog 1', 'Blog title 1', '<p>Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.\n</p>\n<p>\nMorbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.\n</p>\n<p>\nSuspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!\n</p>\n<p>\nProin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.\n</p>\n<p>\nAensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!\n</p>', '<p>EN Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas. </p> <p> Morbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor. </p> <p> Suspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante! </p> <p> Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est. </p> <p> Aensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est! </p>', 'titulo-do-blog-1', 'blog-title-1', 'lorem/ipsum/dolor/sit/pt', 'lorem/ipsum/dolor/sit/en', 0),
(2, 1, 'Título do blog 2', 'Blog title 2', 'áàõü netus et muada fames ac turpis egestas.\n\nMorbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.\n\nSuspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'EN áàõü netus et muada fames ac turpis egestas.  Morbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.  Suspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'titulo-do-blog-2', 'blog-title-2', 'lorem/ipsum/pt', 'lorem/ipsum/en', 0),
(3, 1, 'Título do blog 3', 'Blog Title 3', 'PT Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.\n\nAensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!\n\nLorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.\n\nMorbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.\n\nSuspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'EN Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.  Aensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!  Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.  Morbinon metusid risus placerat auor. Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex. Aeneana dictum risus. Nam vaus cursus est at porttor.  Suspendasse viverra metda sapien, sed gravida fe feugiat id! Aliquam lutus ipsum eu neque dissim egestas. Lorem ipsum dolor sit amet, consecttur adipscing elit. Curabituras interd augue, at dictuquam ullamcorperat! Ua laciniad tincidunta hendrerite? Nulla suscipit maximusnibh molesties convallisas. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante. Duis suscipit dolor tepus, aliquet eros ac, vestulum ante!', 'titulo-do-blog-3', 'blog-title-3', 'lorem/ipsum/pt', 'lorem/ipsum/en', 0),
(5, 1, 'Título do blog 5', 'Blog title 5', 'PT Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.\n\nProin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.\n\nAensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!', 'EN Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.  Proin ut ni diam. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Morbia sa quis ornare justo, in preum enim. Doec sit amet arcu eget leo maimus vestulum. Fusced in placerata est.  Aensean in velit uts orcd malesuada tincidunt at sit amet massaa. Sed coallis diam dui, sit at finibus nulla accumsan ac. Mauris quis au vel ipsum posuere pellene a in elit. Mauris quis au vel ipsum posuere pellene a in elit! Nullas consectetur nunc eumauris euismod, sedcinia tortor iaculis. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Proin ut ni diam. Pellentesque ullamcorper, ante vivultricies ultricies, nisi od imperdiet erat, sed vestibulum leo dui in ex? Fusced in placerata est!', 'titulo-do-blog-5', 'blog-title-5', 'teste/teste2/pt/pt', 'teste/teste2/en/en', 0),
(6, 1, 'Título do blog 6', 'Blog title 6', 'PT Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.', 'EN Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.', 'titulo-do-blog-6', 'blog-title-6', 'tagPT', 'tagEN', 0),
(7, 1, 'Título do blog 7', 'Blog title 7', 'PT Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.', 'EN Lorem ipsum dolor sit amet, consecttur adipscing elit. Suspendisses quisas gravi mauris. Suspendisses quisas gravi mauris? Mauris quis au vel ipsum posuere pellene a in elit. Mauria tinciduntd justog eu augue imperdiet, pretium diam convallis. Uta quis leo. Phasellusa vel tincidunt urnad... Nullamas semperd nunc libero, luctus mauris sollicitudin nec. Nunca nec tincidunt nibha. Morbia sa quis ornare justo, in preum enim. Pellentesque habitanta mori tristique senectus et netus et muada fames ac turpis egestas.', 'titulo-do-blog-7', 'blog-title-7', 'tagPT', 'TagEn', 0);

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
