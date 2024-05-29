<?php
    include_once '../db.php';
    include_once '../classes/Usuario.php';
    session_start();

    $email = htmlspecialchars($_POST['email']);
    $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT); // Hash da senha para segurança


    $stmt = $conn->prepare("SELECT * FROM users WHERE email = (?)");

    $stmt->bind_param("s",$email);

    if($stmt->execute()){
        
    }

?>