<?php

class Usuario {
    private $idUser;
    private $nickUser;
    private $nameUser;
    private $emailUser;
    private $senhaUser;
    private $coins;
    private $adquiredItemsUser;
    private $equippedItemsUser;

    // Construtor
    public function __construct($idUser,$nickUser, $nameUser, $emailUser, $senhaUser ,$coins) {
        $this->nickUser = $nickUser;
        $this->emailUser = $emailUser;
        $this->nameUser = $nameUser;
        $this->coins = $coins;
        $this->idUser = $idUser;
        $this->senhaUser = password_hash($senhaUser, PASSWORD_DEFAULT); // Hash da senha
    }
    public function getCoins(){
        return $this->coins;
    }
    public function getIdUser(){
        return $this->idUser;
    }
    // Métodos Getters
    public function getUsername(){
        return $this->nickUser;
    }

    public function getName() {
        return $this->nameUser;
    }

    public function getEmail() {
        return $this->emailUser;
    }
    public function setCoins($coins){
        $this->coins = $coins;
    }

    // Método para verificar a senha
    public function verificarSenha($senha) {
        return password_verify($senha, $this->senhaUser);
    }
}

?>
