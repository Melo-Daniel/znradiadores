<?php
require_once '../lib/Cliente.php';

$cliente = new Clientes();

$ser = array();
foreach ($cliente->listarClienteSV() as $key => $value) {
  $ser[] = $value;
}

echo json_encode($ser);
?>
