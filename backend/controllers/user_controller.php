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
<?php
session_start();
session_destroy();

header('location: ../../index.php')
?>
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