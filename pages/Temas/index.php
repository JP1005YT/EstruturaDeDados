<?php
    include_once './../../backend/classes/Usuario.php';
    include_once './../../backend/controllers/page_controller.php';
    session_start();

    spl_autoload_register(function ($class_name) {
        include './../../backend/classes/' . $class_name . '.php';
    });
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> DataStruct School | Home</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel="shortcut icon" href="./../../logo.png" />
    </head>
    <body>
    <?php
        PageController::renderHeader();
    ?>
    <main>
        <section class="card">
            <h1>Bem-vindo ao Mundo Mágico das Estruturas de Dados!</h1>
            <section>
                <h2>O que são Estruturas de Dados?</h2>
                <img src="../../src/BauTesouro.png" class="image">
                <p>
                    Imagine que você tem um baú do tesouro cheio de brinquedos. Você não vai querer jogar tudo lá de qualquer jeito, certo? 
                    Você vai querer organizar seus brinquedos para que possa encontrar o que quiser rapidamente. No mundo da programação, 
                    usamos algo chamado "estruturas de dados" para organizar nossos tesouros, que são os dados! Assim como você organiza seus 
                    brinquedos, os programadores organizam os dados para que possam usar e encontrar o que precisam de forma fácil e rápida.
                </p>
                <p>
                    Estruturas de dados são fundamentais em programação porque permitem armazenar, acessar e gerenciar dados de forma eficiente. 
                    Elas são usadas em quase todos os programas de computador para melhorar o desempenho e a organização do código. 
                    Sem estruturas de dados, seria muito difícil lidar com grandes quantidades de informação de maneira rápida e eficaz.
                </p>
            </section>
            <section>
                <h2>Exemplos Divertidos de Estruturas de Dados</h2>
                <section class="example">
                    <h3>1. Pilha de Panquecas 🥞</h3>
                    <img src="../../src/panquecas.png" class="image">
                    <p>
                        Uma pilha é como uma pilha de panquecas. Você coloca a primeira panqueca no prato, depois coloca outra por cima, e outra, 
                        e outra... Quando você vai comer, você começa pela panqueca do topo! Isso é o que chamamos de "LIFO" - Last In, First Out 
                        (Último a Entrar, Primeiro a Sair).
                    </p>
                    <pre>
                        <code>
                          1.    using System;
                          2.    using System.Collections.Generic;
                          3.
                          4.    Class PilhaDePanquecas {  
                          5.        static void Main() {
                          6.            // Cria uma pilha usando a classe Stack da biblioteca padrão.
                          7.            Stack pilha = new Stack();
                          8.     
                          9.            // Adiciona a string "Panqueca 1" ao topo da pilha.
                          10.           pilha.Push("Panqueca 1");
                          11.
                          12.           // Adiciona a string "Panqueca 2" ao topo da pilha.
                          13.           pilha.Push("Panqueca 2");
                          14.
                          15.           // Adiciona a string "Panqueca 3" ao topo da pilha.
                          16.           pilha.Push("Panqueca 3");
                          17.
                          18.           Console.WriteLine(pilha.Pop());  // Imprime e remove o elemento do topo da pilha (último adicionado).
                          19.       }
                          20.   } 
                        </code>
                    </pre>
                </section>
                <section class="example">
                    <h3>2. Fila do Tobogã 🏊</h3>
                    <img src="../../src/toboga.png" class="image">
                    <p>
                        Uma fila é como esperar na fila para o tobogã na piscina. A primeira pessoa que chega é a primeira a descer pelo tobogã. 
                        E a última pessoa que chega terá que esperar sua vez. Isso é "FIFO" - First In, First Out (Primeiro a Entrar, Primeiro a Sair).
                    </p>
                    <pre>
                        <code>
                            1.    using System;
                            2.    using System.Collections.Generic;

                            3.    Class FilaDoTobogã {
                            4.        static void Main() {
                            5.            // Cria uma fila usando a classe Queue da biblioteca padrão.
                            6.            Queue fila = new Queue();

                            7.            // Adiciona a string "Pessoa 1" ao final da fila.
                            8.            fila.Enqueue("Pessoa 1");

                            9.            // Adiciona a string "Pessoa 2" ao final da fila.
                            10.           fila.Enqueue("Pessoa 2");

                            11.           // Adiciona a string "Pessoa 3" ao final da fila.
                            12.           fila.Enqueue("Pessoa 3");
                                                                
                            13.           // Remove e retorna o primeiro elemento da fila, que é "Pessoa 1".
                            14.           Console.WriteLine(fila.Dequeue());

                            15.           // Remove e retorna o primeiro elemento da fila, que é "Pessoa 2".
                            16.           Console.WriteLine(fila.Dequeue());
                            17.       }
                            18.   }
                        </code>
                    </pre>
            </section>
            <section class="example">
                <h3>3. Caixa de Brinquedos 🧸</h3>
                <img src="../../src/brinquedos.png" class="image">
                <p>
                    Uma lista é como sua caixa de brinquedos onde você pode pegar qualquer brinquedo que quiser, não importa se está no topo, no 
                    meio ou no fundo. Você pode até mesmo colocar um novo brinquedo onde quiser!
                </p>
                <pre>
                    <code>
                        1.    using System;
                        2.    using System.Collections.Generic;
                        3.    Class CaixaDeBrinquedos {
                        4.        static void Main() { 
                        5.          // Criação de uma nova lista genérica do tipo string chamada caixa.
                        6.           List caixa = new List(); 

                        7.          // Adiciona o string "Carrinho" à lista caixa, na primeira posição (índice 0).
                        8.          caixa.Add("Carrinho"); 


                        9.          // Adiciona o string "Boneca" à lista caixa, na segunda posição (índice 1).
                        10.         caixa.Add("Boneca");  

                        11.         // Adiciona o string "Bola" à lista caixa, na terceira posição (índice 2).
                        12.         caixa.Add("Bola");

                        14.          // Imprime o elemento da lista caixa no índice 0, que é "Carrinho".
                        15.          Console.WriteLine(caixa[0]);
                                                                
                        16.         // Imprime o elemento da lista caixa no índice 2, que é "Bola".
                        17.         Console.WriteLine(caixa[2]);
                        18.       }
                        19.   }
                    </code>
                </pre>
            </section>
        </section>
        <section class="aulas">
            <h2>Aulas</h2>
            <ul class="class_grid">
            <?php
                // Função para listar todas as pastas de um diretório
                function listarPastas($directory) {
                    $pastas = [];

                    // Abre o diretório
                    if ($handle = opendir($directory)) {
                        // Itera sobre os arquivos e pastas do diretório
                        while (false !== ($entry = readdir($handle))) {
                            // Ignora os diretórios '.' e '..'
                            if ($entry !== '.' && $entry !== '..') {
                                // Constrói o caminho completo da entrada
                                $filePath = $directory . DIRECTORY_SEPARATOR . $entry;

                                // Verifica se é um diretório
                                if (is_dir($filePath)) {
                                    // Adiciona o nome da pasta à lista
                                    $pastas[] = $entry;
                                }
                            }
                        }
                        // Fecha o diretório
                        closedir($handle);
                    }

                    return $pastas;
                }

                // Chama a função e passa o caminho do diretório
                $directoryPath = '../../backend/temas/';
                $pastas = listarPastas($directoryPath);

                // Exibe os nomes das pastas extraídas
                foreach ($pastas as $pasta) {
                    echo "<li id='".$pasta."' class='this-theme'>". $pasta . "</li>";
                };
                ?>
            </ul>
            </section>
        </main>
            <script>
                    let all = document.querySelectorAll(".this-theme")
                     all.forEach((theme) => {
                        theme.addEventListener("click",()=>{
                            window.location.href = `../Aula?class=${theme.id}`
                        })
                    })
                    function dropdown(){
                        document.querySelector(".logged").classList.toggle("active")
                        document.querySelector("#icon").classList.toggle("active")
                     }
                     function switchPages(url){
                        window.location.href = url
                    }
            </script>
</body>
</html>