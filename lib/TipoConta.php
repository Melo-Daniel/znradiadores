<?php
require_once 'conexao.php';

class TipoConta extends DB{
  private $id,$tipo;

  public function setId($id){
    $this->id = $id;
  }
  public function setTipo($tipo){
    $this->tipo = $tipo;
  }

  public function listarTipos(){
    $sql = "select * from tb_tipo_contas";

    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();

  }
}

 ?>
