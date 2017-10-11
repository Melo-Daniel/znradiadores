<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:index.php");
}
require_once 'lib/Servico.php';
require_once 'lib/Colaboradores.php';
$s = new Servicos();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ZN Radiadores</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <!-- Toastr style -->
    <link href="css/plugins/toastr/toastr.min.css" rel="stylesheet">

    <!-- Gritter -->
    <link href="js/plugins/gritter/jquery.gritter.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body  class="mini-navbar">
    <div id="wrapper">
        <?php
        //Geral
          $retifica = $s->numeroServicosPorSetor(1);
          $geral = $s->numeroServicosPorSetor(2);
          $radiador = $s->numeroServicosPorSetor(3);
          $atendente = $s->numeroServicosPorSetor(4);

          $numerototal = $s->numeroServicosTotal();
          //Hoje
          $retificahj = $s->numeroServicosPorSetorHoje(1);
          $geralhj = $s->numeroServicosPorSetorHoje(2);
          $radiadorhj = $s->numeroServicosPorSetorHoje(3);
          $atendentehj = $s->numeroServicosPorSetorHoje(4);

          $faturamentoJaneiro = $s->faturamentoMensalGrafico(1);
          $faturamentoFevereiro = $s->faturamentoMensalGrafico(2);
          $faturamentoMarco = $s->faturamentoMensalGrafico(3);
          $faturamentoAbril = $s->faturamentoMensalGrafico(4);
          $faturamentoMaio = $s->faturamentoMensalGrafico(5);
          $faturamentoJunho = $s->faturamentoMensalGrafico(6);
          $faturamentoJulho = $s->faturamentoMensalGrafico(7);
          $faturamentoAgosto = $s->faturamentoMensalGrafico(8);
          $faturamentoSetembro = $s->faturamentoMensalGrafico(9);
          $faturamentoOutubro = $s->faturamentoMensalGrafico(10);
          $faturamentoNovembro = $s->faturamentoMensalGrafico(11);
          $faturamentoDezembro = $s->faturamentoMensalGrafico(12);
        ?>

        <input type="hidden" name="retifica" id="retifica" value="<?php echo $retifica->numero ?>">
        <input type="hidden" name="geral" id="geral" value="<?php echo $geral->numero ?>">
        <input type="hidden" name="atendente" id="atendente" value="<?php echo $atendente->numero ?>">
        <input type="hidden" name="radiador" id="radiador" value="<?php echo $radiador->numero ?>">

        <input type="hidden" name="retificahj" id="retificahj" value="<?php echo $retificahj->numero ?>">
        <input type="hidden" name="geralhj" id="geralhj" value="<?php echo $geralhj->numero ?>">
        <input type="hidden" name="atendentehj" id="atendentehj" value="<?php echo $atendentehj->numero ?>">
        <input type="hidden" name="radiadorhj" id="radiadorhj" value="<?php echo $radiadorhj->numero ?>">

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
                    <li>
                        <a href="saidas.php"><i class="fa fa-money"></i> <span class="nav-label">Colaboradores</span></a>
                    </li>
                    <!-- Fim menu lateral -->
                </ul>

            </div>
        </nav>

        <div id="page-wrapper" class="gray-bg dashbard-1">
        <div class="row border-bottom">
        <nav class="navbar navbar-static-top" role="navigation" style="margin-bottom: 0">
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
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-6">
                        <div class="flot-chart dashboard-chart">
                            <div class="flot-chart-content" id="flot-dashboard-chart"></div>
                        </div>
                        <div class="row text-left">
                            <div class="col-xs-4">
                                <div class=" m-l-md">
                                <span class="h4 font-bold m-t block">R$<?php $fa = $s->faturamentoAnual(); echo $fa->faturamento; ?></span>
                                <small class="text-muted m-b block">Faturamento Anual</small>
                                </div>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">R$<?php $fm = $s->faturamentoMensal(); echo $fm->faturamento; ?></span>
                                <small class="text-muted m-b block">Faturamento Mensal</small>
                            </div>
                            <div class="col-xs-4">
                                <span class="h4 font-bold m-t block">R$<?php $fs = $s->faturamentoSemanal(); echo $fs->faturamento; ?></span>
                                <small class="text-muted m-b block">Faturamento Semanal</small>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-box">
                        <h4>
                            Faturamento por setor
                        </h4>
                        <p>
                            Faturamento baseado na função do colaborador.
                        </p>
                            <div class="row text-center">
                                <div class="col-lg-6">
                                    <canvas id="doughnutChart2" width="80" height="80" style="margin: 18px auto 0"></canvas>
                                    <h5 >Setores Geral</h5>
                                </div>
                                <div class="col-lg-6">
                                    <canvas id="doughnutChart" width="80" height="80" style="margin: 18px auto 0"></canvas>
                                    <h5 >Setores Hoje</h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="statistic-box">
                        <h1>
                            Hoje: <?php $valor = $s->listarFaturamentoDoDia();
                                        if($valor->valor == null){
                                          echo "R$0,00";
                                        }else{
                                          echo "R$".$valor->valor;
                                        } ?>
                        </h1>
                        <br>
                        <dl class="dl-horizontal m-t-md small">
                            <dt>Dinheiro</dt>
                            <dd><?php $valor = $s->listarFaturamentoDoDiaDinheiro();
                                        if($valor->valor == null){
                                          echo "R$0,00";
                                        }else{
                                          echo "R$".$valor->valor;
                                        } ?></dd><br>
                            <dt>Cartão</dt>
                            <dd><?php $valor = $s->listarFaturamentoDoDiaCartao();
                                        if($valor->valor == null){
                                          echo "R$0,00";
                                        }else{
                                          echo "R$".$valor->valor;
                                        } ?></dd><br>
                            <dt>Serviços</dt>
                            <dd><?php echo $numerototal->numero ?></dd><br>
                        </dl>
                        </div>
                    </div>
                    <div class="col-md-12">
                      <div class="row">
                        <?php
                        $c = new Colaboradores();
                          foreach ($c->listarColaboradoresM() as $key => $value) {
                        ?>
                        <div class="col-lg-4">
                            <div class="contact-box">
                                <a href="ponto.php?ids=<?php echo $value->col_id?>">
                                <div class="col-sm-4">
                                    <div class="text-center">
                                        <img alt="image" class="img-circle m-t-xs img-responsive" src="img/<?php echo $value->col_img ?>">
                                        <div class="m-t-xs font-bold"><?php echo $value->fun_funcao ?></div>
                                    </div>
                                </div>
                                <div class="col-sm-8">
                                    <h3><strong><?php echo $value->col_nome ?></strong></h3>

                                    <address>
                                      <p class="small font-bold">
                                        <span><i class="fa fa-circle text-navy"></i> Disponível</span>
                                      </p>
                                    </address>
                                </div>
                                <div class="clearfix"></div>
                                    </a>
                            </div>
                        </div>
                        <?php
                          }
                         ?>

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

    <!-- Peity -->
    <script src="js/plugins/peity/jquery.peity.min.js"></script>
    <script src="js/demo/peity-demo.js"></script>

    <!-- Custom and plugin javascript -->
    <script src="js/inspinia.js"></script>
    <script src="js/plugins/pace/pace.min.js"></script>

    <!-- jQuery UI -->
    <script src="js/plugins/jquery-ui/jquery-ui.min.js"></script>

    <!-- GITTER -->
    <script src="js/plugins/gritter/jquery.gritter.min.js"></script>

    <!-- Sparkline -->
    <script src="js/plugins/sparkline/jquery.sparkline.min.js"></script>

    <!-- Sparkline demo data  -->
    <script src="js/demo/sparkline-demo.js"></script>

    <!-- ChartJS-->
    <script src="js/plugins/chartJs/Chart.min.js"></script>

    <!-- Toastr -->
    <script src="js/plugins/toastr/toastr.min.js"></script>


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


            var data1 = [
                [0,f1],[1,f2],[2,f3],[3,f4],[4,f5],[5,f6],[6,f7],[7,f8],[8,f9],[9,f10],[10,f11],[11,f12]
            ];
            var data2 = [
                [0,1033],[1,444],[2,2000],[3,3000],[4,1000],[5,30000],[6,1000],[7,400],[8,8000],[9,5000],[10,100],[11,4000]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1,data2
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true,
                                fillColor: {
                                    colors: [{
                                        opacity: 1
                                    }, {
                                        opacity: 1
                                    }]
                                },
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0.1,
                                show: true
                            },
                            shadowSize: 2
                        },
                        grid: {
                            hoverable: true,
                            clickable: true,
                            tickColor: "#d5d5d5",
                            borderWidth: 1,
                            color: '#d5d5d5'
                        },
                        colors: ["#1ab394", "#1C00F0"],
                        xaxis:{
                          ticks: 12,
                          labels: ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho","Agosto","Setembro","Outubro","Nobembro","Dezembro"]
                        },
                        yaxis: {
                            ticks: 4
                        },
                        tooltip: true
                    }
            );
            var retificahj = document.getElementById('retificahj').value;
            var geralhj = document.getElementById('geralhj').value;
            var radiadorhj = document.getElementById('radiadorhj').value;
            var atendentehj = document.getElementById('atendentehj').value;
            var doughnutData = {
                labels: ["Retíica","Rad","Geral","Balcão" ],
                datasets: [{
                    data: [retificahj,radiadorhj,geralhj,atendentehj],
                    backgroundColor: ["#a3e154","#ffff00","#9CC3DA","#ff0000"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };


            var ctx4 = document.getElementById("doughnutChart").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

            var retifica = document.getElementById('retifica').value;
            var geral = document.getElementById('geral').value;
            var radiador = document.getElementById('radiador').value;
            var atendente = document.getElementById('atendente').value;
            var doughnutData = {
                labels: ["Retífica","Rad","Geral","Balcão" ],
                datasets: [{
                    data: [retifica,radiador,geral,atendente],
                    backgroundColor: ["#a3e154","#ffff00","#9CC3DA","#ff0000"]
                }]
            } ;


            var doughnutOptions = {
                responsive: false,
                legend: {
                    display: false
                }
            };

            var ctx4 = document.getElementById("doughnutChart2").getContext("2d");
            new Chart(ctx4, {type: 'doughnut', data: doughnutData, options:doughnutOptions});

        });
    </script>
</body>
</html>
