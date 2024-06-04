<?php
    include_once '../db.php';
    include_once '../classes/Usuario.php';
    session_start();

    $email = htmlspecialchars($_POST['email']);
    $senha = $_POST['senha']; // Hash da senha para segurança


    $stmt = $conn->prepare("SELECT * FROM users WHERE email = (?)");

    $stmt->bind_param("s",$email);

    if($stmt->execute()) {
        $result = $stmt->get_result();
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                if(password_verify($senha,$row['password'])){
                    $newUser = new Usuario($row['username'],$row['name'],$row['cargo'],$row['email'],$row['password']);
                    $_SESSION['user'] = $newUser;
            
            
                    header('Location: ../../index.php');
                }else{
                    echo "error";
                }
            }
        } else {
            header('Location: ../../pages/Entrar/');
        }
    }

?>