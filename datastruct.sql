-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2024 às 22:28
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
-- Estrutura da tabela `item`
--

CREATE TABLE `item` (
  `iditem` int(11) NOT NULL,
  `src_item` varchar(120) DEFAULT NULL,
  `categoria_item` varchar(60) DEFAULT NULL,
  `valor_item` int(11) DEFAULT NULL,
  `nome_item` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_perguntas`
--

CREATE TABLE `quiz_perguntas` (
  `idpergunta` int(11) NOT NULL,
  `pergunta_quiz` varchar(255) DEFAULT NULL,
  `idresposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `quiz_respostas`
--

CREATE TABLE `quiz_respostas` (
  `idquiz` int(11) NOT NULL,
  `resposta_quiz` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nickname_usuario` varchar(30) DEFAULT NULL,
  `coins_usuario` int(11) DEFAULT NULL,
  `nome_usuario` varchar(90) DEFAULT NULL,
  `email_usuario` varchar(120) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_has_item`
--

CREATE TABLE `usuario_has_item` (
  `usuario_idusuario` int(11) NOT NULL,
  `item_iditem` int(11) NOT NULL,
  `ativo_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`);

--
-- Índices para tabela `quiz_perguntas`
--
ALTER TABLE `quiz_perguntas`
  ADD PRIMARY KEY (`idpergunta`),
  ADD KEY `fk_quiz_perguntas_quiz_respostas1_idx` (`idresposta`);

--
-- Índices para tabela `quiz_respostas`
--
ALTER TABLE `quiz_respostas`
  ADD PRIMARY KEY (`idquiz`);

--
-- Índices para tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices para tabela `usuario_has_item`
--
ALTER TABLE `usuario_has_item`
  ADD PRIMARY KEY (`usuario_idusuario`,`item_iditem`),
  ADD KEY `fk_usuario_has_item_item1_idx` (`item_iditem`),
  ADD KEY `fk_usuario_has_item_usuario_idx` (`usuario_idusuario`);

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `quiz_perguntas`
--
ALTER TABLE `quiz_perguntas`
  ADD CONSTRAINT `fk_quiz_perguntas_quiz_respostas1` FOREIGN KEY (`idresposta`) REFERENCES `quiz_respostas` (`idquiz`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `usuario_has_item`
--
ALTER TABLE `usuario_has_item`
  ADD CONSTRAINT `fk_usuario_has_item_item1` FOREIGN KEY (`item_iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_item_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
