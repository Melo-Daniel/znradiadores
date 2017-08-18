<?php
require_once 'lib/Colaboradores.php';
session_start();
if(isset($_POST['login'])){
$c = new Colaboradores();
if($c->login($_POST['nome'],$_POST['senha']) > 0)
  header("Location:principal.php");
  $_SESSION['usuario'] = 6;
}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ZN Radiadores</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>


<body class="gray-bg" style="background: #4d4d4d" >

    <div class="loginColumns animated fadeInDown">
        <div class="row">

            <div class="col-md-3">

            </div>
            <div class="col-md-6">

                <h2 class="font-bold" style="text-align: center; color:#ffcc00"> LOGOTIPO BEM AQ </h2>
                <br>

                <div class="ibox-content" style="background: #e6ac00; border-radius: 5px;">

                    <form class="m-t" role="form" action="index.php" method="post">
                        <div class="form-group" >


                        <input type="text" class="form-control" placeholder="Usuário" name="nome" required="" style="border-radius: 5px; background: #e0e0eb; ">
                        </div>
                        <div class="form-group">

                            <input type="password" class="form-control" placeholder="Senha" name="senha" required="" style="border-radius: 5px; background: #e0e0eb">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary block full-width m-b" style="background: #004d99; border:none;border-radius: 5px" > Login </button>

                        <a href="#">

                            <small>Esqueceu sua senha?</small>

                        </a>

                        <a class="btn btn-sm btn-white btn-block" href="register.html" style="background:#e0e0eb ">Crie uma conta</a>
                    </form>
                    <p class="m-t">
                        <small>ZN Radiadores &copy; 2017</small>
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
