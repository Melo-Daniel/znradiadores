<?php
require_once '../lib/Produto.php';

header('Content-type:application/json');

$servicos = new Produtos();

$ser = array();
foreach ($servicos->listarProdutos() as $key => $value) {
  $ser['Produtos'][] = $value;
}

echo json_encode($ser);
?>