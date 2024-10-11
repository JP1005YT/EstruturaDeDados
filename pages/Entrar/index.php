<?php 
     include_once './../../backend/controllers/page_controller.php';
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
        <form action="./proc_entrar.php" method="POST">
            <h1>Entrar</h1>
            <input placeholder="Email" name="email">
            <input placeholder="Senha"  name="senha" type="password">
            <input type="submit" value="Entrar">
            <p>Não possui conta? <a onclick="switchPages('../Cadastrar/')"> Criar </a> </p>
            <a href="./../RedefinirSenha/redefinirSenha.php" class="forgot-password-link">Deseja Redefinir Sua Senha?</a>
        </form>
    </main>
    <script>
        function switchPages(url){
            window.location.href = url
        }
    </script>
</body>
</html>