<?php
require_once 'lib/ProdutoServico.php';
require_once 'lib/Servico.php';
$servico = $_GET['id'];
 ?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ZN Radiadores</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/plugins/slick/slick.css" rel="stylesheet">
    <link href="css/plugins/slick/slick-theme.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

<script type="text/javascript">
function finalizarPagamento(){
  var pagamento = -1;
  dinheiro = document.getElementById('dinheiro');
  cartao = document.getElementById('cartao');
  transferencia = document.getElementById('transferencia');

  //captura radio selecionado

  if(dinheiro.checked == true){
    pagamento = 2;
  }else if (cartao.checked == true) {
    pagamento = 4;
  }else if (transferencia.checked == true) {
    pagamento = 5;
  }


  var garantia = -1;
  var g0 = document.getElementById('g0');
  var g1 = document.getElementById('g1');
  var g2 = document.getElementById('g2');
  var g3 = document.getElementById('g3');

  //captura radio selecionado
  alert(pagamento);
  if(g0.checked == true){
    garantia = 1;
  }else if(g1.checked == true){
    garantia = 2;
  }else if(g2.checked == true){
    garantia = 3;
  }else if(g3.checked == true){
    garantia = 4;
  }

  var servico = document.getElementById('servico').value;

  $.post("actions/PagamentoAC.php",
  {
    op:1,
    pagamento:pagamento,
    garantia:garantia,
    servico:servico,
    valor:200
  },function(data,status){
    if(data=='ok'){
      location.href = "principal.php";
    }else{
      alert(data);
    }
  });
}
</script>
</head>

<body class="mini-navbar">

<div id="wrapper">
    <input type="hidden" name="servico" id="servico" value="<?php echo $servico?>">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="img/daniel-small.jpg" />
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
                    <form role="search" class="navbar-form-custom" action="search_results.html">

                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">

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
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>
        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-lg-10">
                <h2>Pagamento</h2>
                <ol class="breadcrumb">
                    <li>
                        <a href="index.html">Home</a>
                    </li>
                    <li>
                        <a>Serviço</a>
                    </li>
                    <li class="active">
                        <strong>Pagamento</strong>
                    </li>
                </ol>
            </div>
            <div class="col-lg-2">

            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeInRight">
            <div class="row">
                <div class="col-lg-12">

                    <div class="ibox product-detail">
                        <div class="ibox-content">

                            <div class="row">
                                <div class="col-md-5">
                                  <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h5>Nota de Serviço</h5>
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

                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th>PRODUTO</th>
                                    <th>QTD</th>
                                    <th>VALOR</th>
                                </tr>
                                </thead>
                                <tbody>

                                  <?php
                                  $ps = new ProdutoServicos();
                                  foreach ($ps->listarProdutosAdicionados($servico) as $key => $value) {
                                    ?>
                                    <tr>
                                        <td><?php echo $value->pro_nome ?></td>
                                        <td><?php echo $value->prs_qtd ?></td>
                                        <td><?php echo $value->prs_valor_total ?></td>
                                    </tr>
                                  <?php
                                    }
                                  ?>

                                </tbody>
                            </table>

                        </div>
                    </div>
                                </div>
                                <div class="col-md-7">
                                  <?php
                                    $s = new Servicos();
                                    $ser = $s->listarServico($servico);
                                   ?>
                                    <h2 class="font-bold m-b-xs">
                                        <?php echo $ser->cli_nome ?>
                                    </h2>
                                    <small><?php echo $ser->car_descricao ?></small>
                                    <hr>
                                    <div>
                                        <h1 class="product-main-price">R$<?php echo $ser->ser_valor ?></h1>
                                    </div>
                                    <hr>

                                    <dl class="dl-horizontal m-t-md small">
                                        <dt>ID</dt>
                                        <dd><?php echo $servico ?></dd><br>
                                        <dt>Mecânico</dt>
                                        <dd><?php echo $ser->col_nome ?></dd><br>
                                        <dt>Data</dt>
                                        <dd><?php
                                          $date=date_create($ser->ser_data);
                                          echo date_format($date,"d/m/Y");
                                         ?></dd><br>

                                        <dt>Forma de Pagamento</dt>
                                        <dd><?php echo $ser->fpg_forma ?></dd><br>
                                        <dt>Garantia</dt>
                                        <dd><?php echo $ser->gar_garantia.' meses de garantia.' ?></dd><br>

                                    </dl>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>
            </div>




        </div>
        <div class="footer">
            <div class="pull-right">
              <button class="btn btn-primary" type="reset"><i class="fa fa-envelope-o"></i></button>
              <!--<button class="btn btn-primary" type="button" onclick="iniciarServico()" style="margin-left:10px">Pagamento</button>-->
              <a href="nota.php?id=<?php echo $servico?>" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i></a>
            </div>
        </div>

    </div>
</div>



<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- slick carousel-->
<script src="js/plugins/slick/slick.min.js"></script>

<script>
    $(document).ready(function(){


        $('.product-images').slick({
            dots: true
        });

    });

</script>

</body>

</html>
