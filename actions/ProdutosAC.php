<?php
require_once '../lib/Produtos.php';

$op = $_POST['op'];

switch ($op) {
  case 1:
    $p = new Produtos();

    $nome = $_POST['nome'];
    $codigo = $_POST['codigo'];
    $valor = $_POST['valor'];
    $qtd = $_POST['qtd'];
    $aplicacao = $_POST['aplicacao'];
    $img = 'default.jpg';
    $status = 1;

    $p->setNome($nome);
    $p->setCodigo($codigo);
    $p->setValor($valor);
    $p->setQtd($qtd);
    $p->setAplicacao($aplicacao);
    $p->setImg($img);
    $p->setStatus($status);

    if($p->inserirProduto($p)){
      echo "ok";
    }else{
      echo "erro";
    }
    break;

  default:

    break;
}
?>
