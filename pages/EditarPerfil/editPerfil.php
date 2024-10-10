<?php
    include_once './../../backend/classes/Usuario.php';
    include_once './../../backend/controllers/page_controller.php';
    include_once './../../backend/controllers/controller.php';
    session_start();

    $controlador = new Controller();
    $usuario = $_SESSION['user'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nickname = $_POST['nickname'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];

        // Atualizar os dados do usuário no banco de dados
        $controlador->banco->updateUsuario($usuario->getIdUser(), $nickname, $usuario->getCoins(), $nome, $email, $usuario->getSenha());

        // Atualizar os dados na sessão
        $usuario->setNickname($nickname);
        $usuario->setName($nome);
        $usuario->setEmail($email);

        $_SESSION['user'] = $usuario;

        // Redirecionar de volta para a página de perfil
        header('Location: ./../Perfil/');
        exit();
    }
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> DataStruct School | Editar Perfil</title>
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
            <h1>Editar Perfil</h1>
            <form method="POST" action="">
                <label for="nickname">Nickname:</label>
                <input type="text" id="nickname" name="nickname" value="<?php echo $usuario->getUsername(); ?>" required>
                
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" value="<?php echo $usuario->getName(); ?>" required>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $usuario->getEmail(); ?>" required>
                
                <button type="submit" class="edit-profile-btn">Salvar Alterações</button>
            </form>
            <a href="./../RedefinirSenha/redefinirSenha.php" class="forgot-password-link">Deseja Redefinir Sua Senha?</a>
        </div>
    </main>
    <?php PageController::Rodape(); ?>
</body>
</html>