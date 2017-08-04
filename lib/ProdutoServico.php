<?php
require_once 'conexao.php';

class ProdutoServicos extends DB{
  private $servico,$produto,$valor,$qtd;

  public function setServico($servico){
    $this->servico = $servico;
  }
  public function setproduto($produto){
    $this->produto = $produto;
  }
  public function setValor($valor){
    $this->valor = $valor;
  }
  public function setQtd($qtd){
    $this->qtd = $qtd;
  }

  public function adicionarProduto($p){
    $sql = "call adicionar_produto_servico($p->servico,$p->produto,$p->valor,$p->qtd)";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }

  public function removerProduto($p,$s){
    $sql = "delete from tb_produtos_servicos where prs_pro_id = $p and prs_ser_id = $s";
    $stm = DB::prepare($sql);
    return $stm->execute();
  }

  public function listarProdutosAdicionados($id){
    $sql = "select * from tb_produtos_servicos join tb_produtos on (pro_id = prs_pro_id) where prs_ser_id = $id;";
    $stm = DB::prepare($sql);
    $stm->execute();
    return $stm->fetchAll();
  }
}
?>
