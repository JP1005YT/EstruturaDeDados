-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2024 às 20:12
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `datastruct`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(4) NOT NULL,
  `username` varchar(40) NOT NULL,
  `cargo` varchar(30) NOT NULL,
  `coins` int(10) NOT NULL,
  `name` varchar(120) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `cargo`, `coins`, `name`, `email`, `password`) VALUES
(1, 'JP1005YT', 'DevFullStack', 0, 'João Pedro Garcia Girotto', 'godlolpro32@gmail.com', '$2y$10$08s0RlS065eGbvtTDv608eENdouZj23puVPf5/rJ.VmpFuiHgBdjW'),
(4, 'JP1005YT', 'Dev', 0, 'João Pedro Garcia Girotto', 'godlolpro32@gmail.com', '$2y$10$QhDQ39Uo8DK8boXiQLLpWuLE1QyHoa1W804muLAy1RA.AF5tc40K.'),
(5, 'Manu', 'Dev FrontEnd', 0, 'Manoela Pinheiro da Silva', 'manoela2903@outlook.com', '$2y$10$fmkcAi90/pcJTWvb.CDehewxstPJlqDK5p4jtoC./gBgaOUX7PhlS');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD FULLTEXT KEY `cargo` (`cargo`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
