<?php
session_start();
require_once 'lib/Servico.php';

$s = new Servicos();
$setor = $_GET['id'];
?>

<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ZN Radiadores</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Morris -->
    <link href="css/plugins/morris/morris-0.4.3.min.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="mini-navbar">
    <div id="wrapper">
      <?php
        $faturamentoAnual = $s->faturamentoAnualSetor($setor);
        $faturamentoMensal = $s->faturamentoMensalSetor($setor);
        $faturamentoSemanal = $s->faturamentoSemanalSetor($setor);

        $faturamentoRadiador = $s->faturamentoMensalSetor(3);
        $faturamentoRetifica = $s->faturamentoMensalSetor(1);
        $faturamentoGeral = $s->faturamentoMensalSetor(2);
        $faturamentoBalcao = $s->faturamentoMensalSetor(4);

        $mes = $s->faturamentoMensal();


        $faturamentoJaneiro = $s->faturamentoMensalSetorGrafico(1,$setor);
        $faturamentoFevereiro = $s->faturamentoMensalSetorGrafico(2,$setor);
        $faturamentoMarco = $s->faturamentoMensalSetorGrafico(3,$setor);
        $faturamentoAbril = $s->faturamentoMensalSetorGrafico(4,$setor);
        $faturamentoMaio = $s->faturamentoMensalSetorGrafico(5,$setor);
        $faturamentoJunho = $s->faturamentoMensalSetorGrafico(6,$setor);
        $faturamentoJulho = $s->faturamentoMensalSetorGrafico(7,$setor);
        $faturamentoAgosto = $s->faturamentoMensalSetorGrafico(8,$setor);
        $faturamentoSetembro = $s->faturamentoMensalSetorGrafico(9,$setor);
        $faturamentoOutubro = $s->faturamentoMensalSetorGrafico(10,$setor);
        $faturamentoNovembro = $s->faturamentoMensalSetorGrafico(11,$setor);
        $faturamentoDezembro = $s->faturamentoMensalSetorGrafico(12,$setor);
       ?>
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">

          <input type="hidden" name="faturamento1" id="faturamento1" value="<?php echo $faturamentoJaneiro->faturamento ?>">
          <input type="hidden" name="faturamento2" id="faturamento2" value="<?php echo $faturamentoFevereiro->faturamento ?>">
          <input type="hidden" name="faturamento3" id="faturamento3" value="<?php echo $faturamentoMarco->faturamento ?>">
          <input type="hidden" name="faturamento4" id="faturamento4" value="<?php echo $faturamentoAbril->faturamento ?>">
          <input type="hidden" name="faturamento5" id="faturamento5" value="<?php echo $faturamentoMaio->faturamento ?>">
          <input type="hidden" name="faturamento6" id="faturamento6" value="<?php echo $faturamentoJunho->faturamento ?>">
          <input type="hidden" name="faturamento7" id="faturamento7" value="<?php echo $faturamentoJulho->faturamento ?>">
          <input type="hidden" name="faturamento8" id="faturamento8" value="<?php echo $faturamentoAgosto->faturamento ?>">
          <input type="hidden" name="faturamento9" id="faturamento9" value="<?php echo $faturamentoSetembro->faturamento ?>">
          <input type="hidden" name="faturamento10" id="faturamento10" value="<?php echo $faturamentoOutubro->faturamento ?>">
          <input type="hidden" name="faturamento11" id="faturamento11" value="<?php echo $faturamentoNovembro->faturamento ?>">
          <input type="hidden" name="faturamento12" id="faturamento12" value="<?php echo $faturamentoDezembro->faturamento ?>">


            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle"/>
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
                <li>
                    <a href="relatorios.php?id=1&datai=2017-08-01&dataf=2017-08-30"><i class="fa fa-list"></i> <span class="nav-label">Colaboradores</span></a>
                </li>
                <li>
                <a href="#"><i class="fa fa-pie-chart"></i> <span class="nav-label">Relatorios</span><span class="fa arrow"></span></a>
                <ul class="nav nav-second-level collapse">
                    <li><a href="relatorioSetor.php?id=3">Radiador</a></li>
                    <li><a href="relatorioSetor.php?id=2">Geral</a></li>
                    <li><a href="relatorioSetor.php?id=1">Retífica</a></li>
                    <li><a href="relatorioSetor.php?id=4">Balcão</a></li>
                </ul>
            </li>
                <!-- Fim menu lateral -->
            </ul>

        </div>
    </nav>

        <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
        <div class="navbar-header">
            <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>

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
                                <div>
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
                                <div>
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
                                <div>
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
        <div class="wrapper wrapper-content">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Faturamento Anual</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php echo "R$".$faturamentoAnual->faturamento ?></h1>


                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Faturamento Mensal</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?php if($faturamentoMensal->faturamento == null){
                           echo "R$0,00";
                         } else {
                           echo "R$".$faturamentoMensal->faturamento;
                         } ?></h1>


                    </div>
                </div>
            </div>

            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Faturamento Semanal</h5>
                    </div>
                    <div class="ibox-content">

                        <div class="row">
                            <div class="col-md-6">
                                <h1 class="no-margins"><?php if($faturamentoSemanal->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".$faturamentoSemanal->faturamento;
                                 } ?></h1>

                            </div>

                        </div>


                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        Média
                    </div>
                    <div class="ibox-content no-padding">
                        <div class="flot-chart m-t-lg" style="height: 55px;">
                            <div class="flot-chart-content" id="flot-chart1"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div>
                                        <span class="pull-right text-right">
                                            <br/>
                                            Total: 162.862
                                        </span>
                            <h3 class="font-bold no-margins">
                                Faturamento mensal por setor
                            </h3>
                        </div>

                        <div class="m-t-sm">

                            <div class="row">
                                <div class="col-md-12">
                                    <div>
                                        <canvas id="lineChart" height="114"></canvas>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <div class="m-t-md">

                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Media de faturamento</h5>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Radiador</small>
                                <h4><?php if($faturamentoRadiador->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$faturamentoRadiador->faturamento);
                                 } ?></h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">Percentual</small>
                                <h4><?php $t = ($faturamentoRadiador->faturamento * 100)/$mes->faturamento; echo round($t,2)."%"; ?></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Total</small>
                                <h4><?php if($mes->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$mes->faturamento);
                                 } ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Geral</small>
                                <h4><?php if($faturamentoGeral->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$faturamentoGeral->faturamento);
                                 } ?></h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">Percentual</small>
                                <h4><?php $t = ($faturamentoGeral->faturamento * 100)/$mes->faturamento; echo round($t,2)."%"; ?></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Total</small>
                                <h4><?php if($mes->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$mes->faturamento);
                                 } ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Retifica</small>
                                <h4><?php if($faturamentoRetifica->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$faturamentoRetifica->faturamento);
                                 } ?></h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">Percentual</small>
                                <h4><?php $t = ($faturamentoRetifica->faturamento * 100)/$mes->faturamento; echo round($t,2)."%"; ?></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Total</small>
                                <h4><?php if($mes->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$mes->faturamento);
                                 } ?></h4>
                            </div>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            <div class="col-xs-4">
                                <small class="stats-label">Balcao</small>
                                <h4><?php if($faturamentoBalcao->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$faturamentoBalcao->faturamento);
                                 } ?></h4>
                            </div>

                            <div class="col-xs-4">
                                <small class="stats-label">Percentual</small>
                                <h4><?php $t = ($faturamentoBalcao->faturamento * 100)/$mes->faturamento; echo round($t,2)."%"; ?></h4>
                            </div>
                            <div class="col-xs-4">
                                <small class="stats-label">Total</small>
                                <h4><?php if($mes->faturamento == null){
                                   echo "R$0,00";
                                 } else {
                                   echo "R$".str_replace(".",",",$mes->faturamento);
                                 } ?></h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

        <div class="col-lg-12">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Serviços da semana </h5>
        </div>

        <div class="ibox-content">

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                      <tr>
                          <th>ID</th>
                          <th>CLIENTE</th>
                          <th>CARRO</th>
                          <th>VALOR</th>
                          <th>MECANICO</th>
                          <th>PAGAMENTO</th>
                          <th></th>
                      </tr>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($s->relatorioSemanalDeServicosColaboradorSetor($setor) as $key => $value) {
                      ?>
                      <tr class="gradeX">
                        <td><?php echo $value->ser_id ?></td>
                        <td><?php echo $value->cli_nome ?></td>
                        <td><?php echo $value->car_descricao ?></td>
                        <td><?php echo $value->ser_valor ?></td>
                        <td class="center"><?php echo $value->col_nome ?></td>
                        <td class="center"><?php echo $value->fpg_forma ?></td>
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
                </table>
            </div>

        </div>
        </div>
        </div>
        </div>
        <div class="row">

        <div class="col-lg-6">
        <div class="ibox float-e-margins">
        <div class="ibox-title">
            <h5>Serviços da semana </h5>
        </div>

        <div class="ibox-content">

            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover dataTables-example" >
                    <thead>
                    <tr>
                      <tr>
                          <th>COLABORADOR</th>
                          <th>SERVIÇOS</th>
                      </tr>
                    </tr>
                    </thead>
                    <tbody>
                      <?php
                        foreach ($s->rankNum() as $key => $value) {
                      ?>
                      <tr class="gradeX">
                        <td><?php echo $value->col_nome ?></td>
                        <td><?php echo $value->ser ?></td>
                      </tr>
                      <?php
                        }
                      ?>
                    </tbody>
                </table>
            </div>

        </div>
        </div>
        </div>

                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Serviços da semana </h5>
                </div>

                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                              <tr>
                                  <th>COLABORADOR</th>
                                  <th>VALOR</th>
                              </tr>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($s->rankValor() as $key => $value) {
                              ?>
                              <tr class="gradeX">
                                <td><?php echo $value->col_nome ?></td>
                                <td><?php echo $value->ser ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                            </tbody>
                        </table>
                    </div>

                </div>
                </div>
                </div>

                <div class="col-lg-6">
                <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Serviços da semana </h5>
                </div>

                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                            <thead>
                            <tr>
                              <tr>
                                  <th>PEÇA</th>
                                  <th>QTD VENDIDA</th>
                              </tr>
                            </tr>
                            </thead>
                            <tbody>
                              <?php
                                foreach ($s->rankValor() as $key => $value) {
                              ?>
                              <tr class="gradeX">
                                <td><?php echo $value->col_nome ?></td>
                                <td><?php echo $value->ser ?></td>
                              </tr>
                              <?php
                                }
                              ?>
                            </tbody>
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

    <!-- Flot -->
    <script src="js/plugins/flot/jquery.flot.js"></script>
    <script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
    <script src="js/plugins/flot/jquery.flot.spline.js"></script>
    <script src="js/plugins/flot/jquery.flot.resize.js"></script>
    <script src="js/plugins/flot/jquery.flot.pie.js"></script>
    <script src="js/plugins/flot/jquery.flot.symbol.js"></script>
    <script src="js/plugins/flot/curvedLines.js"></script>

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- Jvectormap -->
    <script src="js/plugins/jvectormap/jquery-jvectormap-2.0.2.min.js"></script>
    <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>
    <script src="js/plugins/dataTables/datatables.min.js"></script>

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

    <script>
        $(document).ready(function() {

          var f1 = document.getElementById('faturamento1').value;
          var f2 = document.getElementById('faturamento2').value;
          var f3 = document.getElementById('faturamento3').value;
          var f4 = document.getElementById('faturamento4').value;
          var f5 = document.getElementById('faturamento5').value;
          var f6 = document.getElementById('faturamento6').value;
          var f7 = document.getElementById('faturamento7').value;
          var f8 = document.getElementById('faturamento8').value;
          var f9 = document.getElementById('faturamento9').value;
          var f10 = document.getElementById('faturamento10').value;
          var f11 = document.getElementById('faturamento11').value;
          var f12 = document.getElementById('faturamento12').value;

            var d1 = [[1262304000000, 6], [1264982400000, 3057], [1267401600000, 20434], [1270080000000, 31982], [1272672000000, 26602], [1275350400000, 27826], [1277942400000, 24302], [1280620800000, 24237], [1283299200000, 21004], [1285891200000, 12144], [1288569600000, 10577], [1291161600000, 10295]];
            var d2 = [[1262304000000, 5], [1264982400000, 200], [1267401600000, 1605], [1270080000000, 6129], [1272672000000, 11643], [1275350400000, 19055], [1277942400000, 30062], [1280620800000, 39197], [1283299200000, 37000], [1285891200000, 27000], [1288569600000, 21000], [1291161600000, 17000]];

            var data1 = [
                { label: "Data 1", data: d1, color: '#17a084'},
                { label: "Data 2", data: d2, color: '#127e68' }
            ];
            $.plot($("#flot-chart1"), data1, {
                xaxis: {
                    tickDecimals: 0
                },
                series: {
                    lines: {
                        show: true,
                        fill: true,
                        fillColor: {
                            colors: [{
                                opacity: 1
                            }, {
                                opacity: 1
                            }]
                        },
                    },
                    points: {
                        width: 0.1,
                        show: false
                    },
                },
                grid: {
                    show: false,
                    borderWidth: 0
                },
                legend: {
                    show: false,
                }
            });

            var lineData = {
                labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Nobembro","Dezembro"],
                datasets: [
                    {
                        label: "Faturamento",
                        backgroundColor: "rgba(26,179,148,0.5)",
                        borderColor: "rgba(26,179,148,0.7)",
                        pointBackgroundColor: "rgba(26,179,148,1)",
                        pointBorderColor: "#fff",
                        data: [f1, f2, f3, f4, f5, f6, f7,f8,f9,f10,f11,f12]
                    },
                    /*{
                        label: "Example dataset",
                        backgroundColor: "rgba(220,220,220,0.5)",
                        borderColor: "rgba(220,220,220,1)",
                        pointBackgroundColor: "rgba(220,220,220,1)",
                        pointBorderColor: "#fff",
                        data: [6500, 5900, 4000, 5100, 3600, 2500, 4000,8000,9000,9000,9000,9000]
                    }*/
                ]
            };

            var lineOptions = {
                responsive: true
            };


            var ctx = document.getElementById("lineChart").getContext("2d");
            new Chart(ctx, {type: 'line', data: lineData, options:lineOptions});


        });
    </script>
</body>
</html>
