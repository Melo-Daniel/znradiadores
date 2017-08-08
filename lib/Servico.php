<?php
require_once 'conexao.php';

class Servicos extends DB{
  private $id,$valor,$data,$mdo,$status,$fpg,$colaborador,$cliente,$garantia;

  public function setId($id){
    $this->id = $id;
  }
  public function setValor($valor){
    $this->valor = $valor;
  }
  public function setData($data){
    $this->data = $data;
  }
  public function setMdo($mdo){
    $this->mdo = $mdo;
  }
  public function setStatus($status){
    $this->status = $status;
  }
  public function setFpg($fpg){
    $this->fpg = $fpg;
  }
  public function setColaborador($colaborador){
    $this->colaborador = $colaborador;
  }
  public function setCliente($cliente){
    $this->cliente = $cliente;
  }
  public function setGarantia($garantia){
    $this->garantia = $garantia;
  }

  public function iniciarServico($s,$status){
    $sql = "INSERT INTO  tb_servicos(ser_data,ser_valor,ser_mao_de_obra,ser_sts_id,ser_fpg_id,ser_col_id,ser_cli_id,ser_gar_id) values
            (current_date(),0,0,$status,1,$s->colaborador,$s->cliente,1)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }

  public function listarServicos(){
    $sql = "select * from tb_servicos
	         join tb_clientes on(cli_id = ser_cli_id)
           join tb_carros on (cli_id = car_cli_id)
           join tb_status_servicos on(sts_id = ser_sts_id)
           join tb_colaboradores on(col_id = ser_col_id) where ser_data = current_date()";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
  public function listarServico($id){
    $sql = "select * from tb_servicos
	         join tb_clientes on(cli_id = ser_cli_id)
           join tb_carros on (cli_id = car_cli_id)
           join tb_status_servicos on(sts_id = ser_sts_id)
           join tb_pagamentos on(pag_id = pag_ser_id)
           join tb_formas_pagamentos on(fpg_id = pag_fpg_id)
           join tb_garantias on(gar_id = ser_gar_id)
           join tb_colaboradores on(col_id = ser_col_id) where ser_id = $id";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }

  public function listarFaturamentoDiarioSemana(){
    $sql = "select sum(ser_valor) from tb_servicos where ser_sts_id = 3 group by ser_data limit 7;";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
  public function listarFaturamentoDoDia(){
    $sql = "select sum(ser_valor) as valor from tb_servicos where ser_sts_id = 3 and ser_data = current_date();";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }
  public function listarFaturamentoDoDiaDinheiro(){
    $sql = "select sum(ser_valor) as valor from tb_servicos
              join tb_pagamentos on (ser_id = pag_ser_id)
              where ser_sts_id = 3 and
              ser_data = current_date() and
              pag_fpg_id = 2;";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }
  public function listarFaturamentoDoDiaCartao(){
    $sql = "select sum(ser_valor) as valor from tb_servicos
              join tb_pagamentos on (ser_id = pag_ser_id)
              where ser_sts_id = 3 and
              ser_data = current_date() and
              pag_fpg_id = 4;";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }
}
 ?>
