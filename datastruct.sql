-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 16/10/2024 às 16:40
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

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
-- Estrutura para tabela `item`
--

CREATE TABLE `item` (
  `iditem` int(11) NOT NULL,
  `src_item` varchar(120) DEFAULT NULL,
  `categoria_item` varchar(60) DEFAULT NULL,
  `valor_item` int(11) DEFAULT NULL,
  `nome_item` varchar(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `item`
--

INSERT INTO `item` (`iditem`, `src_item`, `categoria_item`, `valor_item`, `nome_item`) VALUES
(5, 'spider.png', 'rostos', 100, 'miranha'),
(6, '95bac426b4249ec62dc8f5e819ae9283.png', 'cabelos', 500, 'naruto'),
(7, '01ba4068418510c49cd15d853ab0137c.png', 'cabelos', 500, 'Rick'),
(9, 'ec86b291fd5b915748f72439682b89a0.png', 'rostos', 250, 'hollow knight'),
(10, 'd48e1c39b67f38215d8431ab181f9eb9.png', 'cabelos', 1000, 'ronaldo fenômeno'),
(11, '86b24ff8d1af23e4abea0716b4d7fd28.png', 'cabelos', 400, 'buja'),
(12, '', '', 0, ''),
(13, '8ea1b020fd0e3c57b9d751d67866ee4f.png', 'rostos', 200, 'japa'),
(14, 'f166c997dc1b45ae5cdb2a50aa4aa75f.png', 'rostos', 1000, 'Miranha Simbionte'),
(15, '162908df3418f02af42adcb52d9e6985.png', 'rostos', 200, 'Desconfiado'),
(16, 'bf4ef91d5702b08fc01e08ff517355eb.png', 'rostos', 200, 'choro'),
(17, 'e0578762c30a156b3722822c1950ce9c.png', 'rostos', 200, 'vesgo'),
(18, '87f8f14a4f022298a1aff9df7be34057.png', 'rostos', 200, 'fechadin'),
(19, '8e1795baa7e61800256e684a0805f5ce.png', 'rostos', 300, 'brancos'),
(20, '22d2b9ef3b11ec6e7022fedea52cc3be.png', 'rostos', 300, 'simpatico'),
(21, '67894c93ec8cc433cb994604261aa086.png', 'rostos', 300, 'bravo'),
(22, '699b2684ff4964574a507394e121c4c7.png', 'rostos', 200, 'feliz'),
(23, '5373a754a798c1ef670f87c2d705b303.png', 'rostos', 200, '  -_-'),
(24, '996c9bbe51518f4da39181153ec7d1ab.png', 'cabelos', 500, 'ryu'),
(25, 'ecba5fa82a68384a92785345845c40d9.png', 'calcas', 200, 'jeans'),
(26, 'ba24e43b48b326c7e85df2cd3f5cc517.png', 'calcas', 500, 'angelical'),
(27, '6e68eaed44b90368c7a6b3c4f55d119d.png', 'torsos', 200, 'blusa vermelha'),
(28, '5f52a965e4c75e79787d1bcf087cb219.png', 'torsos', 400, 'roxo'),
(29, '03cda14c7e0a463016d95cf7034b3b0e.png', 'torsos', 500, 'blusa preta'),
(30, 'd280eba5868b1ee14059ffa30191cd99.png', 'torsos', 1000, 'simbionte'),
(31, 'a3c8d80c56cc4937047526f688941f7c.png', 'calcas', 1000, 'simbionte'),
(32, 'a2df5a91b1537392799f1bc2c62579a1.png', 'torsos', 300, 'branca '),
(33, '08311ef8606f0eb7f1d6fd4cad5f47c3.png', 'calcas', 200, 'bolinha '),
(34, '0589c65b9ff11684785ece20afc3d657.png', 'calcas', 500, 'calça preta ');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz_perguntas`
--

CREATE TABLE `quiz_perguntas` (
  `idpergunta` int(11) NOT NULL,
  `pergunta_quiz` varchar(255) DEFAULT NULL,
  `idresposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `quiz_perguntas`
--

INSERT INTO `quiz_perguntas` (`idpergunta`, `pergunta_quiz`, `idresposta`) VALUES
(1, 'Qual é a principal vantagem de usar uma fila de prioridades encadeada?', 1),
(2, 'Qual é a complexidade de tempo para acessar um elemento em uma fila de prioridades encadeada?', 2),
(3, 'Qual estrutura de dados é usada para implementar uma fila de prioridades encadeada?', 3),
(4, 'Qual é a principal desvantagem de usar uma fila de prioridades encadeada?', 4),
(5, 'Dado o código exemplo na aula, qual é a função do método enfileirar?', 5),
(6, 'Qual é a principal vantagem de usar uma lista simplesmente encadeada?', 6),
(7, 'Qual é a complexidade de tempo para acessar um elemento em uma lista simplesmente encadeada?', 7),
(8, 'Qual estrutura de dados é usada para implementar uma lista simplesmente encadeada?', 8),
(9, 'Qual é a principal desvantagem de usar uma lista simplesmente encadeada?', 9),
(10, 'Dado o código exemplo na aula, qual é a função do método AdicionarAmigoAoFinal?', 10),
(11, 'Qual é a principal vantagem de usar uma lista duplamente encadeada?', 11),
(12, 'Qual é a complexidade de tempo para acessar um elemento em uma lista duplamente encadeada?', 12),
(13, 'Qual estrutura de dados é usada para implementar uma lista duplamente encadeada?', 13),
(14, 'Qual é a principal desvantagem de usar uma lista duplamente encadeada?', 14),
(15, 'Dado o código exemplo na aula, qual é a função do método AdicionarAmigoAoFinal?', 15),
(16, 'Qual é a principal vantagem de usar uma fila encadeada?', 16),
(17, 'Qual é a complexidade de tempo para acessar um elemento em uma fila encadeada?', 17),
(18, 'Qual estrutura de dados é usada para implementar uma fila encadeada?', 18),
(19, 'Qual é a principal desvantagem de usar uma fila encadeada?', 19),
(20, 'Dado o código exemplo na aula, qual é a função do método enfileirar?', 20),
(21, 'Qual é a principal vantagem de usar um TAD (Tipo Abstrato de Dados)?', 21),
(22, 'Qual é a complexidade de tempo para acessar um elemento em um TAD?', 22),
(23, 'Qual estrutura de dados é usada para implementar uma pilha em um TAD?', 23),
(24, 'Qual é a principal desvantagem de usar um TAD?', 24),
(25, 'Dado o código exemplo na aula, qual é a função do método Colocar na CaixaDeEmpilhar?', 25),
(26, 'Qual é a principal vantagem de usar uma pilha encadeada?', 26),
(27, 'Qual é a complexidade de tempo para acessar um elemento em uma pilha encadeada?', 27),
(28, 'Qual estrutura de dados é usada para implementar uma pilha encadeada?', 28),
(29, 'Qual é a principal desvantagem de usar uma pilha encadeada?', 29),
(30, 'Dado o código exemplo na aula, qual é a função do método empilhar?', 30);

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz_respostas`
--

CREATE TABLE `quiz_respostas` (
  `idquiz` int(11) NOT NULL,
  `resposta_quiz` varchar(1) DEFAULT NULL,
  `alternativa_a` text DEFAULT NULL,
  `alternativa_b` text DEFAULT NULL,
  `alternativa_c` text DEFAULT NULL,
  `alternativa_d` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `quiz_respostas`
--

INSERT INTO `quiz_respostas` (`idquiz`, `resposta_quiz`, `alternativa_a`, `alternativa_b`, `alternativa_c`, `alternativa_d`) VALUES
(1, 'C', 'Acesso direto aos elementos', 'Menor uso de memória', 'Facilidade de inserção e remoção de elementos', 'Melhor desempenho em operações de busca'),
(2, 'C', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)'),
(3, 'B', 'Array', 'Nó', 'Pilha', 'Fila'),
(4, 'C', 'Difícil de implementar', 'Uso excessivo de memória', 'Acesso sequencial aos elementos', 'Complexidade de inserção e remoção'),
(5, 'C', 'Insere um nó no final da fila', 'Insere um nó no início da fila', 'Insere um nó na posição correta de acordo com a prioridade', 'Remove um nó da fila'),
(6, 'C', 'Menor uso de memória', 'Acesso direto aos elementos', 'Facilidade de inserção e remoção de elementos', 'Melhor desempenho em operações de busca'),
(7, 'C', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)'),
(8, 'B', 'Array', 'Nó', 'Pilha', 'Fila'),
(9, 'C', 'Difícil de implementar', 'Uso excessivo de memória', 'Acesso sequencial aos elementos', 'Complexidade de inserção e remoção'),
(10, 'B', 'Insere um nó no início da lista', 'Insere um nó no final da lista', 'Remove um nó do início da lista', 'Remove um nó do final da lista'),
(11, 'C', 'Menor uso de memória', 'Acesso direto aos elementos', 'Facilidade de navegação bidirecional', 'Melhor desempenho em operações de busca'),
(12, 'C', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)'),
(13, 'B', 'Array', 'Nó', 'Pilha', 'Fila'),
(14, 'B', 'Difícil de implementar', 'Uso excessivo de memória', 'Acesso sequencial aos elementos', 'Complexidade de inserção e remoção'),
(15, 'B', 'Insere um nó no início da lista', 'Insere um nó no final da lista', 'Remove um nó do início da lista', 'Remove um nó do final da lista'),
(16, 'D', 'Menor uso de memória', 'Acesso direto aos elementos', 'Facilidade de inserção e remoção de elementos', 'Garantia de ordem de processamento FIFO'),
(17, 'C', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)'),
(18, 'B', 'Array', 'Nó', 'Pilha', 'Fila'),
(19, 'C', 'Difícil de implementar', 'Uso excessivo de memória', 'Acesso sequencial aos elementos', 'Complexidade de inserção e remoção'),
(20, 'A', 'Insere um nó no final da fila', 'Insere um nó no início da fila', 'Remove um nó do início da fila', 'Remove um nó do final da fila'),
(21, 'C', 'Menor uso de memória', 'Acesso direto aos elementos', 'Organização e manipulação consistente de dados', 'Melhor desempenho em operações de busca'),
(22, 'D', 'O(1)', 'O(log n)', 'O(n)', 'Depende da implementação específica do TAD'),
(23, 'C', 'Array', 'Nó', 'Pilha', 'Fila'),
(24, 'A', 'Difícil de implementar', 'Uso excessivo de memória', 'Acesso sequencial aos elementos', 'Complexidade de inserção e remoção'),
(25, 'B', 'Insere um bloco no final da pilha', 'Insere um bloco no início da pilha', 'Remove um bloco do início da pilha', 'Remove um bloco do final da pilha'),
(26, 'D', 'Menor uso de memória', 'Acesso direto aos elementos', 'Facilidade de inserção e remoção de elementos', 'Crescimento dinâmico sem tamanho fixo'),
(27, 'C', 'O(1)', 'O(log n)', 'O(n)', 'O(n log n)'),
(28, 'B', 'Array', 'Nó', 'Pilha', 'Fila'),
(29, 'C', 'Difícil de implementar', 'Uso excessivo de memória', 'Acesso sequencial aos elementos', 'Complexidade de inserção e remoção'),
(30, 'B', 'Insere um nó no final da pilha', 'Insere um nó no início da pilha', 'Remove um nó do início da pilha', 'Remove um nó do final da pilha');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `nickname_usuario` varchar(30) DEFAULT NULL,
  `coins_usuario` int(11) DEFAULT NULL,
  `nome_usuario` varchar(90) DEFAULT NULL,
  `email_usuario` varchar(120) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`idusuario`, `nickname_usuario`, `coins_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`) VALUES
(4, 'JP1005YT', 0, 'João Pedro Garcia Girotto', 'godlolpro32@gmail.com', '$2y$10$haPC5yYwLqP/X1Nr11PfG.WXhI9PbwRuonNnMPhKbfcj1Qs2yMNQG'),
(5, 'admin', 0, 'admin', 'admin', '$2y$10$1plFXalBSBvm0/8K34UsF.nwnN2qO/HceMDQL62FO2AJoIlUXY1FO'),
(10, 'Manu', 0, 'Manoela Pinheiro da Silva', 'manoela2903@outlook.com', '$2y$10$AosoAP.yjddZS4U0GTxXqe.Y4I75E8EZXzJCLwMGE.7C/m8.o6rRi'),
(11, 'BUJA', 0, 'buja bujaaa', 'jooj.soares.227@gmail.com', '$2y$10$cTZroieoFQM6ML85nCERj.k7B25hhyOaLqc9HYJryp02N0/0VanAi');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario_has_item`
--

CREATE TABLE `usuario_has_item` (
  `usuario_idusuario` int(11) NOT NULL,
  `item_iditem` int(11) NOT NULL,
  `ativo_item` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `usuario_has_item`
--

INSERT INTO `usuario_has_item` (`usuario_idusuario`, `item_iditem`, `ativo_item`) VALUES
(4, 6, 0),
(4, 12, 0),
(5, 5, 0),
(5, 10, 1),
(5, 11, 0),
(5, 12, 0),
(5, 13, 1),
(5, 14, 0),
(5, 15, 0),
(5, 23, 0),
(5, 30, 0),
(5, 31, 0),
(11, 11, 0);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`iditem`);

--
-- Índices de tabela `quiz_perguntas`
--
ALTER TABLE `quiz_perguntas`
  ADD PRIMARY KEY (`idpergunta`),
  ADD KEY `fk_quiz_perguntas_quiz_respostas1_idx` (`idresposta`);

--
-- Índices de tabela `quiz_respostas`
--
ALTER TABLE `quiz_respostas`
  ADD PRIMARY KEY (`idquiz`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- Índices de tabela `usuario_has_item`
--
ALTER TABLE `usuario_has_item`
  ADD PRIMARY KEY (`usuario_idusuario`,`item_iditem`),
  ADD KEY `fk_usuario_has_item_item1_idx` (`item_iditem`),
  ADD KEY `fk_usuario_has_item_usuario_idx` (`usuario_idusuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `quiz_perguntas`
--
ALTER TABLE `quiz_perguntas`
  ADD CONSTRAINT `fk_quiz_perguntas_quiz_respostas1` FOREIGN KEY (`idresposta`) REFERENCES `quiz_respostas` (`idquiz`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `usuario_has_item`
--
ALTER TABLE `usuario_has_item`
  ADD CONSTRAINT `fk_usuario_has_item_item1` FOREIGN KEY (`item_iditem`) REFERENCES `item` (`iditem`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuario_has_item_usuario` FOREIGN KEY (`usuario_idusuario`) REFERENCES `usuario` (`idusuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
