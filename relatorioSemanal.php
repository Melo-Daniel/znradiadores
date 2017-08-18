<?php
session_start();

//inclui a classe conexão
require_once 'lib/Servico.php';
require_once 'lib/Colaboradores.php';
require_once 'lib/ProdutoServico.php';
//incluir a classe mpdf
include 'mpdf60/mpdf.php';

$colaborador = $_GET['id'];
$col = new Colaboradores();
$colab = $col->listarColaborador($colaborador);
$s = new Servicos();
$ps = new ProdutoServicos();
//inicia o buffer
ob_start();
//pegar o conteudo do buffer, inserir na variável e limpar a memória
$html = ob_get_clean();
//converter o conteudo para html
$html = utf8_encode($html);
$total = 0;
$html =
        "<html>
        <head>
        <link href='css/bootstrap.min.css' rel='stylesheet'>
        <link href='font-awesome/css/font-awesome.css' rel='stylesheet'>

        <link href='css/animate.css' rel='stylesheet'>
        <link href='css/style.css' rel='stylesheet'>
        </head>"

        . "<body style='background:#ffffff'>
        <div class='wrapper wrapper-content'>
            <div class='row'>
                <div class'col-lg-12'>
                <h2 style='text-align:center;font-size:80px;color:#000000'>
                  $colab->col_nome</h2>
                    <div class='ibox product-detail'>
                        <div class='ibox-content'>";
                            $s = new Servicos();
                            $servicos = $s->relatorioSemanalDeServicosColaborador($colaborador);
                            $total = sizeof($servicos);
                            foreach ($servicos as $key => $value) {

                            $html .="<div class='row'>
                              <div class='col-md-7'>";


                                    $html .="<h2 class='font-bold m-b-xs' style='font-size:40px;color:#000000'>
                                        $value->cli_nome
                                    </h2>
                                    <small style='font-size:40px;color:#000000'>$value->car_descricao </small>

                                    <div>
                                        <h1 class='product-main-price' style='font-size:40px;color:#000000'>R$$value->ser_valor</h1>
                                    </div>
                                </div>
                                <div class='col-md-5'>
                                  <div class='ibox float-e-margins'>
                                    <div class='ibox-content'>
                                        <table class='table'>
                                            <thead>
                                            <tr>
                                                <th style='font-size:30px;color:#000000'>PRODUTO</th>
                                                <th style='font-size:30px;color:#000000'>QTD</th>
                                                <th style='font-size:30px;color:#000000'>VALOR</th>
                                            </tr>
                                            </thead>
                                            <tbody>";
                                  $ps = new ProdutoServicos();
                                  foreach ($ps->listarProdutosAdicionados($value->ser_id) as $key => $value1) {
                                    $html .="<tr>
                                        <td style='font-size:30px;color:#000000'> $value1->pro_nome </td>
                                        <td style='font-size:30px;color:#000000'> $value1->prs_qtd </td>
                                        <td style='font-size:30px;color:#000000'> $value1->prs_valor_total </td>
                                    </tr>";
                                    }
                                $html .="</tbody>
                                      </table>
                                  </div>
                              </div>

                                  <p style='font-size:30px;color:#000000'>ID : <strong>$value->ser_id</strong></p>
                                  <p style='font-size:30px;color:#000000'>Mecânico : <strong>$value->col_nome</strong></p>
                                  <p style='font-size:30px;color:#000000'>Data : <strong>";

                                    $date = date_format(date_create($value->ser_data),"d/m/Y");

                                   $html .="$date</strong></p>

                                  <p style='font-size:30px;color:#000000'>Pagamento : <strong>$value->fpg_forma</strong></p>

                            </div>
                            </div>
                            <hr style='color:#000000'>
                            ";
                          }
                        $html .="</div>
                    </div>
                </div>
            </div>
        </div>
        <h2 style='text-align:center;font-size:50px;color:#000000'>Total: $total</h2>
        </body></html>";
//criar o objeto
$mpdf = new mPDF();
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = "UTF-8";
$mpdf->WriteHTML($html);
$mpdf->AutoPrint(true);
$mpdf->Output("Nota","I");

exit();
