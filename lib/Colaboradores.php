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

  public function inserirCliente($c){
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
}
 ?>
