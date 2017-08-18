<?php
require_once '../lib/Pagamento.php';

$op = $_POST['op'];

switch ($op) {
  case 1:
    $p = new Pagamentos();

    $p->setServico($_POST['servico']);
    $p->setFpg($_POST['pagamento']);
    $p->setValor($_POST['valor']);
    $garantia = $_POST['garantia'];
    if($p->finalizarPagamento($p,$garantia)){
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
