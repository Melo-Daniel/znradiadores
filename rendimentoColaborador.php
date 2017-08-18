<?php
session_start();
if(!isset($_SESSION['usuario'])){
  header("Location:index.php");
}
require_once 'lib/Servico.php';
$id = $_GET['id'];
$s = new Servicos();
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>ZN <?php echo $id ?></title>

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



        <div class="gray-bg dashbard-1">
                <div class="row  border-bottom white-bg dashboard-header">
                    <div class="col-md-12">
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
                      foreach ($c->listarServicoColaborador($id) as $key => $value) {
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
                [0,10],[1,0],[2,20],[3,30],[4,10],[5,3],[6,10],[7,40],[8,80],[9,50],[10,10],[11,40]
            ];
            $("#flot-dashboard-chart").length && $.plot($("#flot-dashboard-chart"), [
                data1
            ],
                    {
                        series: {
                            lines: {
                                show: false,
                                fill: true
                            },
                            splines: {
                                show: true,
                                tension: 0.4,
                                lineWidth: 1,
                                fill: 0.4
                            },
                            points: {
                                radius: 0,
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
                labels: ["Retífica","Radiador","Geral","Balcão" ],
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
                labels: ["Retífica","Radiador","Geral","Balcão" ],
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
