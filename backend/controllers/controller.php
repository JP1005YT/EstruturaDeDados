<?php
    require_once __DIR__.'/../classes/Banco.php';
    require_once __DIR__.'/../classes/Usuario.php';
    define('BASE_URL', '/EstruturaDeDados');
    session_start();

    class Controller{

        public $banco;
        public function __construct(){
            $this->banco = new Banco();
        }

        public function UserLogin(){
            $email = htmlspecialchars($_POST['email']);
            $senha = $_POST['senha'];

            $user = $this->banco->getUsuarioByEmail($email);

            $passwordHash = $user['senha_usuario'];

            $entry = password_verify($senha,$passwordHash);

            if($entry){
                $novoUsuario = new Usuario($user['idusuario'],$user['nickname_usuario'],$user['nome_usuario'],$user['email_usuario'],$user['senha_usuario'],$user['coins_usuario']);
                $_SESSION['user'] = $novoUsuario;
                header('Location: '. BASE_URL. '/index.php');
            }else{
                header('Location: '. BASE_URL. '/pages/Entrar/');
            }
            // Hash da senha para segurança
            // $stmt = $this->banco->getUsuarioByEmail( $email );
        
            // $result = $stmt->get_result();
            // if($result->num_rows > 0) {
            //     while($row = $result->fetch_assoc()) {
            //         if(password_verify($senha,$row['password'])){
            //             $newUser = new Usuario($row['username'],$row['name'],$row['cargo'],$row['email'],$row['password']);
            //             $_SESSION['user'] = $newUser;
                
                
            //             header('Location: ../../index.php');
            //         }else{
            //             echo "error";
            //         }
            //     }
            // } else {
            //     header('Location: ../../pages/Entrar/');
            // }
        }

        public function UserRegister(){
            $username = $_POST['username'] ;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            if($this->banco->insertUsuario($username,$name,$email,$password)){
                $_SESSION['user'] = new Usuario($username,$name,$email,$password);

                header('Location: '. BASE_URL. '/index.php');
            };
        }

        public function UserLogout(){
            session_destroy();
            header('Location: '. BASE_URL. '/index.php');
        }
    }