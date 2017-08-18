<?php
require_once '../lib/Servico.php';

header('Content-type:application/json');
$colaborador = $_GET['id'];
$servicos = new Servicos();

$ser = array();
foreach ($servicos->listarServicoColaborador($colaborador) as $key => $value) {
  $ser['Servicos'][] = $value;
}

echo json_encode($ser);
?>
