<?php
require_once '../lib/Servico.php';

header('Content-type:application/json');

$servicos = new Servicos();

$ser = array();
foreach ($servicos->servicosIniciadosRetifica() as $key => $value) {
  $ser['Servicos'][] = $value;
}



echo json_encode($ser);
?>
