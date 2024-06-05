<?php
    include_once './../../backend/classes/Usuario.php';
    session_start();

    spl_autoload_register(function ($class_name) {
        include './../../backend/classes/' . $class_name . '.php';
    });
    // $json = json_decode(file_get_contents('../../backend/temas/tad.json'),true);
    // echo $json['content'];
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
    <header class="mainHeader">
        <div class="logo">
            <img src="./../../logo.png" height="70px">
            <h1>DataStruct School</h1>
        </div>
        <nav>
            <ul>
                <li>
                    <a href="./../../index.php">Página Principal</a>
                </li>
                <li>Temas</li>
            </ul>
            <?php
                if(isset($_SESSION['user'])){
                    $user = $_SESSION['user'];
                    echo '<section class="logged" onclick="dropdown()">
                            <section class="content">
                                '.$user->getUsername() .'
                                <i class="bx bxs-chevron-down" id="icon"></i>
                            </section>
                            <div class="dropdown">
                            <ul>
                                <li>Perfil</li>
                                
                                <li>
                                    <a href="./backend/functions/sair.php">Sair</a>
                                </li>
                            </ul>
                        </div>
                        </section>';
                }else{
                    echo '<section>
                            <button class="cadastrar" onclick="switchPages('."'../../pages/Cadastrar/'".')"">Cadastrar-se</button>
                            <button class="entrar" onclick="switchPages('."'../../pages/Entrar/'".')">Entrar</button>
                        </section>';
                }
            ?>
        </nav>
    </header>
    <main>
        <section class="card">
            <h1>Bem-vindo ao Mundo Mágico das Estruturas de Dados!</h1>
            <section>
                <h2>O que são Estruturas de Dados?</h2>
                <img src="../../src/BauTesouro.png">
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
                    <p>
                        Uma pilha é como uma pilha de panquecas. Você coloca a primeira panqueca no prato, depois coloca outra por cima, e outra, 
                        e outra... Quando você vai comer, você começa pela panqueca do topo! Isso é o que chamamos de "LIFO" - Last In, First Out 
                        (Último a Entrar, Primeiro a Sair).
                    </p>
                    <pre>
                        <code>
                            using System;
                            using System.Collections.Generic;

                            class PilhaDePanquecas {
                                static void Main() {
                                    Stack<string> pilha = new Stack<string>();
                                    pilha.Push("Panqueca 1");
                                    pilha.Push("Panqueca 2");
                                    pilha.Push("Panqueca 3");
                                    
                                    Console.WriteLine(pilha.Pop()); // Panqueca 3
                                    Console.WriteLine(pilha.Pop()); // Panqueca 2
                                }
                            }
                        </code>
                    </pre>
                </section>
                <section class="example">
                    <h3>2. Fila do Tobogã 🏊</h3>
                    <p>
                        Uma fila é como esperar na fila para o tobogã na piscina. A primeira pessoa que chega é a primeira a descer pelo tobogã. 
                        E a última pessoa que chega terá que esperar sua vez. Isso é "FIFO" - First In, First Out (Primeiro a Entrar, Primeiro a Sair).
                    </p>
                    <pre>
                        <code>
                            using System;
                            using System.Collections.Generic;

                            class FilaDoTobogã {
                                static void Main() {
                                    Queue<string> fila = new Queue<string>();
                                    fila.Enqueue("Pessoa 1");
                                    fila.Enqueue("Pessoa 2");
                                    fila.Enqueue("Pessoa 3");
                                    
                                    Console.WriteLine(fila.Dequeue()); // Pessoa 1
                                    Console.WriteLine(fila.Dequeue()); // Pessoa 2
                                }
                            }
                        </code>
                    </pre>
            </section>
            <section class="example">
                <h3>3. Caixa de Brinquedos 🧸</h3>
                <p>
                    Uma lista é como sua caixa de brinquedos onde você pode pegar qualquer brinquedo que quiser, não importa se está no topo, no 
                    meio ou no fundo. Você pode até mesmo colocar um novo brinquedo onde quiser!
                </p>
                <pre>
                    <code>
                        using System;
                        using System.Collections.Generic;

                        class CaixaDeBrinquedos {
                            static void Main() {
                                List<string> caixa = new List<string>();
                                caixa.Add("Carrinho");
                                caixa.Add("Boneca");
                                caixa.Add("Bola");
                                
                                Console.WriteLine(caixa[0]); // Carrinho
                                Console.WriteLine(caixa[2]); // Bola
                            }
                        }
                    </code>
                </pre>
            </section>
        </section>
        <section class="aulas">
            <h2>Aulas</h2>
            <ul class="class_grid">
            <?php
                // Função para ler todos os arquivos JSON de um diretório e retornar os valores da chave "nome"
                function listarNomes($directory) {
                    $arquivos = [];

                    // Abre o diretório
                    if ($handle = opendir($directory)) {
                        // Itera sobre os arquivos do diretório
                        while (false !== ($entry = readdir($handle))) {
                            // Ignora os diretórios '.' e '..'
                            if ($entry !== '.' && $entry !== '..') {
                                // Constrói o caminho completo do arquivo
                                $filePath = $directory . DIRECTORY_SEPARATOR . $entry;

                                // Verifica se é um arquivo JSON
                                if (pathinfo($filePath, PATHINFO_EXTENSION) === 'json') {
                                    // Lê o conteúdo do arquivo
                                    $jsonContent = file_get_contents($filePath);
                                    // Decodifica o JSON
                                    $data = json_decode($jsonContent, true);

                                    // Verifica se o JSON foi decodificado corretamente e se contém a chave "nome"
                                    if ($data !== null && isset($data['nome'])) {
                                        // Adiciona o valor de "nome" e o nome do arquivo à lista
                                        $arquivos[] = array(
                                            'nome_arquivo' => $entry,
                                            'nome_json' => $data['nome']
                                        );
                                    }
                                }
                            }
                        }
                        // Fecha o diretório
                        closedir($handle);
                    }

                    return $arquivos;
                }

                // Chama a função e passa o caminho do diretório
                $directoryPath = '../../backend/temas/';
                $arquivos = listarNomes($directoryPath);

                // Exibe os nomes extraídos
                foreach ($arquivos as $arquivo) {
                    echo "<li id='".$arquivo['nome_arquivo']."' class='this-theme'>". $arquivo['nome_json'] . "</li>";
                }
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
    </script>
    </body>
</html>