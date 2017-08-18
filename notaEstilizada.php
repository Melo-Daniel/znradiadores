<?php
session_start();

//inclui a classe conexão
require_once 'lib/Servico.php';
require_once 'lib/ProdutoServico.php';
//incluir a classe mpdf
include 'mpdf60/mpdf.php';

$servico = $_GET['id'];

$s = new Servicos();
$ps = new ProdutoServicos();
$ser = $s->listarServico($servico);
//inicia o buffer
ob_start();
//pegar o conteudo do buffer, inserir na variável e limpar a memória
$html = ob_get_clean();
//converter o conteudo para html
$html = utf8_encode($html);

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
                <h2 style='text-align:center'>ZN Radiadores</h2>
                    <div class='ibox product-detail'>
                        <div class='ibox-content'>
                            <div class='row'>
                              <div class='col-md-7'>";
                                    $s = new Servicos();
                                    $ser = $s->listarServico($servico);

                                    $html .="<h2 class='font-bold m-b-xs'>
                                        $ser->cli_nome
                                    </h2>
                                    <small>$ser->car_descricao </small>

                                    <div>
                                        <h1 class='product-main-price'>R$$ser->ser_valor</h1>
                                    </div>
                                </div>
                                <div class='col-md-5'>
                                  <div class='ibox float-e-margins'>
                                    <div class='ibox-content'>
                                        <table class='table'>
                                            <thead>
                                            <tr>
                                                <th>PRODUTO</th>
                                                <th>QTD</th>
                                                <th>VALOR</th>
                                            </tr>
                                            </thead>
                                            <tbody>";
                                  $ps = new ProdutoServicos();
                                  foreach ($ps->listarProdutosAdicionados($servico) as $key => $value) {
                                    $html .="<tr>
                                        <td> $value->pro_nome </td>
                                        <td> $value->prs_qtd </td>
                                        <td> $value->prs_valor_total </td>
                                    </tr>";
                                    }
                                $html .="</tbody>
                                      </table>
                                  </div>
                              </div>

                                  <p>ID : <strong>$servico</strong></p>
                                  <p>Mecânico : <strong>$ser->col_nome</strong></p>
                                  <p>Data : <strong>";

                                    $date = date_format(date_create($ser->ser_data),"d/m/Y");

                                   $html .="$date</strong></p>

                                  <p>Pagamento : <strong>$ser->fpg_forma</strong></p>
                                  <p>Garantia : <strong>$ser->gar_garantia meses</strong></p>


                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </body></html>";
//criar o objeto
$mpdf = new mPDF();
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = "UTF-8";
$mpdf->WriteHTML($html);
$mpdf->Output("Nota","I");

exit();
