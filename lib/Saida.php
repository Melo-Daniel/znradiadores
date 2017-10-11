<?php
require_once 'conexao.php';


class Saida extends DB{
  private $id,$data,$valor,$descricao,$tipo;

  public function setId($id){
    $this->id = $id;
  }
  public function setData($data){
    $this->data = $data;
  }
  public function setValor($valor){
    $this->valor = $valor;
  }
  public function setDescricao($descricao){
    $this->descricao = $descricao;
  }
  public function setTipo($tipo){
    $this->tipo = $tipo;
  }

  public function registrarSaida($s){
    $sql = "insert into tb_saidas(sai_data,sai_valor,sai_descricao,sai_tic_id) values (current_date(),$s->valor,'$s->descricao',$s->tipo)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }

  public function listarSaidas(){
    $sql = "select * from tb_saidas join tb_tipo_contas on (sai_tic_id = tic_id) where
    month(sai_data) = month(current_date()) and
    year(sai_data) = year(current_date())";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }

  public function listarSaidasTipo($t){
    $sql = "select * from tb_saidas join tb_tipo_contas on (sai_tic_id = tic_id) where
    month(sai_data) = month(current_date()) and
    year(sai_data) = year(current_date()) and
    sai_tic_id = $t";

    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }

  public function valorSaidasTipo(){
    $sql = "select tic_tipo,sum(sai_valor) as valor from tb_saidas
	           join tb_tipo_contas on (sai_tic_id = tic_id)
	           where month(sai_data) = month(current_date()) and
             year(sai_data) = year(current_date())
             group by sai_tic_id;";

    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }

  public function valorTotalMes(){
    $sql = "select sum(sai_valor) as valor from tb_saidas
             where month(sai_data) = month(current_date()) and
             year(sai_data) = year(current_date());";

    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }
}
?>
