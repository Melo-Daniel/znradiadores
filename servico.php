<!DOCTYPE html>
<?php
require_once 'lib/Servico.php';
require_once 'lib/Colaboradores.php';
require_once 'lib/Cliente.php';
 ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Language" content="pt-br">
    <title>Serviços</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<script type="text/javascript">
function iniciarServico(){

  var cliente = document.getElementById('cliente').value;
  var mecanico = document.getElementById('mecanico').value;
  var status = 2;
  if(mecanico == 12){
    status = 1;
  }
  if(mecanico == 0){
    alert('Mecanico invalido! Selecione uma outra opcao.');
  }else{
    $.post("actions/ServicosAC.php",
    {
        op:1,
        cliente:cliente,
        mecanico:mecanico,
        status:status
    },
    function(data,status){
        location.reload();
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
                    <h2>Serviços</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Serviços</a>
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
                            <h5>Inicie um novo serviço</h5>
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
                            <form method="get" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Cliente</label>
                                    <div class="col-sm-10">
                                      <select class="form-control" name="cliente" id="cliente">
                                        <option value="0">Selecione um Cliente</option>
                                        <?php
                                        $c = new Clientes();
                                          foreach ($c->listarClientes() as $key => $value) {
                                            ?>
                                              <option value="<?php echo $value->cli_id ?>"><?php echo $value->cli_nome." - ".$value->car_descricao ?></option>
                                            <?php
                                          }
                                         ?>
                                      </select>
                                    </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">MecÃ¢nico</label>
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
                                  <div class="pull-right">
                                    <button class="btn btn-white" type="reset" >Cancelar</button>
                                    <button class="btn btn-primary" type="button" onclick="iniciarServico()" style="margin-left:10px">Iniciar Serviço</button>
                                  </div>
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
                        <h5>Serviços</h5>
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
                        <th>ID</th>
                        <th>CLIENTE</th>
                        <th>CARRO</th>
                        <th>VALOR</th>
                        <th>MECANICO</th>
                        <th>STATUS</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $c = new Servicos();
                        foreach ($c->listarServicos() as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $value->ser_id ?></td>
                            <td><?php echo $value->cli_nome ?></td>
                            <td><?php echo $value->car_descricao ?></td>
                            <td><?php echo $value->ser_valor ?></td>
                            <td class="center"><?php echo $value->col_nome ?></td>
                            <td class="center"><?php echo $value->sts_status ?></td>
                            <?php
                              if($value->ser_sts_id == 3){
                              ?>
                                <td style="text-align:center"><a href="servicoConcluido.php?id=<?php echo $value->ser_id ?>"><i class="fa fa-share"></i> Detalhes</a></td>
                              <?php
                            }elseif($value->ser_sts_id == 4){
                            ?>
                              <td style="text-align:center"><a href="servicoCancelado.php"><i class="fa fa-share"></i> Detalhes</a></td>
                            <?php
                          }elseif($value->ser_sts_id == 1){
                            ?>
                              <td style="text-align:center"><a href="servicoEspera.php?id=<?php echo $value->ser_id ?>"><i class="fa fa-share"></i> Detalhes</a></td>
                            <?php
                            }else{
                              ?>
                                <td style="text-align:center"><a href="produtoServico.php?id=<?php echo $value->ser_id ?>"><i class="fa fa-share"></i> Detalhes</a></td>
                              <?php
                            }
                             ?>

                        </tr>
                        <?php
                        }
                       ?>

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>CLIENTE</th>
                      <th>CARRO</th>
                      <th>VALOR</th>
                      <th>MECANICO</th>
                      <th>STATUS</th>
                      <th></th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                <div class="ibox float-e-margins collapsed">
                    <div class="ibox-title">
                        <h5>Todos Serviços</h5>
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
                        <th>ID</th>
                        <th>CLIENTE</th>
                        <th>CARRO</th>
                        <th>VALOR</th>
                        <th>MECANICO</th>
                        <th>STATUS</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($c->listarTodosServicos() as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $value->ser_id ?></td>
                            <td><?php echo $value->cli_nome ?></td>
                            <td><?php echo $value->car_descricao ?></td>
                            <td><?php echo $value->ser_valor ?></td>
                            <td class="center"><?php echo $value->col_nome ?></td>
                            <td class="center"><?php echo $value->sts_status ?></td>
                            <?php
                              if($value->ser_sts_id == 3){
                              ?>
                                <td style="text-align:center"><a href="servicoConcluido.php?id=<?php echo $value->ser_id ?>"><i class="fa fa-share"></i> Detalhes</a></td>
                              <?php
                            }elseif($value->ser_sts_id == 4){
                            ?>
                              <td style="text-align:center"><a href="servicoCancelado.php"><i class="fa fa-share"></i> Detalhes</a></td>
                            <?php
                          }elseif($value->ser_sts_id == 1){
                            ?>
                              <td style="text-align:center"><a href="servicoEspera.php?id=<?php echo $value->ser_id ?>"><i class="fa fa-share"></i> Detalhes</a></td>
                            <?php
                            }else{
                              ?>
                                <td style="text-align:center"><a href="produtoServico.php?id=<?php echo $value->ser_id ?>"><i class="fa fa-share"></i> Detalhes</a></td>
                              <?php
                            }
                             ?>

                        </tr>
                        <?php
                        }
                       ?>

                    </tbody>
                    <tfoot>
                    <tr>
                      <th>ID</th>
                      <th>CLIENTE</th>
                      <th>CARRO</th>
                      <th>VALOR</th>
                      <th>MECANICO</th>
                      <th>STATUS</th>
                      <th></th>
                    </tr>
                    </tfoot>
                    </table>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-12">
                <div class="ibox float-e-margins collapsed">
                    <div class="ibox-title">
                        <h5>Inicie um novo serviço</h5>
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
                        <form method="get" class="form-horizontal">
                            <div class="form-group"><label class="col-sm-2 control-label">Mecânico</label>
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
                              <div class="pull-right">
                                <button class="btn btn-white" type="reset" >Cancelar</button>
                                <a href="relatorioSemanal.php?id=<?php echo "15" ?>" target="_blank" class="btn btn-primary" style="margin-left:10px;margin-right:20px;">Relatório Semanal</a>
                              </div>
                            </div>
                        </form>
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
