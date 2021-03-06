<!DOCTYPE html>
<?php
require_once 'lib/Cliente.php';
require_once 'lib/Carro.php';
require_once 'lib/Servico.php';
require_once 'lib/Colaboradores.php';

$cl = new Clientes();
$car = new Carros();

if(isset($_POST['salvar'])){

  $cli = new Clientes();

  $cli->setNome($_POST['nome']);
  $telefone = $_POST['telefone'];
  if($telefone == ""){
    $telefone = "999999999";
  }
  $cli->setTelefone($telefone);
  $cli->setStatus(1);

  if($cli->inserirCliente($cli)){

    $cliente = $cli->listarUltimoCliente();
    $cr = new Carros();

    $descricao = $_POST['descricao'];
    $placa = $_POST['placa'];

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

    $cr->inserirCarro($cr);
  }
}
if(isset($_POST['salvainit'])){
  if($_POST['mecanico'] == 0){
    echo "<script type='text/javascript'>alert('Mecanico invalido!')</script>";
  }else{
    $cli = new Clientes();

    $cli->setNome($_POST['nome']);
    $cli->setTelefone($_POST['telefone']);
    $cli->setStatus(1);

    if($cli->inserirCliente($cli)){

      $cliente = $cli->listarUltimoCliente();
      $cr = new Carros();

      $descricao = $_POST['descricao'];
      $placa = $_POST['placa'];

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
        $ser->setColaborador($_POST['mecanico']);
        $sts = 2;
        if($_POST['mecanico'] == 12){
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
}
if (isset($_POST['atualizar'])) {

  $cl->setId($_POST['idcliente']);
  $cl->setNome($_POST['nome']);
  $cl->setTelefone($_POST['telefone']);
  $cl->setStatus(1);

  $car->setId($_POST['idcarro']);
  $car->setDescricao($_POST['descricao']);
  $car->setPlaca($_POST['placa']);
  $car->setStatus(1);
  $car->setCliente($_POST['idcliente']);

  if($cl->atualizarCliente($cl) && $car->atualizarCarro($car)){
    header("Location:cliente.php");
  }
}
 ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ZN Radiadores | Clientes</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<script type="text/javascript">
function inserirCliente(){
  var nome = document.getElementById('nome').value;
  var telefone = document.getElementById('telefone').value;
  var descricao = document.getElementById('descricao').value;
  var placa = document.getElementById('placa').value;

  if (nome == "" || telefone == "" || descricao== "" || placa == "") {
    alert("Todos os campos precisam ser preenchidos!");
  }else {
    $.post("actions/ClientesAC.php",
    {
        op:1,
        nome:nome,
        telefone:telefone,
        descricao:descricao,
        placa:placa
    },
    function(data,status){
      if(data == 'ok'){
        location.reload();
      }
    });
  }
}

</script>
</head>

<body class="mini-navbar">

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold">Daniel Melo</strong>
                            </span> <span class="text-muted text-xs block">Desenvolvedor <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        ZN
                    </div>
                </li>
                <!-- Inicio menu lateral -->
                <li>
                    <a href="principal.php"><i class="fa fa-line-chart"></i> <span class="nav-label">Geral</span></a>
                </li>

                <li>
                    <a href="novapeca.php"><i class="fa fa-th-large"></i> <span class="nav-label">Estoque</span></a>
                </li>

                <li>
                    <a href="servico.php"><i class="fa fa-wrench"></i> <span class="nav-label">ServiÃ§os</span></a>
                </li>
                <li>
                    <a href="cliente.php"><i class="fa fa-user"></i> <span class="nav-label">Clientes</span></a>
                </li>
                <li>
                    <a href="colaboradores.php"><i class="fa fa-user-o"></i> <span class="nav-label">Colaboradores</span></a>
                </li>
                <!-- Fim menu lateral -->
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
        </div>
            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <span class="m-r-sm text-muted welcome-message"></span>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-envelope"></i>  <span class="label label-warning">16</span>
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a7.jpg">
                                </a>
                                <div class="media-body">
                                    <small class="pull-right">46h ago</small>
                                    <strong>Mike Loreipsum</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">3 days ago at 7:58 pm - 10.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/a4.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right text-navy">5h ago</small>
                                    <strong>Chris Johnatan Overtunk</strong> started following <strong>Monica Smith</strong>. <br>
                                    <small class="text-muted">Yesterday 1:21 pm - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="dropdown-messages-box">
                                <a href="profile.html" class="pull-left">
                                    <img alt="image" class="img-circle" src="img/profile.jpg">
                                </a>
                                <div class="media-body ">
                                    <small class="pull-right">23h ago</small>
                                    <strong>Monica Smith</strong> love <strong>Kim Smith</strong>. <br>
                                    <small class="text-muted">2 days ago at 2:30 am - 11.06.2014</small>
                                </div>
                            </div>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="mailbox.html">
                                    <i class="fa fa-envelope"></i> <strong>Read All Messages</strong>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i class="fa fa-bell"></i>  <span class="label label-primary">8</span>
                    </a>
                    <ul class="dropdown-menu dropdown-alerts">
                        <li>
                            <a href="mailbox.html">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> You have 16 messages
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="profile.html">
                                <div>
                                    <i class="fa fa-twitter fa-fw"></i> 3 New Followers
                                    <span class="pull-right text-muted small">12 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="grid_options.html">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> Server Rebooted
                                    <span class="pull-right text-muted small">4 minutes ago</span>
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <div class="text-center link-block">
                                <a href="notifications.html">
                                    <strong>See All Alerts</strong>
                                    <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </li>
                    </ul>
                </li>


                <li>
                    <a href="login.html">
                        <i class="fa fa-sign-out"></i> Sair
                    </a>
                </li>
            </ul>

        </nav>
        </div>
            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2>Clientes</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Clientes</a>
                        </li>
                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>
        <div class="wrapper wrapper-content animated fadeInRight">

            <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins collapsed">
                        <div class="ibox-title">
                            <h5>Cadastre um novo cliente</h5>
                            <div class="ibox-tools">
                                <a class="collapse-link">
                                    <i class="fa fa-chevron-up"></i>
                                </a>
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                    <i class="fa fa-wrench"></i>
                                </a>
                                <ul class="dropdown-menu dropdown-user">
                                    <li><a href="#">Config option 1</a>
                                    </li>
                                    <li><a href="#">Config option 2</a>
                                    </li>
                                </ul>
                                <a class="close-link">
                                    <i class="fa fa-times"></i>
                                </a>
                            </div>
                        </div>
                        <div class="ibox-content">
                            <form method="post" class="form-horizontal" action="cliente.php">
                                <div class="form-group"><label class="col-sm-2 control-label">Nome</label>
                                    <div class="col-sm-10"><input type="text" name="nome" id="nome" class="form-control" required=""></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Telefone</label>
                                    <div class="col-sm-10"><input type="text" name="telefone" id="telefone" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Carro</label>
                                    <div class="col-sm-10"><input type="text" name="descricao" id="descricao" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Placa</label>
                                    <div class="col-sm-10"><input type="text" name="placa" id="placa" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mecanico</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" name="mecanico" id="mecanico">
                                        <option value="0">Selecione um mecânico</option>
                                        <option value="12">Colocar em espera</option>
                                        <?php
                                        $c = new Colaboradores();
                                          foreach ($c->listarColaboradores() as $key => $value) {
                                            ?>
                                              <option value="<?php echo $value->col_id ?>"><?php echo $value->col_nome ?></option>
                                            <?php
                                          }
                                         ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                        <button class="btn btn-primary" type="submit" name="salvainit" style="float:right; margin-left:10px">Salvar e Iniciar</button>
                                        <button class="btn btn-primary" type="submit" name="salvar" style="float:right; margin-left:10px">Salvar</button>
                                        <button class="btn btn-white" type="reset" style="float:right">Cancelar</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Clientes</h5>
                        <div class="ibox-tools">
                            <a class="collapse-link">
                                <i class="fa fa-chevron-up"></i>
                            </a>
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                                <i class="fa fa-wrench"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-user">
                                <li><a href="#">Config option 1</a>
                                </li>
                                <li><a href="#">Config option 2</a>
                                </li>
                            </ul>
                            <a class="close-link">
                                <i class="fa fa-times"></i>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                        <th>NOME</th>
                        <th>TELEFONE</th>
                        <th>CARRO</th>
                        <th>PLACA</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $c = new Clientes();
                        foreach ($c->listarClientes() as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $value->cli_nome ?></td>
                            <td><?php echo $value->cli_telefone ?></td>
                            <td><?php echo $value->car_descricao ?></td>
                            <td class="center"><?php echo $value->car_placa ?></td>
                            <td class="center" style="text-align:center"><a href="#" style="color:#777777" data-toggle="modal" data-target="#at<?php echo $value->cli_id ?>"><i class="fa fa-pencil"></i></a></td>
                        </tr>

                        <!-- Trigger the modal with a button -->
                        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

                        <!-- Modal -->
                        <div id="at<?php echo $value->cli_id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Cliente</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" action="cliente.php" method="post">
                                    <input type="hidden" name="idcliente" id="idcliente" value="<?php echo $value->cli_id ?>">
                                    <input type="hidden" name="idcarro" id="idcarro" value="<?php echo $value->car_id ?>">
                                    <div class="form-group"><label class="control-label">Nome</label>
                                          <input type="text" class="form-control" name="nome" id="nome" value="<?php echo $value->cli_nome ?>">
                                    </div>
                                    <div class="form-group"><label class="control-label">Telefone</label>
                                          <input type="text" class="form-control" name="telefone" id="telefone" value="<?php echo $value->cli_telefone ?>">
                                    </div>
                                    <div class="form-group"><label class="control-label">Carro</label>
                                          <input type="text" class="form-control" name="descricao" id="descricao" value="<?php echo $value->car_descricao ?>">
                                    </div>
                                    <div class="form-group"><label class="control-label">Placa</label>
                                          <input type="text" class="form-control" name="placa" id="placa" value="<?php echo $value->car_placa ?>">
                                    </div>

                              </div>
                              <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="atualizar">Atualizar</button>
                              </div>
                            </form>
                            </div>

                          </div>
                        </div>
                        <?php
                        }
                       ?>

                    </tbody>
                    <tfoot>
                    <tr>
                        <th>NOME</th>
                        <th>TELEFONE</th>
                        <th>CARRO</th>
                        <th>PLACA</th>
                        <th></th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
        </div>
        </div>
        </div>


    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
    <script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

    <script src="js/plugins/dataTables/datatables.min.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- iCheck -->
    <script src="js/plugins/iCheck/icheck.min.js"></script>


    <!-- Page-Level Scripts -->
    <script>
        $(document).ready(function(){
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [
                    { extend: 'copy'},
                    {extend: 'csv'},
                    {extend: 'excel', title: 'ExampleFile'},
                    {extend: 'pdf', title: 'ExampleFile'},

                    {extend: 'print',
                     customize: function (win){
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                    .addClass('compact')
                                    .css('font-size', 'inherit');
                    }
                    }
                ]

            });

        });

    </script>
</body>

</html>
