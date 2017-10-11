<?php
require_once '../lib/Cliente.php';
require_once '../lib/Carro.php';
require_once '../lib/Servico.php';

  if($_GET['mecanico'] == 0){
    echo "<script type='text/javascript'>alert('Mecanico invalido!')</script>";
  }else{
    $cli = new Clientes();

    $cli->setNome($_GET['nome']);
    $cli->setTelefone($_GET['telefone']);
    $cli->setStatus(1);

    if($cli->inserirCliente($cli)){

      $cliente = $cli->listarUltimoCliente();
      $cr = new Carros();

      $descricao = $_GET['descricao'];
      $placa = $_GET['placa'];

      if($descricao == ""){
        $descricao  = "SEM CARRO";
      }

      if($placa == ""){
        $placa = "SEM PLACA";
      }

      $cr->setDescricao($descricao);
      $cr->setPlaca($placa);
      $cr->setStatus(1);
      $cr->setCliente($cliente->cli_id);

      if($cr->inserirCarro($cr)){
        $ser = new Servicos();

        $ser->setCliente($cliente->cli_id);
        $ser->setColaborador($_GET['mecanico']);
        $sts = 2;
        if($_GET['mecanico'] == 12){
          $sts = 1;
        }
        if($ser->iniciarServico($ser,$sts)){
          header('Location:servico.php');
        }
      }else{
        echo 'erro';
      }
    }else{
      echo 'erro';
    }
  }
 ?>
