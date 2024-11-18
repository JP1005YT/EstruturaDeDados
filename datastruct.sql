-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 18/11/2024 às 22:03
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

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
(12, '89ab2248701e98711c8c63020a44c77d.png', 'rostos', 100, 'Desconfiado'),
(13, '8ea1b020fd0e3c57b9d751d67866ee4f.png', 'rostos', 200, 'japa'),
(14, 'f166c997dc1b45ae5cdb2a50aa4aa75f.png', 'rostos', 1000, 'Miranha Simbionte');

-- --------------------------------------------------------

--
-- Estrutura para tabela `quiz_perguntas`
--

CREATE TABLE `quiz_perguntas` (
  `idpergunta` int(11) NOT NULL,
  `pergunta_quiz` varchar(255) DEFAULT NULL,
  `idresposta` int(11) NOT NULL,
  `nivel` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `quiz_perguntas`
--

INSERT INTO `quiz_perguntas` (`idpergunta`, `pergunta_quiz`, `idresposta`, `nivel`, `tema`) VALUES
(1, 'O que é um Tipo Abstrato de Dados (TAD)?', 1, 0, 'Tipo Abstrato de Dados'),
(2, 'Quais são os principais componentes de um TAD?', 2, 0, 'Tipo Abstrato de Dados'),
(3, 'Qual é a principal vantagem de usar um TAD?', 3, 0, 'Tipo Abstrato de Dados'),
(4, 'O que caracteriza uma pilha encadeada?', 4, 0, 'Pilha Encadeada'),
(5, 'Qual operação adiciona um elemento ao topo da pilha?', 5, 0, 'Pilha Encadeada'),
(6, 'Qual é a complexidade de tempo para acessar um elemento específico na pilha encadeada?', 6, 1, 'Pilha Encadeada'),
(7, 'O que define uma lista simplesmente encadeada?', 7, 0, 'Lista Simplesmente Encadeada'),
(8, 'Como é representado o último nó de uma lista simplesmente encadeada?', 8, 0, 'Lista Simplesmente Encadeada'),
(9, 'Qual é a complexidade para remover um elemento da lista simplesmente encadeada?', 9, 1, 'Lista Simplesmente Encadeada'),
(10, 'O que caracteriza uma lista duplamente encadeada?', 10, 0, 'Lista Duplamente Encadeada'),
(11, 'Como é representado o primeiro nó de uma lista duplamente encadeada?', 11, 1, 'Lista Duplamente Encadeada'),
(12, 'Qual é a principal vantagem de uma lista duplamente encadeada?', 12, 1, 'Lista Duplamente Encadeada'),
(13, 'O que caracteriza uma fila encadeada FIFO?', 13, 0, 'Fila Encadeada FIFO'),
(14, 'Quais operações básicas são realizadas em uma fila encadeada FIFO?', 14, 0, 'Fila Encadeada FIFO'),
(15, 'Qual é a complexidade de tempo para adicionar ou remover elementos de uma fila encadeada FIFO?', 15, 1, 'Fila Encadeada FIFO'),
(16, 'O que é uma Árvore AVL?', 16, 1, 'Árvore AVL'),
(17, 'Qual é o limite máximo do fator de balanceamento em uma Árvore AVL?', 17, 1, 'Árvore AVL'),
(18, 'Qual rotação é realizada se o fator de balanceamento for maior que 1 e o valor inserido for menor que a chave do nó esquerdo?', 18, 2, 'Árvore AVL'),
(19, 'O que é uma Árvore Rubro-Negra?', 19, 1, 'Árvore Rubro-Negra'),
(20, 'Quais são as cores dos nós em uma Árvore Rubro-Negra?', 20, 0, 'Árvore Rubro-Negra'),
(21, 'Qual é o objetivo das restrições de cores em uma Árvore Rubro-Negra?', 21, 1, 'Árvore Rubro-Negra'),
(22, 'O que caracteriza uma Fila de Prioridade Encadeada FIFO?', 22, 1, 'Fila de Prioridade Encadeada FIFO'),
(23, 'Quais são as operações realizadas em uma Fila de Prioridade Encadeada FIFO?', 23, 1, 'Fila de Prioridade Encadeada FIFO'),
(24, 'Qual é a complexidade de tempo para inserir ou remover elementos em uma Fila de Prioridade?', 24, 1, 'Fila de Prioridade Encadeada FIFO'),
(25, 'O que caracteriza uma Árvore de Busca Binária?', 25, 0, 'Árvore de Busca Binária'),
(26, 'Como é encontrado o nó com menor valor em uma Árvore de Busca Binária?', 26, 1, 'Árvore de Busca Binária'),
(27, 'Qual é a complexidade de tempo para buscar um elemento em uma Árvore de Busca Binária?', 27, 1, 'Árvore de Busca Binária'),
(28, 'O que é uma Árvore Trie?', 28, 1, 'Árvore Trie'),
(29, 'Qual é a principal vantagem de uma Árvore Trie?', 29, 1, 'Árvore Trie'),
(30, 'Qual é a complexidade de tempo para buscar uma palavra em uma Árvore Trie?', 30, 2, 'Árvore Trie'),
(31, 'O que caracteriza uma Árvore B?', 31, 1, 'Árvore B'),
(32, 'Qual é a característica dos nós em uma Árvore B?', 32, 1, 'Árvore B'),
(33, 'Qual é a complexidade de tempo para buscar um elemento em uma Árvore B?', 33, 1, 'Árvore B');

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
(1, 'B', 'Uma estrutura física usada para armazenar dados.', 'Um modelo lógico para organizar e manipular dados.', 'Uma linguagem de programação específica para dados.', 'Uma técnica para melhorar o desempenho de memória.'),
(2, 'A', 'Definição, operações e implementação.', 'Memória, CPU e compilação.', 'Variáveis, funções e classes.', 'Chaves, índices e buscas.'),
(3, 'B', 'Reduzir o consumo de memória.', 'Permitir maior abstração e reusabilidade.', 'Aumentar a velocidade de execução.', 'Facilitar a criação de interfaces gráficas.'),
(4, 'A', 'Um modelo de dados em forma de lista ligada.', 'Uma pilha de objetos baseada em array.', 'Uma árvore binária balanceada.', 'Uma estrutura FIFO.'),
(5, 'A', 'Push', 'Pop', 'Insert', 'Append'),
(6, 'A', 'O(1)', 'O(n)', 'O(log n)', 'O(n^2)'),
(7, 'A', 'Uma lista onde cada nó aponta apenas para o próximo.', 'Uma lista onde cada nó aponta para o próximo e o anterior.', 'Uma estrutura FIFO.', 'Uma estrutura com acesso aleatório.'),
(8, 'A', 'Com um ponteiro que aponta para o primeiro nó.', 'Com um ponteiro nulo.', 'Com um marcador especial.', 'Com um contador de nós.'),
(9, 'A', 'O(1)', 'O(n)', 'O(log n)', 'O(n^2)'),
(10, 'B', 'Uma lista onde cada nó aponta apenas para o próximo.', 'Uma lista onde cada nó aponta para o próximo e o anterior.', 'Uma estrutura com acesso aleatório.', 'Uma lista ordenada.'),
(11, 'A', 'O anterior aponta para nulo.', 'O próximo aponta para nulo.', 'Ambos apontam para nulo.', 'Não há ponteiros.'),
(12, 'A', 'Facilitar a navegação bidirecional.', 'Reduzir o consumo de memória.', 'Aumentar a complexidade.', 'Eliminar ponteiros adicionais.'),
(13, 'A', 'Uma estrutura onde o último elemento inserido é o primeiro a sair.', 'Uma estrutura onde o primeiro elemento inserido é o primeiro a sair.', 'Uma estrutura com acesso aleatório.', 'Uma lista duplamente encadeada.'),
(14, 'A', 'Push e Pop.', 'Enqueue e Dequeue.', 'Insert e Remove.', 'Adicionar e Excluir.'),
(15, 'A', 'O(1)', 'O(n)', 'O(log n)', 'O(n^2)'),
(16, 'B', 'Uma árvore binária qualquer.', 'Uma árvore binária de busca auto-balanceada.', 'Uma lista encadeada.', 'Uma estrutura desbalanceada.'),
(17, 'B', '2', '1', '0', '-1'),
(18, 'A', 'Rotação à esquerda.', 'Rotação à direita.', 'Rotação dupla à esquerda-direita.', 'Rotação dupla à direita-esquerda.'),
(19, 'B', 'Uma árvore binária desordenada.', 'Uma árvore binária balanceada com restrições de cor.', 'Uma lista duplamente encadeada.', 'Uma estrutura não-balanceada.'),
(20, 'B', 'Verde e Amarelo.', 'Preto e Vermelho.', 'Azul e Branco.', 'Roxo e Laranja.'),
(21, 'C', 'Aumentar o uso de memória.', 'Simplificar a implementação.', 'Manter o balanceamento sem muitas rotações.', 'Evitar buscas desnecessárias.'),
(22, 'A', 'Uma fila onde os elementos têm prioridade e o de maior prioridade sai primeiro.', 'Uma fila onde os elementos saem na ordem de chegada.', 'Uma estrutura de árvore balanceada.', 'Uma estrutura de lista encadeada sem prioridades.'),
(23, 'B', 'Operações de Enqueue e Dequeue.', 'Operações de Inserção e Remoção de acordo com a prioridade.', 'Operações de Push e Pop.', 'Operações de Add e Remove.'),
(24, 'C', 'O(1)', 'O(n)', 'O(log n)', 'O(n^2)'),
(25, 'A', 'Uma árvore onde os valores à esquerda de um nó são menores e à direita são maiores.', 'Uma árvore balanceada onde os valores à esquerda são maiores.', 'Uma árvore não balanceada.', 'Uma árvore com múltiplos filhos.'),
(26, 'D', 'O nó com maior valor é o nó mais à esquerda.', 'O nó com menor valor é o nó mais à direita.', 'A raiz da árvore é o nó com menor valor.', 'O nó com menor valor é o nó mais à esquerda.'),
(27, 'C', 'O(1)', 'O(n)', 'O(log n)', 'O(n^2)'),
(28, 'A', 'Uma árvore onde cada nó contém um caractere de uma palavra.', 'Uma árvore onde cada nó representa um prefixo de uma palavra.', 'Uma árvore de busca binária.', 'Uma árvore balanceada com múltiplos filhos.'),
(29, 'B', 'Armazenar dados em uma estrutura balanceada.', 'Armazenar palavras de forma eficiente para pesquisas rápidas.', 'Armazenar dados sem verificar a ordem.', 'Utilizar uma estrutura de lista encadeada.'),
(30, 'D', 'O(log n)', 'O(n^2)', 'O(1)', 'O(n)'),
(31, 'B', 'Uma árvore binária de busca auto-balanceada.', 'Uma árvore com múltiplos filhos por nó.', 'Uma árvore balanceada com dois filhos por nó.', 'Uma árvore com apenas um filho por nó.'),
(32, 'B', 'A árvore é sempre binária.', 'O número de filhos varia entre um valor mínimo e máximo por nó.', 'A árvore sempre tem um número fixo de filhos por nó.', 'Não há um limite de filhos por nó.'),
(33, 'C', 'O(1)', 'O(n)', 'O(log n)', 'O(n^2)');

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
(10, 'Manu', 100, 'Manoela Pinheiro da Silva', 'manoela2903@outlook.com', '$2y$10$AosoAP.yjddZS4U0GTxXqe.Y4I75E8EZXzJCLwMGE.7C/m8.o6rRi');

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
(10, 5, 1),
(10, 7, 1);

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
  MODIFY `iditem` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
