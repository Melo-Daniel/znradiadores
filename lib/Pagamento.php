<?php
require_once 'conexao.php';

class Pagamentos extends DB{
  private $id,$data,$status,$servico,$fpg,$valor;

  public function setId($id){
    $this->id = $id;
  }
  public function setData($data){
    $this->data = $data;
  }
  public function setStatus($status){
    $this->status = $status;
  }
  public function setServico($servico){
    $this->servico = $servico;
  }
  public function setFpg($fpg){
    $this->fpg = $fpg;
  }
  public function setValor($valor){
    $this->valor = $valor;
  }

  public function finalizarPagamento($p,$garantia){
    $sql = "call finalizar_pagamento($p->servico,$p->fpg,$p->valor,$garantia)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }
}
?>
