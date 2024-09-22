<?php 
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
    <title> DataStruct School | Entrar</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="../../logo.png" />
</head>
<body id="body">
        <?php
            PageController::Cabecalho();
        ?>
    <main>
        <form action="proc_cadastro.php" method="POST">
            <h1>Cadastrar-se</h1>
            <input placeholder="Apelido" name="username">
            <input placeholder="Nome Completo" name="name">
            <input placeholder="Email" name="email">
            <input placeholder="Senha" name="senha" type="password">
            <input type="submit" value="Cadastrar">
            <p>Já possuí conta? <a onclick="switchPages('../Entrar')">Entrar</a></p>
        </form>
    </main>
    <script>
        function switchPages(url){
            window.location.href = url
        }
    </script>
</body>
</html>