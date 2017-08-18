<?php
require_once 'conexao.php';

class Carros extends DB{
  private $id, $descricao,$placa,$status,$cliente;

  public function setId($id){
    $this->id = $id;
  }
  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }
  public function setPlaca($placa){
    $this->placa = $placa;
  }
  public function setStatus($status){
    $this->status = $status;
  }
  public function setCliente($cliente){
    $this->cliente = $cliente;
  }

  public function inserirCarro($c){
    $sql = "insert into tb_carros(car_descricao,car_placa,car_status,car_cli_id) values ('$c->descricao','$c->placa',$c->status,$c->cliente)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }
  public function atualizarCarro($c){
    $sql = "update tb_carros set car_descricao = '$c->descricao',
                                 car_placa = '$c->placa',
                                 car_status = $c->status,
                                 car_cli_id = $c->cliente where car_id = $c->id";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }
}
 ?>
