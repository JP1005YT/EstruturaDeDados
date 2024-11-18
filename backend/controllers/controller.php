<?php
    require_once __DIR__.'/../classes/Banco.php';
    require_once __DIR__.'/../classes/Usuario.php';

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
    
    require_once __DIR__. '/../packages/PHPMailer/src/Exception.php';
    require_once __DIR__. '/../packages/PHPMailer/src/PHPMailer.php';
    require_once __DIR__. '/../packages/PHPMailer/src/SMTP.php';
    
    if (!defined('BASE_URL')) {
        define('BASE_URL', '/EstruturaDeDados');
    }
    class Controller{

        public $banco;
        public function __construct(){
            $this->banco = new Banco();
        }

        public function QuizPush($nivel){
            return $this->banco->getQuizPerguntasByNivel($nivel);
        }

        public function QuizRespostaPush($id){
            return $this->banco->getQuizRespostaById($id);
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

        public function UserEdit($nickname, $nome, $email){
            session_start();
            $usuario = $_SESSION['user'];
            $id = $usuario->getIdUser();
            $coins = $usuario->getCoins();
            $senha = $usuario->getSenha();

            $this->banco->updateUsuario($id,$nickname,$coins,$nome,$email,$senha);

            $usuario->setNickname($nickname);
            $usuario->setName($nome);
            $usuario->setEmail($email);

            $_SESSION['user'] = $usuario;

            header('Location: '. BASE_URL. '/pages/Perfil/');

        }

        public function enviarEmailRedefinicaoSenha($email){

            $mail = new PHPMailer(true);
            $codigo = rand(10000,99999);
            try {
                // Configurações do servidor
                $mail->isSMTP();                                            // Define o uso do SMTP
                $mail->Host       = 'smtp.gmail.com';                   // Endereço do servidor SMTP
                $mail->SMTPAuth   = true;                                 // Habilita a autenticação SMTP
                $mail->Username   = 'godlolpro32@gmail.com';             // Usuário do SMTP
                $mail->Password   = 'wwdp tcgf wnsp xvqh';                      // Senha do SMTP
                $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;      // Habilita a criptografia TLS
                $mail->Port       = 587;                                  // Porta TCP para se conectar
                
                // outro dyahwivchyydewvm
                // HM9UT-N2MWQ-3BV7M-CCPXF-XLRXB
                
                // Remetente e destinatário
                $mail->setFrom('no-reply@gmail.com', 'DataStructSchool');
                $mail->addAddress($email, 'Usuario'); // Adiciona um destinatário
            
                // Conteúdo do email
                $mail->isHTML(true);                                      // Define o formato do email como HTML
                $mail->Subject = 'Recuperar Conta'; // Assunto do email
                $mail->Body    = 'Seu codigo de Recuperação é '. $codigo;
            
                // Envia o email
                $mail->send();
                echo 'Email enviado com sucesso!';
            } catch (Exception $e) {
                echo "Falha ao enviar email. Erro: {$mail->ErrorInfo}";
            }finally{
                return $codigo;
            }
        }

        public function redefinirSenha($senha, $email){
            $password = password_hash($senha, PASSWORD_DEFAULT);
            $this->banco->updateSenhabyEmail($password, $email);
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
        public function UsuarioAdicionarDinheiro($dinheiro){
            $usuario = $_SESSION['user'];
            $id = $usuario->getIdUser();
            $coins = $usuario->getCoins();
            $newMoeda = $coins+$dinheiro;

            $this->banco->updateUsuarioCoins($id,$newMoeda);

            $usuario->setCoins($newMoeda);

            $_SESSION['user'] = $usuario;
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

        public function updateMinhasRoupas($userId, $itemAtivo, $itemDesativado){
            $this->banco->updateUsuarioHasItem($userId,$itemAtivo,1);
            $this->banco->updateUsuarioHasItem($userId,$itemDesativado,0);
        }
    }