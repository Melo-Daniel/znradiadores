<?php
require_once 'conexao.php';

class Pontos extends DB{
  private $id,$horario,$colaborador;

  public function setId($id){
    $this->id = $id;
  }
  public function setHorario($horario){
    $this->horario = $horario;
  }
  public function setColaborador($colaborador){
    $this->colaborador = $colaborador;
  }

  public function baterPonto($colaborador){
    $sql = "insert into tb_pontos (pon_hotatio,pon_col_id) values (now(),$colaborador);";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }
  public function listarPonto($colaborador){
    $sql = "select * from tb_colaboradores where pon_col_id = $colaborador";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }

  public function autenticarPonto($id,$senha){
    $sql = "select col_id from tb_colaboradores where col_id = $id and col_senha = '$senha'";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->rowCount();
  }
}
?>
