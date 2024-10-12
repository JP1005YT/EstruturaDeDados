<?php
    // error_reporting(E_ERROR | E_PARSE);
    include_once './../../backend/controllers/page_controller.php';
    include_once './../../backend/controllers/controller.php';
    session_start();

    $controlador = new Controller();

    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
        $code = $_POST['code'];
        $codeEmail = $_POST['codeEmail'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];
        $email = $_POST['userEmail'];

        if($code == $codeEmail){
            if($password == $confirmPassword){
                $controlador->redefinirSenha($password, $email);
                header('Location: ../../pages/Entrar/');
            }else{
                echo "<script>alert('As senhas não coincidem!');</script>";
            }
        }else{
            echo "<script>alert('Código de recuperação inválido!');</script>";
        }
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
            <h1>ESCREVER NOVA SENHA</h1>
            <form method="POST" action="">
                <input type="text" id="userEmail" name="userEmail" hidden value="<?php echo $_POST['email']?>">
                <input type="text" id="codeEmail" name="codeEmail" hidden value="<?php echo $_POST['codigo']?>">
                <label for="code">Codigo de Recuperação:</label>
                <input type="text" id="code" name="code" required>
                <label for="password">Nova Senha:</label>
                <input type="password" id="password" name="password" required>
                <label for="confirm-password">Confirmar Nova Senha:</label>
                <input type="password" id="confirm-password" name="confirm-password" required>
                <button type="submit" class="reset-password-btn">Confirmar Redefinição</button>
            </form>
        </div>
    </main>
    <?php PageController::Rodape(); ?>
</body>
</html>