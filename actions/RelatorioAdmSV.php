<?php
require_once '../lib/RelatorioAdm.php';
require_once '../lib/Servico.php';

$s = new Servicos();
$r = new Relatorio();

$r->totalDia = $s->listarFaturamentoDoDia()->valor;
$r->totalDiaDinheiro = $s->listarFaturamentoDoDiaDinheiro()->valor;
$r->totalDiaCartao = $s->listarFaturamentoDoDiaCartao()->valor;
$r->totalMes = $s->faturamentoMensal()->faturamento;
$r->totalAno = $s->faturamentoAnual()->faturamento;
$r->numServicos = $s->numeroServicosTotal()->numero;
$r->totalRetifica = $s->faturamentoDiarioSetor(1)->faturamento;
$r->totalGeral = $s->faturamentoDiarioSetor(2)->faturamento;
$r->totalRadiador = $s->faturamentoDiarioSetor(3)->faturamento;
$r->totalBalcao = $s->faturamentoDiarioSetor(4)->faturamento;

echo json_encode($r);
?>
