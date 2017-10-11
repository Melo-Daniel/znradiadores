<?php
require_once 'conexao.php';

class Colaboradores extends DB{
  private $id, $nome, $telefone, $funcao, $status, $img;

  public function setId($id){
    $this->id = $id;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function setTelefone($telefone){
    $this->telefone = $telefone;
  }
  public function setFuncao($funcao){
    $this->funcao = $funcao;
  }
  public function setStatus($status){
    $this->status = $status;
  }
  public function setImg($img){
    $this->img = $img;
  }

  public function inserirColaborador($c){
    $sql = "insert into tb_colaboradores(col_nome,col_telefone,col_fun_id,col_status,col_img) values
            ('$c->nome','$c->telefone',$c->funcao,$c->status,'$c->img')";
    $stm = DB::prepare($sql);
    return $stm->execute($sql);
  }

  public function listarColaboradores(){
    $sql = "select * from tb_colaboradores join tb_funcoes on(col_fun_id = fun_id) where col_status = 1";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
  public function listarColaboradoresM(){
    $sql = "select * from tb_colaboradores join tb_funcoes on(col_fun_id = fun_id) where col_status = 1 and (col_fun_id = 1 or col_fun_id = 2 or col_fun_id = 3)";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
  public function listarColaborador($id){
    $sql = "select * from tb_colaboradores join tb_funcoes on(col_fun_id = fun_id) where col_id = $id";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }

  public function login($nome,$senha){
    $sql = "select col_id from tb_colaboradores where col_nome = '$nome' and col_senha = '$senha'";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->rowCount();
  }

  public function ultimoPonto($id){
    $sql = "select * from tb_pontos where pon_col_id = $id order by pon_id desc limit 1";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }
}
 ?>
