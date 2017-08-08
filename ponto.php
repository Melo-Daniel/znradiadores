<?php
require_once 'lib\Ponto.php';
require_once 'lib\Colaboradores.php';
$colaborador = $_GET['ids'];
$c = new Colaboradores();
$cl = $c->listarColaborador($colaborador);
if(isset($_POST['ponto'])){
  $p = new Pontos();
  if($p->autenticarPonto($colaborador,$_POST['senha']) > 0){
    if($p->baterPonto($colaborador)){
      header("Location:colaboradores.php");
    }else{
      echo "erro";
    }
  }else{
    echo "Usuario não encontrado!";
  }
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ZN Radiadores | Ponto</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h3 class="logo-name">ZN</h3>

            </div>
            <h3>Ponto online</h3>

            <form class="m-t" role="form" action="ponto.php?ids=<?php echo $colaborador?>" method="post">
                <div class="form-group">
                    <p class="form-control-static"><?php echo $cl->col_nome?></p>
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" name="senha" placeholder="Senha" required="">
                </div>
                <button type="submit" name="ponto" class="btn btn-primary block full-width m-b">Bater Ponto</button>
            </form>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
