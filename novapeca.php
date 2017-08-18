<!DOCTYPE html>
<?php
require_once 'lib/Produtos.php';
$p = new Produtos();
if (isset($_POST['atualizar'])) {

  $id = $_POST['id'];
  $nome = $_POST['nome'];
  $codigo = $_POST['codigo'];
  $valor = $_POST['valor'];
  $qtd = $_POST['qtd'];
  $aplicacao = $_POST['aplicacao'];
  $img = 'default.jpg';
  $status = 1;

  $p->setId($id);
  $p->setNome($nome);
  $p->setCodigo($codigo);
  $p->setValor($valor);
  $p->setQtd($qtd);
  $p->setAplicacao($aplicacao);
  $p->setImg($img);
  $p->setStatus($status);

  if($p->atualizarProduto($p)){
    header("Location:novapeca.php");
  }
}
 ?>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Basic Form</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <link href="css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
<script type="text/javascript">
function inserirProduto(){
  var nome = document.getElementById('nome').value;
  var codigo = document.getElementById('codigo').value;
  var valor = document.getElementById('valor').value;
  var qtd = document.getElementById('qtd').value;
  var aplicacao = document.getElementById('aplicacao').value;
  $.post("actions/ProdutosAC.php",
  {
      op:1,
      nome:nome,
      codigo:codigo,
      valor:valor,
      qtd:qtd,
      aplicacao:aplicacao
  },
  function(data,status){
    if(data == 'ok'){
      location.reload();
    }
  });
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
                    <a href="servico.php"><i class="fa fa-wrench"></i> <span class="nav-label">Serviços</span></a>
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
                    <h2>Peças</h2>
                    <ol class="breadcrumb">
                        <li>
                            <a href="index.html">Home</a>
                        </li>
                        <li>
                            <a>Peças</a>
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
                            <h5>Cadastre uma nova peça</h5>
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
                                <div class="form-group"><label class="col-sm-2 control-label">Descrição</label>
                                    <div class="col-sm-10"><input type="text" id="nome" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Código</label>
                                    <div class="col-sm-10"><input type="text" id="codigo" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Aplicação</label>
                                    <div class="col-sm-10"><input type="text" id="aplicacao" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Valor</label>
                                    <div class="col-sm-10"><input type="text" id="valor" class="form-control"></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Quantidade</label>
                                    <div class="col-sm-10"><input type="text" id="qtd" class="form-control"></div>
                                </div>

                                <div class="hr-line-dashed"></div>
                                <div class="form-group">
                                        <button class="btn btn-primary" type="button" onclick="inserirProduto()" style="float:right; margin-left:10px">Salvar</button>
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
                        <h5>Tabela de peças</h5>
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
                        <th>COD</th>
                        <th>DESCRIÇÃO</th>
                        <th>QTD</th>
                        <th>VALOR</th>
                        <th>APL.</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        $p = new Produtos();
                        foreach ($p->listarProdutos() as $key => $value) {
                        ?>
                        <tr class="gradeX">
                            <td><?php echo $value->pro_codigo ?></td>
                            <td><?php echo $value->pro_nome ?></td>
                            <td><?php echo $value->pro_qtd ?></td>
                            <td class="center"><?php echo $value->pro_valor ?></td>
                            <td class="center"><?php echo $value->pro_aplicacao ?></td>
                            <td class="center" style="text-align:center"><a href="#" style="color:#777777" data-toggle="modal" data-target="#at<?php echo $value->pro_id ?>"><i class="fa fa-pencil"></i></a></td>
                        </tr>

                        <!-- Trigger the modal with a button -->
                        <!--<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>-->

                        <!-- Modal -->
                        <div id="at<?php echo $value->pro_id ?>" class="modal fade" role="dialog">
                          <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                              <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Número de Peças</h4>
                              </div>
                              <div class="modal-body">
                                <form class="form-horizontal" action="novapeca.php" method="post">
                                    <input type="hidden" name="id" id="id" value="<?php echo $value->pro_id ?>">
                                    <div class="form-group"><label class="control-label">Código</label>
                                          <input type="text" class="form-control" name="codigo" id="qtd" value="<?php echo $value->pro_codigo ?>">
                                    </div>
                                    <div class="form-group"><label class="control-label">Descrição</label>
                                          <input type="text" class="form-control" name="nome" id="qtd" value="<?php echo $value->pro_nome ?>">
                                    </div>
                                    <div class="form-group"><label class="control-label">Qtd</label>
                                          <input type="text" class="form-control" name="qtd" id="qtd" value="<?php echo $value->pro_qtd ?>">
                                    </div>
                                    <div class="form-group"><label class="control-label">Valor</label>
                                          <input type="text" class="form-control" name="valor" id="qtd" value="<?php echo $value->pro_valor ?>">
                                    </div>
                                    <div class="form-group"><label class="control-label">Aplicação</label>  
                                          <input type="text" class="form-control" name="aplicacao" id="qtd" value="<?php echo $value->pro_aplicacao ?>">
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
                      <th>COD</th>
                      <th>DESCRIÇÃO</th>
                      <th>QTD</th>
                      <th>VALOR</th>
                      <th>APL.</th>
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
