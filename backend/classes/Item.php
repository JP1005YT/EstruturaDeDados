<?php
class Item{
    public $idItem;
    public $nameItem;
    public $imgItem;
    public $catItem;
    public $valItem;

    public function __construct($idItem, $nameItem, $imgItem, $catItem, $valItem){
        $this->idItem = $idItem;
        $this->nameItem = $nameItem;
        $this->imgItem = $imgItem;
        $this->catItem = $catItem;
        $this->valItem = $valItem;
    }

    public function getIdItem(){
        return $this->idItem;
    }

    public function getNameItem(){
        return $this->nameItem;
    }

    public function getImgItem(){
        return $this->imgItem;
    }

    public function getCatItem(){
        return $this->catItem;
    }

    public function getValItem(){
        return $this->valItem;
    }
}
?>