<?php
    error_reporting(E_ERROR | E_PARSE);
    include_once './../../backend/controllers/page_controller.php';
    include_once './../../backend/controllers/controller.php';
    session_start();

    $controlador = new Controller();

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $email = $_POST['email'];

        // Lógica para enviar o email de redefinição de senha
        $codigo = $controlador->enviarEmailRedefinicaoSenha($email);

        // Redirecionar para uma página de confirmação com POST
        echo "<form id='redirectForm' method='POST' action='./confirmarCodigo.php'>
                <input type='hidden' name='email' value='" . htmlspecialchars($email, ENT_QUOTES, 'UTF-8') . "'>
                <input type='hidden' name='codigo' value='" . htmlspecialchars($codigo, ENT_QUOTES, 'UTF-8') . "'>
              </form>
              <script type='text/javascript'>
                document.getElementById('redirectForm').submit();
              </script>";
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>DataStruct School | Redefinir Senha</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <link rel="shortcut icon" href="../../logo.png" />
</head>
<body>
    <?php PageController::Cabecalho(); ?>
    <main>
        <div class="card">
            <img src="./../../logo.png" width="35px" class="card-logo">
            <h1>Redefinir Senha</h1>
            <form method="POST" action="">
                <label for="email">Email da Conta:</label>
                <input type="email" id="email" name="email" required>
                
                <button type="submit" class="reset-password-btn">Enviar Link de Redefinição</button>
            </form>
        </div>
    </main>
    <?php PageController::Rodape(); ?>
</body>
</html>