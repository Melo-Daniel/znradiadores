<?php
require_once '..\lib\Servico.php';

$op = $_POST['op'];

switch ($op) {
  case 1:
    $s = new Servicos();

    $s->setCliente($_POST['cliente']);
    $s->setColaborador($_POST['mecanico']);
    $status = $_POST['status'];
    if($s->iniciarServico($s,$status)){
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
