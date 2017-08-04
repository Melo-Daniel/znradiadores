<?php
require_once '..\lib\Servico.php';

$op = $_POST['op'];

switch ($op) {
  case 1:
    $s = new Servicos();

    $s->setCliente($_POST['cliente']);
    $s->setColaborador($_POST['mecanico']);

    if($s->iniciarServico($s)){
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
