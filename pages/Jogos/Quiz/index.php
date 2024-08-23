<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Quiz | DataStruct School</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="main.css">
</head>
<body>
    <header class="mainHeader">
        <section class="logo">
            <img src="logo.png" height="70px">
            <h1>DataStruct School</h1>
        </section>
        <nav>
            <ul>
                <li><a href="./index.php">Página Principal</a></li>
                <li><a href="./pages/Temas/">Aulas</a></li>
                <li><a href="./quiz.php">Quiz</a></li>
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
                                    <li><a href="./pages/Perfil/index.php">Perfil</a></li>
                                    <li><a href="./backend/functions/sair.php">Sair</a></li>
                                </ul>
                            </div>
                        </section>';
                }else{
                    echo '<section>
                            <button class="cadastrar" onclick="switchPages(\'./pages/Cadastrar/\')">Cadastrar-se</button>
                            <button class="entrar" onclick="switchPages(\'./pages/Entrar/\')">Entrar</button>
                        </section>';
                }
            ?>
        </nav>
    </header>
    <main>
        <h2>Quiz</h2>
        <section class="quiz-container">
            <form id="quiz-form">
                <!-- Pergunta 1 -->
                <div class="question">
                    <p>Qual estrutura de dados é usada para implementar uma fila?</p>
                    <label><input type="radio" name="q2" value="Stack"> Stack </label><br>
                    <label><input type="radio" name="q2" value="Queue"> Queue </label><br>
                    <label><input type="radio" name="q2" value="List"> List </label><br>
                    <label><input type="radio" name="q2" value="Tree"> Tree </label>
                </div>
                
                <!-- Adicione mais perguntas conforme necessário -->
                
                <button type="submit">Enviar</button>
            </form>
        </section>
    </main>
    <footer>
        <!-- Conteúdo do rodapé -->
    </footer>
    <script>
        function switchPages(url){
            window.location.href = url
        }
        function dropdown(){
            document.querySelector(".logged").classList.toggle("active")
            document.querySelector("#icon").classList.toggle("active")
        }
    </script>
</body>
</html>