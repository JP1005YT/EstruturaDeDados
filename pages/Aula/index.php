<?php
$json = json_decode(file_get_contents('../../backend/temas/'.$_GET['class']),true);
spl_autoload_register(function ($class_name) {
    include '../../backend/classes/' . $class_name . '.php';
});
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title> DataStruct School | <?php $json['nome']?></title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
        <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        <link rel="shortcut icon" href="./../../logo.png" />
    </head>
    <body>
        <header class="mainHeader">
            <section class="logo">
                <img src="../../logo.png" height="70px">
                <h1>DataStruct School</h1>
            </section>
            <nav>
                <ul>
                    <li>
                        <a href="../../index.php">Página Principal</a>
                    </li>
                    <li>
                        <a href="../../pages/Temas/">Temas</a>
                    </li>
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
                                            <a href="../../backend/functions/sair.php">Sair</a>
                                        </li>
                                    </ul>
                                </div>
                            </section>';
                    }else{
                        echo '<section>
                                <button class="cadastrar" onclick="switchPages('."'../../pages/Cadastrar/'".')">Cadastrar-se</button>
                                <button class="entrar" onclick="switchPages('."'../../pages/Entrar/'".')">Entrar</button>
                            </section>';
                    }
                ?>
            </nav>
        </header>
        <main>
            <section class="card">
                <?php
                    echo $json['content'];
                ?>
            </section>
        </main>
        <script>
            function switchPages(url){
                window.location.href = url
            }
            document.title = `DataStruct | <?php echo $json['nome']?>`
            function dropdown(){
            document.querySelector(".logged").classList.toggle("active")
            document.querySelector("#icon").classList.toggle("active")
            }
        </script>
    </body>
</html>