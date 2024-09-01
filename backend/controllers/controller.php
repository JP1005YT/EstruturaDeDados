<?php
    include __DIR__.'./../classes/Banco.php';
    include __DIR__.'./../classes/Usuario.php';
    define('BASE_URL', '/EstruturaDeDados');
    session_start();

    class Controller{

        public $banco;
        public function __construct(){
            $this->banco = new Banco();
        }

        public function UserLogin(){
            $email = htmlspecialchars($_POST['email']);
            $senha = $_POST['senha']; // Hash da senha para segurança
        
            // $stmt = $this->banco->getUsuarioByEmail( $email );
        
            // var_dump( $stmt );

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
        static function Teste(){
            echo 'okay';
        }
    }