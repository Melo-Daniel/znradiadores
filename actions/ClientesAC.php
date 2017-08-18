<?php

require_once '../lib/Cliente.php';
require_once '../lib/Carro.php';

$op = $_POST['op'];

switch ($op) {
  case 1:
    $cli = new Clientes();

    $cli->setNome($_POST['nome']);
    $cli->setTelefone($_POST['telefone']);
    $cli->setStatus(1);

    if($cli->inserirCliente($cli)){

      $cliente = $cli->listarUltimoCliente();
      $car = new Carros();

      $car->setDescricao($_POST['descricao']);
      $car->setPlaca($_POST['placa']);
      $car->setStatus(1);
      $car->setCliente($cliente->cli_id);

      if($car->inserirCarro($car)){
        echo 'ok';
      }else{
        echo 'erro';
      }
    }else{
      echo 'erro';
    }

    break;

  default:
    # code...
    break;
}
 ?>
