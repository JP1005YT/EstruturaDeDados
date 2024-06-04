<?php
    include_once './../../backend/classes/Usuario.php';
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
                            <section class="dropdown">
                                <ul>
                                    <li>Perfil</li>
                                    
                                    <li>
                                        <a href="./backend/functions/sair.php">Sair</a>
                                    </li>
                                </ul>
                            </section>
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
    </section>

    <section class="card">
        <h1>Caixa Mágica de Brinquedos - TAD (Tipo Abstrato de Dados)</h1>
        <section>
            <h2>O que é uma Caixa Mágica?</h2>
            <p>
                Imagine que você tem uma caixa mágica onde você pode guardar seus brinquedos favoritos. Mas essa não é uma caixa comum; ela tem 
                regras especiais sobre como você pode colocar e tirar brinquedos dela. Essa caixa mágica é o que os adultos chamam de TAD, ou Tipo 
                Abstrato de Dados. Ela ajuda a manter seus brinquedos organizados e prontos para brincar sempre que você quiser!
            </p>
            <p>
                Um TAD é uma maneira de organizar dados de forma estruturada e eficiente. É muito importante na programação porque permite que 
                você manipule dados de uma forma consistente, independentemente de como eles são implementados por trás das cenas. Pense no TAD 
                como as regras de um jogo: ele define como você pode jogar, mas não se preocupa com os detalhes internos.
            </p>
        </section>
        <section>
            <h2>Brincando com a Caixa Mágica</h2>
            <p>
                Vamos ver como você pode brincar com duas caixas mágicas diferentes: a Caixa de Empilhar e a Caixa de Enfileirar. Essas caixas 
                mágicas são exemplos de como você pode organizar e acessar dados de maneiras diferentes.
            </p>
        </section>
        <section class="example">
            <h3>Caixa de Empilhar</h3>
            <p>
                A Caixa de Empilhar é como uma torre de blocos. Você coloca um bloco em cima do outro, e quando quer brincar, você só pode pegar 
                o bloco do topo! É uma maneira divertida de brincar, mas você precisa seguir as regras da caixa.
            </p>
            <pre>
                <code>
                    // Exemplo em C#
                    public class CaixaDeEmpilhar {
                        private Stack<int> pilha = new Stack<int>();

                        public void Colocar(int bloco) {
                            pilha.Push(bloco);
                        }

                        public int Pegar() {
                            if (pilha.Count > 0)
                                return pilha.Pop();
                            else
                                throw new InvalidOperationException("A pilha está vazia!");
                        }

                        public bool EstaVazia() {
                            return pilha.Count == 0;
                        }

                        public int OlharTopo() {
                            if (pilha.Count > 0)
                                return pilha.Peek();
                            else
                                throw new InvalidOperationException("A pilha está vazia!");
                        }
                    }
                </code>
            </pre>
        </section>
        <section class="example">
            <h3>Caixa de Enfileirar</h3>
            <p>
                A Caixa de Enfileirar é como uma fila para o escorregador. Você entra na fila e espera sua vez. Quando é sua vez, você pode brincar! 
                E lembre-se, quem chega primeiro, brinca primeiro.
            </p>
            <pre>
                <code>
                    // Exemplo em C#
                    public class CaixaDeEnfileirar {
                        private Queue<int> fila = new Queue<int>();

                        public void EntrarNaFila(int brinquedo) {
                            fila.Enqueue(brinquedo);
                        }

                        public int Brincar() {
                            if (fila.Count > 0)
                                return fila.Dequeue();
                            else
                                throw new InvalidOperationException("A fila está vazia!");
                        }

                        public bool EstaVazia() {
                            return fila.Count == 0;
                        }
                    }
                </code>
            </pre>
        </section>
    </section>

    <section class="card">
        <h1>Listas Simplesmente Encadeadas</h1>
        <section>
            <h2>O que é uma Lista Simplesmente Encadeada?</h2>
            <p>
                Imagine que você tem uma fila de amigos, e cada amigo está segurando a mão do próximo amigo na fila. 
                Esta é uma maneira fácil de pensar em uma lista simplesmente encadeada. Cada amigo é um "nó" na lista, 
                e a mão que eles estão segurando é a "ligação" para o próximo nó.
            </p>
            <p>
                As listas simplesmente encadeadas são importantes na programação porque permitem armazenar e organizar dados de forma eficiente. 
                Elas são usadas quando você precisa de uma estrutura de dados que pode crescer ou diminuir dinamicamente, sem precisar de um 
                tamanho fixo. Além disso, elas facilitam a inserção e remoção de elementos em qualquer ponto da lista.
            </p>
        </section>
        <section>
            <h2>Como Funciona?</h2>
            <p>
                Vamos ver como essa fila de amigos funciona e como você pode brincar com ela. Vamos explorar algumas operações básicas que você 
                pode realizar em uma lista simplesmente encadeada.
            </p>
            <section class="example">
                <h3>Adicionando um Amigo ao Final</h3>
                <p>
                    Quando você quer adicionar um novo amigo ao final da fila, você pede ao último amigo que segure a mão do novo amigo. 
                    Agora, o novo amigo é o último da fila!
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class No {
                            public int Valor;
                            public No Proximo;

                            public No(int valor) {
                                Valor = valor;
                                Proximo = null;
                            }
                        }

                        public class ListaSimplesmenteEncadeada {
                            private No primeiro;

                            public ListaSimplesmenteEncadeada() {
                                primeiro = null;
                            }

                            public void AdicionarAmigoAoFinal(int valor) {
                                No novoNo = new No(valor);
                                if (primeiro == null) {
                                    primeiro = novoNo;
                                } else {
                                    No atual = primeiro;
                                    while (atual.Proximo != null) {
                                        atual = atual.Proximo;
                                    }
                                    atual.Proximo = novoNo;
                                }
                            }
                        }
                    </code>
                </pre>
            </section>
            <section class="example">
                <h3>Adicionando um Amigo ao Início</h3>
                <p>
                    Quando você quer adicionar um novo amigo ao início da fila, o novo amigo segura a mão do amigo que estava na frente, 
                    e agora ele é o primeiro da fila!
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class ListaSimplesmenteEncadeada {
                            private No primeiro;

                            public ListaSimplesmenteEncadeada() {
                                primeiro = null;
                            }

                            public void AdicionarAmigoAoInicio(int valor) {
                                No novoNo = new No(valor);
                                novoNo.Proximo = primeiro;
                                primeiro = novoNo;
                            }
                        }
                    </code>
                </pre>
            </section>
            <section class="example">
                <h3>Adicionando um Amigo no Meio</h3>
                <p>
                    Quando você quer adicionar um novo amigo no meio da fila, você pede ao amigo que está no meio para segurar a mão do novo amigo, 
                    e o novo amigo segura a mão do próximo amigo. Agora, ele está no meio da fila!
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class ListaSimplesmenteEncadeada {
                            private No primeiro;

                            public ListaSimplesmenteEncadeada() {
                                primeiro = null;
                            }

                            public void AdicionarAmigoNoMeio(int valor, int posicao) {
                                No novoNo = new No(valor);
                                if (posicao == 0) {
                                    AdicionarAmigoAoInicio(valor);
                                } else {
                                    No atual = primeiro;
                                    for (int i = 0; i < posicao - 1 && atual != null; i++) {
                                        atual = atual.Proximo;
                                    }
                                    if (atual != null) {
                                        novoNo.Proximo = atual.Proximo;
                                        atual.Proximo = novoNo;
                                    } else {
                                        throw new ArgumentOutOfRangeException("Posição inválida!");
                                    }
                                }
                            }
                        }
                    </code>
                </pre>
            </section>
            <section class="example">
                <h3>Brincando com a Fila</h3>
                <p>
                    Se você quiser saber quem é o primeiro amigo na fila, você simplesmente pergunta ao amigo que está na frente.
                    E se quiser saber quem vem depois, é só perguntar a cada amigo quem eles estão segurando a mão.
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class ListaSimplesmenteEncadeada {
                            // ... (outros métodos)

                            public No VerPrimeiroAmigo() {
                                return primeiro;
                            }

                            public No VerProximoAmigo(No atualAmigo) {
                                return atualAmigo?.Proximo;
                            }
                        }
                    </code>
                </pre>
            </section>
        </section>
    </section>

    <section class="card">
        <h1>Listas Duplamente Encadeadas</h1>
        <section>
            <h2>O que é uma Lista Duplamente Encadeada?</h2>
            <p>
                Imagine que você tem uma fila de amigos, mas desta vez, cada amigo está segurando a mão do amigo à sua frente e também do amigo atrás dele. 
                Esta é uma maneira fácil de pensar em uma lista duplamente encadeada. Cada amigo é um "nó" na lista, e as mãos que eles estão segurando 
                são as "ligações" para o próximo e o anterior nó.
            </p>
            <p>
                As listas duplamente encadeadas são importantes na programação porque oferecem mais flexibilidade do que as listas simplesmente encadeadas. 
                Elas permitem que você navegue tanto para frente quanto para trás na lista, facilitando a inserção e remoção de elementos em qualquer posição. 
                Elas são usadas em diversas aplicações, como na implementação de navegadores (para manter o histórico de navegação), em sistemas de gerenciamento 
                de memória, e em muitas outras situações onde o acesso bidirecional é necessário.
            </p>
        </section>
        <section>
            <h2>Como Funciona?</h2>
            <p>
                Vamos ver como essa fila de amigos funciona e como você pode brincar com ela. Vamos explorar algumas operações básicas que você 
                pode realizar em uma lista duplamente encadeada.
            </p>
            <section class="example">
                <h3>Adicionando um Amigo ao Final</h3>
                <p>
                    Quando você quer adicionar um novo amigo ao final da fila, você pede ao último amigo que segure a mão do novo amigo. 
                    O novo amigo então segura a mão do último amigo e agora eles são amigos!
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class No {
                            public int Valor;
                            public No Proximo;
                            public No Anterior;

                            public No(int valor) {
                                Valor = valor;
                                Proximo = null;
                                Anterior = null;
                            }
                        }

                        public class ListaDuplamenteEncadeada {
                            private No primeiro;
                            private No ultimo;

                            public ListaDuplamenteEncadeada() {
                                primeiro = null;
                                ultimo = null;
                            }

                            public void AdicionarAmigoAoFinal(int valor) {
                                No novoNo = new No(valor);
                                if (primeiro == null) {
                                    primeiro = novoNo;
                                    ultimo = novoNo;
                                } else {
                                    ultimo.Proximo = novoNo;
                                    novoNo.Anterior = ultimo;
                                    ultimo = novoNo;
                                }
                            }
                        }
                    </code>
                </pre>
            </section>
            <section class="example">
                <h3>Adicionando um Amigo ao Início</h3>
                <p>
                    Quando você quer adicionar um novo amigo ao início da fila, o novo amigo segura a mão do primeiro amigo, 
                    e agora ele é o primeiro da fila!
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class ListaDuplamenteEncadeada {
                            private No primeiro;
                            private No ultimo;

                            public ListaDuplamenteEncadeada() {
                                primeiro = null;
                                ultimo = null;
                            }

                            public void AdicionarAmigoAoInicio(int valor) {
                                No novoNo = new No(valor);
                                if (primeiro == null) {
                                    primeiro = novoNo;
                                    ultimo = novoNo;
                                } else {
                                    novoNo.Proximo = primeiro;
                                    primeiro.Anterior = novoNo;
                                    primeiro = novoNo;
                                }
                            }
                        }
                    </code>
                </pre>
            </section>
            <section class="example">
                <h3>Adicionando um Amigo no Meio</h3>
                <p>
                    Quando você quer adicionar um novo amigo no meio da fila, você pede ao amigo que está no meio para segurar a mão do novo amigo, 
                    e o novo amigo segura a mão do próximo amigo. Agora, ele está no meio da fila!
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class ListaDuplamenteEncadeada {
                            private No primeiro;
                            private No ultimo;

                            public ListaDuplamenteEncadeada() {
                                primeiro = null;
                                ultimo = null;
                            }

                            public void AdicionarAmigoNoMeio(int valor, int posicao) {
                                No novoNo = new No(valor);
                                if (posicao == 0) {
                                    AdicionarAmigoAoInicio(valor);
                                } else {
                                    No atual = primeiro;
                                    for (int i = 0; i < posicao - 1 && atual != null; i++) {
                                        atual = atual.Proximo;
                                    }
                                    if (atual != null && atual.Proximo != null) {
                                        novoNo.Proximo = atual.Proximo;
                                        novoNo.Anterior = atual;
                                        atual.Proximo.Anterior = novoNo;
                                        atual.Proximo = novoNo;
                                    } else if (atual == ultimo) {
                                        AdicionarAmigoAoFinal(valor);
                                    } else {
                                        throw new ArgumentOutOfRangeException("Posição inválida!");
                                    }
                                }
                            }
                        }
                    </code>
                </pre>
            </section>
            <section class="example">
                <h3>Brincando com a Fila</h3>
                <p>
                    Se você quiser saber quem é o primeiro amigo na fila, você simplesmente pergunta ao amigo que está na frente. 
                    E se quiser saber quem vem depois, ou antes, é só perguntar a cada amigo quem eles estão segurando a mão.
                </p>
                <pre>
                    <code>
                        // Exemplo em C#
                        public class ListaDuplamenteEncadeada {
                            private No primeiro;
                            private No ultimo;

                            public No VerPrimeiroAmigo() {
                                return primeiro;
                            }

                            public No VerUltimoAmigo() {
                                return ultimo;
                            }

                            public No VerProximoAmigo(No atualAmigo) {
                                return atualAmigo?.Proximo;
                            }

                            public No VerAmigoAnterior(No atualAmigo) {
                                return atualAmigo?.Anterior;
                            }
                        }
                    </code>
                </pre>
            </section>
        </section>
    </section>

    </main>
    <script>
        let i = 0
        function switchCarrossel(){
            const alldivs = document.querySelectorAll(".carrossel div")
            const makers = document.querySelectorAll(".marker i")
            makers.forEach(i => {
                i.id = ""
            })
            alldivs.forEach(div => {  
                div.classList.value = ""
            })
            alldivs[i].classList.add('active')
            makers[i].id = 'active'
            if(i < 2){
                i++
            }else{
                i = 0
            }
        }
        function switchPages(url){
            window.location.href = url
        }
        function dropdown(){
            document.querySelector(".logged").classList.toggle("active")
            document.querySelector("#icon").classList.toggle("active")
        }
        setInterval(switchCarrossel,7000)
    </script>
    </body>
</html>