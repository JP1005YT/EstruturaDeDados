<?php
    error_reporting(E_ERROR | E_PARSE);
    include_once './../../backend/classes/Usuario.php';
    include_once './../../backend/controllers/controller.php';
    include_once './../../backend/controllers/page_controller.php';
    session_start();

    spl_autoload_register(function ($class_name) {
        include './../../backend/classes/' . $class_name . '.php';
    });

    $controlador = new Controller();

    if($_SESSION['user']->getEmail() != 'admin'){
        header('Location: ./../../');
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title> DataStruct School | ADMIN </title>
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
            <h1>ADMIN</h1>
            <hr>
            <h2>Cadastro de items</h2>
            <form action="proc_registraritem.php" enctype="multipart/form-data" method="post">
                <input type="text" name="nome" placeholder="Nome do item">
                <select name="categoria">
                    <option value="cabelos">Cabelo</option>
                    <option value="calcas">Calça</option>
                    <option value="rostos">Rosto</option>
                    <option value="torsos">Torso</option>
                </select>
                <input type="text" name="valor" placeholder="Valor do item">
                <input type="file" name="imagem">
                <button type="submit">Adicionar</button>
            </form><br>
            <hr>
            <h2>Dar Item ao Usuario</h2>
            <form action="proc_daritem.php" method="post">
                <select name="user" id="user">
                    <?php
                        $usuarios = $controlador->UserPush();
                        while($row = $usuarios->fetch_assoc()){
                            echo '<option value="'.$row['idusuario'].'">'.$row['nickname_usuario'].'</option>';
                        }
                    ?>
                </select>
                <select name="item" id="item">
                    <?php
                        $items = $controlador->ItemPush();
                        while($row = $items->fetch_assoc()){
                            echo '<option value="'.$row['iditem'].'">'.$row['nome_item'].'</option>';
                        }
                    ?>
                </select>
                <button type="submit">Dar</button>
            </form><br>
        </div>
    </main>
</body>