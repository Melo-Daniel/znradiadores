<?php
require_once '../lib/ProdutoServico.php';
require_once '../lib/Produtos.php';
$op = $_POST['op'];

switch ($op) {
  case 1:
    $p = new Produtos();
    $produto = $p->listarProduto($_POST['produto']);
    $ps = new ProdutoServicos();

    $ps->setServico($_POST['servico']);
    $ps->setProduto($_POST['produto']);
    $ps->setValor($produto->pro_valor * $_POST['qtd']);
    $ps->setQtd($_POST['qtd']);
    if($ps->adicionarProduto($ps)){
      echo 'ok';
    }else{
      echo 'erro';
    }
    break;
    case 2:
      $ps = new ProdutoServicos();
      if($ps->removerProduto($_POST['produto'],$_POST['servico'])){
        echo 'ok';
      }else{
        echo 'erro';
      }
      break;
      case 3:
        $ps = new ProdutoServicos();
        foreach ($ps->listarProdutosAdicionados($_POST['servico']) as $key => $value) {
          $ps->removerProduto($value->prs_pro_id,$value->prs_ser_id);
        }
        if($ps->cancelarServico($_POST['servico'])){
          echo 'ok';
        }else{
          echo 'erro';
        }
        break;
  default:
    # code...
    break;
}
 ?>
