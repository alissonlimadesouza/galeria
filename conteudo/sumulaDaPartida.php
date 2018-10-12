<?php
$contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);


$consulta = "select t.nomeTime, tht.dataJogo, tht.horaJogo, tht.idTimeHasTorneiro, t.idTime from times t 
INNER JOIN times_has_torneios tht 
ON t.idTime=tht.idTime 
WHERE tht.idTimeHasTorneiro > 0 
AND
statusLancamento = 0
ORDER BY tht.idTimeHasTorneiro";
$contagem = $contabilizar->contaOcorrencias($consulta);
$dataJogo = $contabilizar->listaOcorrencia($consulta, 'dataJogo');
$horaJogo = $contabilizar->listaOcorrencia($consulta, 'horaJogo');
$nomeTime = $contabilizar->listaOcorrencia($consulta, 'nomeTime');
//$nomeTorneio = $calendarioJogos->listaOcorrencia($consulta, 'nomeTorneio');
$idJogo = $contabilizar->listaOcorrencia($consulta, 'idTimeHasTorneiro');
$idTime = $contabilizar->listaOcorrencia($consulta, 'idTime');


$consultaB = "select tht.idTimeB, t.nomeTime from times t 
INNER JOIN times_has_torneios tht 
ON t.idTime=tht.idTimeB 
WHERE tht.idTimeHasTorneiro > 0
AND
statusLancamento = 0
order by tht.idTimeHasTorneiro";


$nomeTimeB = $contabilizar->listaOcorrencia($consultaB, "nomeTime");
$idTimeB = $contabilizar->listaOcorrencia($consultaB, "idTimeB");

$j = 1;


for ($i = 0; $i < $contagem; $i++) {

    if ($i == 0) {
        $j = 1;
    }
    ?>

    <form method="POST" name="frmEcluirCalendario" id="frmEcluirCalendario" action="./index.php?pagina=6">
        <?php
        echo "<td><input name='idJogo' type='text' readonly='' value='$idJogo[$i]'";

        echo "<td><input name='dataJogo' type='date' readonly='' value='$dataJogo[$i]'>";

        echo "<td><input name='horaJogo' type='text' readonly='' value='$horaJogo[$i]'>";
        echo "<td><input name='idTimeA' type='text' readonly='' value='$idTime[$i]'>";
        echo "<td><input name='nomeTime' type='text' readonly='' value='$nomeTime[$i]'>";
        echo "<td><input name='nomeTimeB' type='text' readonly='' value='$nomeTimeB[$i]'>";
        echo "<td><input name='idTimeB' type='text' readonly='' value='$idTimeB[$i]'>";

        //   echo "<td><input name='nomeTorneio' type='text' readonly='' value='$nomeTorneio[$i]'>";


        echo '<button>sumular partida</button>';
        echo '   <hr />';
        ?>

    </form>

    <?php
}
?>
<p>
    Jogos Sumulados
</p>
<?php

$consulta = "select t.nomeTime, tht.dataJogo, tht.horaJogo, tht.idTimeHasTorneiro, t.idTime from times t 
INNER JOIN times_has_torneios tht 
ON t.idTime=tht.idTime 
WHERE tht.idTimeHasTorneiro > 0 
AND
statusLancamento = 1
ORDER BY tht.idTimeHasTorneiro";
$jogosSumulados = $contabilizar->contaOcorrencias($consulta);


$consultaB = "select tht.idTimeB, t.nomeTime from times t 
INNER JOIN times_has_torneios tht 
ON t.idTime=tht.idTimeB 
WHERE tht.idTimeHasTorneiro > 0
AND
statusLancamento = 1
order by tht.idTimeHasTorneiro";


$contagem = $contabilizar->contaOcorrencias($consulta);
$dataJogo = $contabilizar->listaOcorrencia($consulta, 'dataJogo');
$horaJogo = $contabilizar->listaOcorrencia($consulta, 'horaJogo');
$nomeTime = $contabilizar->listaOcorrencia($consulta, 'nomeTime');
//$nomeTorneio = $calendarioJogos->listaOcorrencia($consulta, 'nomeTorneio');
$idJogo = $contabilizar->listaOcorrencia($consulta, 'idTimeHasTorneiro');
$idTime = $contabilizar->listaOcorrencia($consulta, 'idTime');

$nomeTimeB = $contabilizar->listaOcorrencia($consultaB, "nomeTime");
$idTimeB = $contabilizar->listaOcorrencia($consultaB, "idTimeB");




$j = 1;


for ($i = 0; $i < $contagem; $i++) {

    if ($i == 0) {
        $j = 1;
    }
    ?>

<form method="POST" name="frmEcluirCalendario" id="frmEcluirCalendario" action="./servicos/excluirSumula.php">
        <?php
        echo "<td><input name='idJogo' type='text' readonly='' value='$idJogo[$i]'";

        echo "<td><input name='dataJogo' type='text' readonly='' value='$dataJogo[$i]'>";

        echo "<td><input name='horaJogo' type='text' readonly='' value='$horaJogo[$i]'>";
        echo "<td><input name='idTimeA' type='text' readonly='' value='$idTime[$i]'>";
        echo "<td><input name='nomeTime' type='text' readonly='' value='$nomeTime[$i]'>";
        echo "<td><input name='nomeTimeB' type='text' readonly='' value='$nomeTimeB[$i]'>";
        echo "<td><input name='idTimeB' type='text' readonly='' value='$idTimeB[$i]'>";

        //   echo "<td><input name='nomeTorneio' type='text' readonly='' value='$nomeTorneio[$i]'>";


        echo '<button>excluir sumula</button>';
        echo '   <hr />';
        ?>

    </form>

    <?php
}
?>



