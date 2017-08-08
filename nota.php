<?php
session_start();

//inclui a classe conexão
require_once 'lib/Servico.php';
require_once 'lib/ProdutoServico.php';

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
        "<html>"

        . "<body>"

        . "         <h2 style='text-align:center'>ZN Radiadores</h2>"
        . "<hr>"
        . "<table border=1>"
        . "<thead>"
        . "<tr>"
        . "<th>PRODUTO</th>
        <th>QTD</th>
        <th>VALOR</th>
        </tr>"
        . "</thead>"
        . "<tbody>";
        foreach ($ps->listarProdutosAdicionados($servico) as $key => $value) {

          $html .="<tr>
                    <td>$value->pro_valor</td>
                    <td>$value->prs_qtd</td>
                    <td>$value->prs_valor_total</td>
                  </tr>";
        }
//incluir a classe mpdf
include 'mpdf60/mpdf.php';
//criar o objeto
$date = date_format(date_create($ser->ser_data),'d/m/Y');
$mpdf = new mPDF();
$html .= "</tbody></table>

        <div style='position:absolute; bottom:0; width:90%'>
        </div>
        <p>Cliente: $ser->cli_nome</p>
        <p>Mecanico: $ser->col_nome</p>
        <p>Pagamento: $ser->fpg_forma</p>
        <p>Valor: R$$ser->ser_valor</p>
        <p>Data: $date</p>
        <p>Garantia: $ser->gar_garantia meses</p>
        </body></html>";
$mpdf->allow_charset_conversion = true;
$mpdf->charset_in = "UTF-8";
$mpdf->WriteHTML($html);
$mpdf->Output("Nota","I");

exit();
