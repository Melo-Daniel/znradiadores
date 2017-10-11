<?php
require_once '../lib/ProdutoServico.php';
require_once '../lib/Produtos.php';
require_once '../lib/Servico.php';
$op = $_GET['op'];

switch ($op) {
  case 1:
    $p = new Produtos();
    $produto = $p->listarProduto($_GET['produto']);
    $ps = new ProdutoServicos();

    $ps->setServico($_GET['servico']);
    $ps->setProduto($_GET['produto']);
    $ps->setValor($produto->pro_valor * $_GET['qtd']);
    $ps->setQtd($_GET['qtd']);
    if($ps->adicionarProduto($ps)){
      echo 'ok';
    }else{
      echo 'erro';
    }
    break;
    case 2:
      $ps = new ProdutoServicos();
      if($ps->removerProduto($_GET['produto'],$_GET['servico'])){
        echo 'ok';
      }else{
        echo 'erro';
      }
      break;
      case 3:
        $ps = new ProdutoServicos();
        foreach ($ps->listarProdutosAdicionados($_GET['servico']) as $key => $value) {
          $ps->removerProduto($value->prs_pro_id,$value->prs_ser_id);
        }
        if($ps->cancelarServico($_GET['servico'])){
          echo 'ok';
        }else{
          echo 'erro';
        }
        break;
        case 4:
            $mdo = $_GET['mdo'];
            $valor = $_GET['valor'];
            $s = new Servicos();
            if($s->atualizarMdoValor($mdo,$valor,$_GET['ids'])){
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
