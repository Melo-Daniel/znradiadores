<?php
require_once 'conexao.php';

class Produtos extends DB{
  private $id,$nome,$valor,$qtd,$aplicacao,$img,$status;

  public setId($id){
    $this->id = $id;
  }
  public setNome($nome){
    $this->nome = $nome;
  }
  public setValor($valor){
    $this->valor = $valor;
  }
  public setQtd($qtd){
    $this->qtd = $qtd;
  }
  public setAplicacao($aplicacao){
    $this->aplicacao = $aplicacao;
  }
  public setImg($img){
    $this->img = $img;
  }
  public setStatus($status){
    $this->status = $status;
  }

  public function inserirProduto($p){
      $sql = "insert into tb_produtos (pro_id,pro_nome,pro_valor,pro_qtd,pro_aplicacao,pro_img,pro_status)
              values ($p->id,'$p->nome',$p->valor,$p->qtd,'$p->aplicacao','$p->img',$p->status)";
      $stm = DB::prepare($sql);
      return $stm->execute();
  }

  public function listarProdutos(){
    $sql = "select * from tb_produtos where pro_status = 1";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
  public function deletarProduto($id){
      $sql = "update tb_produtos set pro_status = 5 where pro_id = $id";
      $stm = DB::prepare($sql);
      return $stm->execute();
  }
}
 ?>
