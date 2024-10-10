<?php
    require_once __DIR__.'/../classes/Banco.php';
    require_once __DIR__.'/../classes/Usuario.php';
    define('BASE_URL', '/EstruturaDeDados');
    class Controller{

        public $banco;
        public function __construct(){
            $this->banco = new Banco();
        }

        public function UserLogin(){
            session_start();
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
            session_start();
            $username = $_POST['username'] ;
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = password_hash($_POST['senha'], PASSWORD_DEFAULT);
            if($this->banco->insertUsuario($username,$name,$email,$password)){
                header('Location: '. BASE_URL. '/pages/Entrar/');
            };
        }

        public function UserLogout(){
            session_start();
            session_destroy();
            header('Location: '. BASE_URL. '/index.php');
        }

        public function UserPush(){
            return $this->banco->getUsuarios();
        }

        public function UsuarioItemRegistrar(){
            $idusuario = $_POST['user'];
            $iditem = $_POST['item'];

            if($this->banco->insertUsuarioHasItem($idusuario,$iditem,0)){
                header('Location: '. BASE_URL. '/pages/Admin/');
            };
        }

        public function ItemRegister(){ 
            $nome = $_POST['nome'];
            $categoria = $_POST['categoria'];
            $valor = $_POST['valor'];
            $imagem = $_FILES['imagem'];

            $extensao = strtolower(substr($_FILES['imagem']['name'], -4));
            $novo_nome = md5(time()).$extensao;
            $diretorio = "./../../src/sprites/".$categoria."/";

            move_uploaded_file($_FILES['imagem']['tmp_name'], $diretorio.$novo_nome);

            if($this->banco->insertItem($novo_nome,$categoria,$valor,$nome)){
                header('Location: '. BASE_URL. '/pages/Admin/');
            };
        }
        public function ItemPush(){
            return $this->banco->getItems();
        }
        public function GetItemsOfUsuariosById($id){
            return $this->banco->getUsuarioHasItemById($id);
        }

        //funções para o quiz
        public function QuizPush(){
            return $this->banco->getQuizPerguntas();
        }

        public function QuizRespostaPush($id){
            return $this->banco->getQuizRespostaById($id);
        }

        public function ComprarItem($iditem,$iduser){
            $usuario = $this->banco->getUsuarioById($iduser);
            $item = $this->banco->getItemById($iditem);

            while($row = $usuario->fetch_assoc()){
                $coins = $row['coins_usuario'];
                while($row = $item->fetch_assoc()){
                    $valor = $row['valor_item'];
                    $newMoeda = $coins-$valor;
                    $this->banco->updateUsuarioCoins($iduser,$newMoeda);
                }
            }
            

            $this->banco->insertUsuarioHasItem($iduser,$iditem,0);
            return $newMoeda;
        }

        public function atualizarUsuario($id, $nickname, $nome, $email) {
            //a fazer
        }
    }