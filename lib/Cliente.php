<?php
require_once 'conexao.php';

class Clientes extends DB{
  private $id, $nome,$telefone,$status;

  public function setId($id){
    $this->id = $id;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }
  public function setStatus($status){
    $this->status = $status;
  }

  public function inserirCliente($c){
    $sql = "insert into tb_clientes(cli_nome,cli_telefone,cli_status) values ('$c->nome','$c->telefone',$c->status)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }
  public function atualizarCliente($c){
    $sql = "update tb_clientes set cli_nome = '$c->nome',cli_telefone = '$c->telefone',cli_status = $c->status where cli_id = $c->id";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }

  public function listarClientes(){
    $sql = "select * from tb_clientes join tb_carros on(cli_id = car_cli_id) where cli_status = 1";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
  public function listarClienteSV(){
    $sql = "select cli_nome as name, cli_id from tb_clientes where cli_status = 1";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }

  public function listarUltimoCliente(){
    $sql = "select cli_id from tb_clientes order by cli_id desc limit 1";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }

  public function clientesJSON(){
    $ser = array();
    foreach (self::listarClienteSV() as $key => $value) {
      $ser[] = $value;
    }

    return json_encode($ser);
  }

}

?>
