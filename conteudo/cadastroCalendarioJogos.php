<?php
$contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$consulta = "select * from times";
$contagem = $contabilizar->contaOcorrencias($consulta);
$contagemTimes = $contagem;
$time = $contabilizar->listaOcorrencia($consulta, 'nomeTime');
$idTime = $contabilizar->listaOcorrencia($consulta, 'idTime');





$consultaTorneio = "select * from torneiros";
$contagemTorneio = $contabilizar->contaOcorrencias($consultaTorneio);
$idTorneio = $contabilizar->listaOcorrencia($consultaTorneio, 'idTorneiro');
$nomeTorneio = $contabilizar->listaOcorrencia($consultaTorneio, 'nomeTorneio');
?>


<form id="frmCalendario" name="frmCalendario" action="./servicos/cadastrarCalendario.php" method="POST">



    Selecione o torneio

    <select name="torneio">
        <option value="">Selecione o torneio</option>
        <?php
        for ($i = 0; $i < $contagemTorneio; $i++) {
            ?>
            <option value="<?php echo $idTorneio[$i]; ?>" > <?php echo $nomeTorneio[$i]; ?></option>
            <?php
        }
        ?>


    </select><br />
    Hora da partida
    <input type="time" name="hora" >

    Data da partida<input type="date" name="data" >
    Selecione primeiro time
    <select name="timeA">
        <option value="">Selecione primeiro time</option>
        <?php
        for ($i = 0; $i < $contagem; $i++) {
            ?>
            <option value="<?php echo $idTime[$i]; ?>"><?php echo $time[$i]; ?></option>
            <?php
        }
        ?>


    </select>

    Selecione segundo time
    <select name="timeB">
        <option value="">Selecione primeiro time</option>
        <?php
        for ($i = 0; $i < $contagem; $i++) {
            ?>
            <option value="<?php echo $idTime[$i]; ?>"><?php echo $time[$i]; ?></option>
            <?php
        }
        ?>


    </select><br />









    <button type="button" onclick="validaTimesCalendario('frmCalendario')">cadastrar calendario</button>

</form>


<div>
    <p>Calendário de jogos</p>
</div>

<?php
$consulta = "select t.nomeTime, tht.dataJogo, tht.horaJogo, tht.idTimeHasTorneiro, t.idTime from times t 
INNER JOIN times_has_torneios tht 
ON t.idTime=tht.idTime 
WHERE tht.idTimeHasTorneiro > 0 ORDER BY tht.idTimeHasTorneiro";
$contagem = $contabilizar->contaOcorrencias($consulta);
$dataJogo = $contabilizar->listaOcorrencia($consulta, 'dataJogo');
$horaJogo = $contabilizar->listaOcorrencia($consulta, 'horaJogo');
$nomeTime = $contabilizar->listaOcorrencia($consulta, 'nomeTime');
//$nomeTorneio = $calendarioJogos->listaOcorrencia($consulta, 'nomeTorneio');
$idJogo = $contabilizar->listaOcorrencia($consulta, 'idTimeHasTorneiro');
$idTime = $contabilizar->listaOcorrencia($consulta, 'idTime');


$consultaB = "select t.nomeTime from times t 
INNER JOIN times_has_torneios tht 
ON t.idTime=tht.idTimeB 
WHERE tht.idTimeHasTorneiro > 0
order by tht.idTimeHasTorneiro";


$nomeTimeB = $contabilizar->listaOcorrencia($consultaB, "nomeTime");

$j = 1;


for ($i = 0; $i < $contagem; $i++) {

    if ($i == 0) {
        $j = 1;
    }
    ?>

    <form method="POST" name="frmEcluirCalendario" id="frmEcluirCalendario" action="./servicos/ecluirJogo.php">
        <?php
        echo "<td><input name='idJogo' type='text' readonly='' value='$idJogo[$i]'";

        echo "<td><input name='dataJogo' type='date' readonly='' value='$dataJogo[$i]'>";

        echo "<td><input name='horaJogo' type='text' readonly='' value='$horaJogo[$i]'>";
        echo "<td><input name='nomeTime' type='text' readonly='' value='$nomeTime[$i]'>";
        echo "<td><input name='nomeTimeB' type='text' readonly='' value='$nomeTimeB[$i]'>";
        //    echo "<td><input name='idTime' type='text' readonly='' value='$idTime[$i]'>";
        //   echo "<td><input name='nomeTorneio' type='text' readonly='' value='$nomeTorneio[$i]'>";


        echo '<button>excluir jogo</button>';
        echo '   <hr />';
        ?>

    </form>
    <?php
}






if (isset($_GET['mensagem'])) {

    if ($_GET['mensagem'] == 1) {
        echo 'Jogo já cadastrado  no sistema ou time já cadastrado para esta data!';
    } elseif ($_GET['mensagem'] == 2) {
        echo 'Jogo cadastrado com sucesso!';
    }
}
?>