<?php
require_once 'conexao.php';

class Produtos extends DB{
  private $id,$nome,$codigo,$valor,$qtd,$aplicacao,$img,$status;

  public function setId($id){
    $this->id = $id;
  }
  public function setNome($nome){
    $this->nome = $nome;
  }
  public function setCodigo($codigo){
    $this->codigo = $codigo;
  }
  public function setValor($valor){
    $this->valor = $valor;
  }
  public function setQtd($qtd){
    $this->qtd = $qtd;
  }
  public function setAplicacao($aplicacao){
    $this->aplicacao = $aplicacao;
  }
  public function setImg($img){
    $this->img = $img;
  }
  public function setStatus($status){
    $this->status = $status;
  }

  public function inserirProduto($p){
      $sql = "INSERT INTO tb_produtos (pro_nome,pro_codigo,pro_valor,pro_qtd,pro_aplicacao,pro_img,pro_status)
              values ('$p->nome','$p->codigo',$p->valor,$p->qtd,'$p->aplicacao','$p->img',$p->status)";
      $stm = DB::prepare($sql);
      return $stm->execute();
  }

  public function listarProdutos(){
    $sql = "select * from tb_produtos where pro_status = 1";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
  public function listarProduto($id){
    $sql = "select * from tb_produtos where pro_id = $id";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetch();
  }
  public function deletarProduto($id){
      $sql = "update tb_produtos set pro_status = 5 where pro_id = $id";
      $stm = DB::prepare($sql);
      return $stm->execute();
  }
}
 ?>
