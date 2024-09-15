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
    <link rel="shortcut icon" href="../../logo.png" />
</head>
    <body>
        <?php
            PageController::Cabecalho();
        ?>
            <main>
                <div class="card">
                    <img src="./../../logo.png" width="35px" class="card-logo">
                    <h1><?php echo $_SESSION['user']->getUsername(); ?></h1>
                    <h2><?php echo $_SESSION['user']->getName(); ?></h2>
                    <span class="card-id"><?php

                    $val = str_pad($_SESSION['user']->getIdUser(), 9, '0', STR_PAD_LEFT);
                     
                    echo $val
                     ?></span>
                </div>
                <div class="character">

                </div>
            </main>
            <script>
                function dropdown(){
                    document.querySelector(".logged").classList.toggle("active")
                    document.querySelector("#icon").classList.toggle("active")
                }
                function switchPages(url){
                    window.location.href = url
                }
            </script>
            <?php
                PageController::Rodape();
            ?>
</body>
</html>