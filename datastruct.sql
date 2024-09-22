-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22/09/2024 às 05:28
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
  `idresposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Despejando dados para a tabela `quiz_perguntas`
--

INSERT INTO `quiz_perguntas` (`idpergunta`, `pergunta_quiz`, `idresposta`) VALUES
(1, 'O que é um Tipo Abstrato de Dados (TAD) e qual é a sua importância na programação?', 1),
(2, 'Dê um exemplo de TAD e explique como ele pode ser implementado em uma linguagem de programação.', 2),
(3, 'Como a abstração de um TAD pode ajudar na modularização de um software?', 3),
(4, 'Qual a diferença entre um TAD e uma estrutura de dados concreta?', 4),
(5, 'Explique o conceito de encapsulamento em TADs e por que ele é importante para a manutenção do código.', 5),
(6, 'O que caracteriza uma lista simplesmente encadeada e como ela é estruturada?', 6),
(7, 'Qual é a complexidade de tempo para inserção e remoção de elementos em uma lista simplesmente encadeada?', 7),
(8, 'Como você pode implementar uma função para buscar um elemento específico em uma lista simplesmente encadeada?', 8),
(9, 'Qual é a diferença entre uma lista simplesmente encadeada e uma lista duplamente encadeada?', 9),
(10, 'Descreva o processo para reverter uma lista simplesmente encadeada.', 10),
(11, 'O que caracteriza uma lista duplamente encadeada e como ela é estruturada?', 11),
(12, 'Qual é a principal vantagem de uma lista duplamente encadeada em comparação com uma lista simplesmente encadeada?', 12),
(13, 'Explique como você pode remover um nó de uma lista duplamente encadeada sem perder referências.', 13),
(14, 'Qual é a complexidade de tempo para acessar um elemento em uma lista duplamente encadeada?', 14),
(15, 'Como você pode implementar a inserção de um elemento em uma posição específica de uma lista duplamente encadeada?', 15),
(16, 'O que é uma fila encadeada FIFO e como ela funciona?', 16),
(17, 'Qual é a diferença entre uma fila encadeada e uma fila implementada usando um vetor?', 17),
(18, 'Explique como você pode implementar as operações de enfileirar (enqueue) e desenfileirar (dequeue) em uma fila encadeada.', 18),
(19, 'Qual é a complexidade de tempo para as operações de enfileirar e desenfileirar em uma fila encadeada?', 19),
(20, 'Descreva uma situação em que uma fila encadeada seria a estrutura de dados mais apropriada a ser utilizada.', 20),
(21, 'O que é uma pilha LIFO e quais são suas características principais?', 21),
(22, 'Qual é a complexidade de tempo para as operações de push e pop em uma pilha?', 22),
(23, 'Explique como você pode implementar uma pilha usando uma lista encadeada.', 23),
(24, 'Quais são algumas aplicações comuns de pilhas em programação?', 24),
(25, 'Como você pode usar uma pilha para verificar se uma expressão de parênteses está balanceada?', 25);

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
(1, 'B', 'Um TAD é um tipo de dado específico da linguagem que não pode ser modificado.', 'Um TAD é uma abstração que define um conjunto de operações sem especificar a implementação, facilitando a modularização.', 'Um TAD é uma estrutura de dados que só pode ser usada em linguagens orientadas a objetos.', 'Um TAD é uma função que manipula dados sem definir claramente o tipo de dado.'),
(2, 'A', 'Lista Simplesmente Encadeada, implementada como uma classe com métodos para inserção e busca.', 'Pilha, implementada como uma variável global com operações para empilhar e desempilhar.', 'Array Dinâmico, implementado usando um vetor de tamanho fixo.', 'Fila Circular, implementada com uma estrutura de dados interna não visível ao usuário.'),
(3, 'A', 'Permitindo que o software ignore a implementação interna dos dados e se concentre apenas nas operações disponíveis.', 'Fornecendo acesso direto à memória onde os dados são armazenados.', 'Impedindo a reutilização de código em diferentes partes do software.', 'Exigindo que o usuário implemente cada operação de forma independente.'),
(4, 'B', 'TAD é uma implementação específica de um tipo de dado, enquanto estrutura de dados é um conceito geral.', 'TAD é uma abstração que define operações sem implementação, enquanto estrutura de dados é a implementação concreta de uma abstração.', 'TAD é uma biblioteca de funções para manipulação de dados, enquanto estrutura de dados é um tipo de variável.', 'TAD e estrutura de dados são termos intercambiáveis e não possuem diferenças.'),
(5, 'B', 'Encapsulamento é o processo de expor todos os detalhes internos da implementação para o usuário.', 'Encapsulamento é a técnica de esconder a implementação e expor apenas a interface, facilitando alterações futuras sem impactar o código que usa o TAD.', 'Encapsulamento é a prática de criar múltiplos TADs para a mesma operação.', 'Encapsulamento é um método para tornar a implementação de TADs mais complexa.'),
(6, 'B', 'Uma lista com nós que possuem referências tanto para o próximo quanto para o anterior.', 'Uma lista com nós que possuem apenas uma referência para o próximo nó.', 'Uma lista que é implementada usando um vetor dinâmico.', 'Uma lista que é armazenada em um banco de dados relacional.'),
(7, 'A', 'O(1) para ambas as operações, assumindo que temos uma referência direta ao nó.', 'O(n) para inserção e O(1) para remoção.', 'O(1) para inserção e O(n) para remoção.', 'O(n) para ambas as operações, pois é necessário percorrer a lista.'),
(8, 'A', 'Percorrendo a lista a partir do início e comparando cada nó com o valor procurado.', 'Usando um índice para acessar diretamente o elemento.', 'Adicionando todos os elementos em uma tabela hash para acesso rápido.', 'Criando uma cópia da lista para buscar o elemento em paralelo.'),
(9, 'A', 'A lista simplesmente encadeada possui referências apenas para o próximo nó, enquanto a lista duplamente encadeada possui referências para o próximo e o anterior.', 'A lista duplamente encadeada é sempre mais rápida em inserção e remoção que a lista simplesmente encadeada.', 'A lista simplesmente encadeada é usada apenas para filas, enquanto a lista duplamente encadeada é usada para pilhas.', 'A lista duplamente encadeada é uma versão mais compacta da lista simplesmente encadeada.'),
(10, 'B', 'Percorra a lista uma vez e inverta a ordem dos nós usando uma estrutura auxiliar.', 'Percorra a lista e altere a referência do próximo nó para o anterior de cada nó.', 'Crie uma nova lista e insira os elementos em ordem reversa.', 'Use uma pilha para armazenar os elementos e depois crie uma nova lista a partir da pilha.'),
(11, 'A', 'Uma lista onde cada nó possui referências tanto para o próximo quanto para o anterior nó.', 'Uma lista onde cada nó possui uma referência para o próximo nó e um índice para o elemento.', 'Uma lista que é implementada como uma matriz de tamanho fixo.', 'Uma lista onde os nós são armazenados em uma tabela hash.'),
(12, 'A', 'Permite acesso mais rápido ao final da lista, pois cada nó possui uma referência para o nó anterior.', 'Reduz o uso de memória, pois os nós são armazenados em uma estrutura de dados compacta.', 'Melhora o desempenho nas operações de busca por meio de índices rápidos.', 'Facilita a ordenação dos elementos devido ao armazenamento em vetor.'),
(13, 'A', 'Atualize as referências do nó anterior e do nó seguinte para pular o nó a ser removido.', 'Mova o nó a ser removido para o final da lista e depois o exclua.', 'Substitua o nó a ser removido por um nó vazio e atualize todas as referências.', 'Crie uma nova lista com todos os nós exceto o nó a ser removido.'),
(14, 'C', 'O(1), pois a lista possui acesso direto aos nós.', 'O(log n), devido à ordenação dos elementos.', 'O(n), pois é necessário percorrer a lista para encontrar o elemento.', 'O(n^2), devido à necessidade de percorrer todos os nós múltiplas vezes.'),
(15, 'A', 'Navegue até a posição desejada e atualize as referências do nó anterior e do próximo nó para incluir o novo nó.', 'Insira o elemento no início da lista e depois mova os elementos existentes para a posição correta.', 'Substitua um dos nós existentes na posição desejada pelo novo elemento.', 'Crie uma nova lista com o novo elemento na posição desejada e copie todos os outros elementos.'),
(16, 'C', 'Uma estrutura de dados onde o primeiro elemento inserido é o primeiro a ser removido, implementada com um vetor.', 'Uma estrutura de dados onde o primeiro elemento inserido é o último a ser removido, implementada com uma lista encadeada.', 'Uma estrutura de dados onde o primeiro elemento inserido é o primeiro a ser removido, implementada com uma lista encadeada.', 'Uma estrutura de dados onde os elementos são removidos em ordem aleatória, implementada com um array dinâmico.'),
(17, 'A', 'A fila encadeada pode crescer dinamicamente, enquanto a fila com vetor tem um tamanho fixo.', 'A fila encadeada é mais rápida para acesso aleatório de elementos, enquanto a fila com vetor é mais lenta.', 'A fila encadeada usa uma estrutura de dados interna visível ao usuário, enquanto a fila com vetor não.', 'A fila encadeada é sempre mais eficiente em termos de memória que a fila com vetor.'),
(18, 'A', 'Enfileirar adiciona um novo nó ao final da fila e desenfileirar remove o nó do início da fila, atualizando as referências adequadas.', 'Enfileirar remove um nó do início da fila e desenfileirar adiciona um novo nó ao final da fila.', 'Enfileirar e desenfileirar ambos alteram as referências do nó no meio da fila.', 'Enfileirar adiciona um novo nó ao início da fila e desenfileirar remove o nó do final da fila.'),
(19, 'B', 'Verifique se a referência do início da fila é nula.', 'Verifique se a referência do final da fila é nula.', 'Verifique se a fila contém apenas um nó.', 'Verifique se todos os nós da fila possuem uma referência nula.'),
(20, 'B', 'O(1) para ambas as operações, pois ambas envolvem apenas atualizações de referências.', 'O(n) para enfileiramento e O(1) para desenfileiramento.', 'O(1) para enfileiramento e O(n) para desenfileiramento.', 'O(n) para ambas as operações, pois é necessário percorrer a fila.'),
(21, 'C', 'Uma fila de prioridades encadeada ordena os elementos por prioridade, enquanto uma fila FIFO simples mantém a ordem de inserção.', 'Uma fila de prioridades encadeada é sempre mais lenta que uma fila FIFO simples.', 'Uma fila de prioridades encadeada é uma versão otimizada de uma fila FIFO simples com índices de prioridade.', 'Uma fila de prioridades encadeada e uma fila FIFO simples são conceitos idênticos e intercambiáveis.'),
(22, 'A', 'Insira o novo elemento na posição correta de acordo com sua prioridade, mantendo a ordem dos elementos com prioridades iguais.', 'Insira o novo elemento no final da fila e depois reordene toda a fila.', 'Substitua o elemento com a menor prioridade pelo novo elemento.', 'Adicione o novo elemento no início da fila, sem considerar a prioridade.'),
(23, 'A', 'Elementos com maior prioridade são removidos antes dos elementos com menor prioridade.', 'Elementos com menor prioridade são removidos antes dos elementos com maior prioridade.', 'A prioridade não afeta a ordem dos elementos, que é baseada na ordem de inserção.', 'Elementos são removidos aleatoriamente, independentemente da prioridade.'),
(24, 'A', 'O(n), pois é necessário encontrar a posição correta para o novo elemento.', 'O(1), pois o elemento é sempre inserido no final da fila.', 'O(log n), pois a fila é ordenada internamente.', 'O(n^2), devido à necessidade de reordenar a fila.'),
(25, 'A', 'Remova o elemento do início da fila, onde os elementos com maior prioridade são armazenados.', 'Remova o elemento do final da fila, que é onde os elementos com maior prioridade são armazenados.', 'Percorra toda a fila para encontrar e remover o elemento com a maior prioridade.', 'Remova aleatoriamente um elemento e depois reordene a fila.'),
(26, 'A', 'Uma pilha encadeada é uma estrutura onde cada nó possui uma referência para o próximo nó, implementando o conceito LIFO.', 'Uma pilha encadeada é uma estrutura onde cada nó possui referências tanto para o próximo quanto para o nó anterior.', 'Uma pilha encadeada é uma estrutura de dados que usa um vetor para armazenar os elementos.', 'Uma pilha encadeada é uma estrutura de dados onde os elementos são removidos em ordem aleatória.'),
(27, 'A', 'O último elemento inserido é o primeiro a ser removido, pois ele está no topo da pilha.', 'O primeiro elemento inserido é o primeiro a ser removido, pois ele está no topo da pilha.', 'Os elementos são removidos em ordem aleatória, independentemente da ordem de inserção.', 'O último elemento inserido é removido ao final da lista, não no topo da pilha.'),
(28, 'A', 'Push adiciona um novo nó ao topo da pilha e pop remove o nó do topo da pilha, atualizando as referências adequadas.', 'Push remove um nó do topo da pilha e pop adiciona um novo nó ao topo da pilha.', 'Push e pop ambos atualizam os nós intermediários da pilha.', 'Push adiciona um nó ao final da lista e pop remove um nó do início da lista.'),
(29, 'A', 'O(1) para ambas as operações, pois ambas envolvem apenas atualizações de referências.', 'O(n) para push e O(1) para pop.', 'O(1) para pop e O(n) para push.', 'O(n) para ambas as operações, devido à necessidade de percorrer a pilha.'),
(30, 'A', 'Verifique se a referência para o topo da pilha é nula.', 'Verifique se a referência para a base da pilha é nula.', 'Verifique se todos os nós da pilha possuem referências nulas.', 'Verifique se a pilha contém apenas um nó.');

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
(10, 'Manu', 0, 'Manoela Pinheiro da Silva', 'manoela2903@outlook.com', '$2y$10$AosoAP.yjddZS4U0GTxXqe.Y4I75E8EZXzJCLwMGE.7C/m8.o6rRi');

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
(4, 6, 0);

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
