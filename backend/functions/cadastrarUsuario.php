<?php
    include_once '../db.php';
    include_once '../classes/Usuario.php';
    session_start();


    $username = htmlspecialchars($_POST['username']);
    $name = htmlspecialchars($_POST['name']);
    $cargo = htmlspecialchars($_POST['cargo']);
    $email = htmlspecialchars($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha para segurança

    // Prepara a instrução SQL
    $stmt = $conn->prepare("INSERT INTO users (username, name, cargo, email, password) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $username, $name, $cargo, $email, $senha);

    // Executa a instrução SQL e verifica o resultado
    if ($stmt->execute()) {
        echo "Novo registro criado com sucesso";

        $newUser = new Usuario($_POST['username'],$_POST['name'],$_POST['cargo'],$_POST['email'],$_POST['senha']);
        $_SESSION['user'] = $newUser;


        header('Location: ../../index.php');
    } else {
        $_SESSION['err'] = $stmt->error;
        header('Location: ../../pages/Cadastrar/');
    }

    // Fecha a declaração e a conexão
    $stmt->close();
    $conn->close();

    

?>