<?php
$contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$consulta = "select * from times";
$contagem = $contabilizar->contaOcorrencias($consulta);
$contagemTimes = $contagem;
$time = $contabilizar->listaOcorrencia($consulta, 'nomeTime');
$idTime = $contabilizar->listaOcorrencia($consulta, 'idTime');
?>
<form name="frmElenco" id="frmElenco" method="POST" action="./servicos/elencarTime.php">
    <select name="time">
        <option value="">Selecione o time</option>
        <?php
        for ($i = 0; $i < $contagem; $i++) {
            ?>
            <option value="<?php echo $idTime[$i]; ?>"><?php echo $time[$i]; ?></option>
            <?php
        }
        ?>
    </select>
    <br />


    <?php
    $consulta = "Select * from jogadores where idJogador not in (select idJogador from times_has_jogadores)";
    $contagem = $contabilizar->contaOcorrencias($consulta);
    $jogadores = $contabilizar->listaOcorrencia($consulta, 'nomeJogador');
    $idJogadores = $contabilizar->listaOcorrencia($consulta, 'idJogador');
    ?>
    <br />

    <table border="1">

        <?php
        $codigoJogador = array();
        $contadorJogadores = 0;
        for ($i = 0; $i < $contagem; $i++) {
            ?>


            <tr><td><?php echo $jogadores[$i] . '-> matricula: ' . $idJogadores[$i]; ?></td><td>Não elencar<input checked="" name="<?php echo $idJogadores[$i]; ?>" type="radio" value="0"></td>

                <td>Elencar<input name="<?php echo $idJogadores[$i]; ?>" type="radio" value="1"></td></tr>
            <?php
            /*
             * Função para colocar todos as matriculas
             * do jogadores em um vetor.
             * 
             */

            array_push($codigoJogador, $idJogadores[$i]);




            /*
              Fim da função para colocar todos as matriculas
             * do jogadores em um vetor. 
             */




            /*
             * Inicio que coloca o vetor $codigoJogador na sessão  $_SESSION['codigoJogador']
             * para enviar para a pagina de serviços.
             * 
             */
            $_SESSION['codigoJogador'] = $codigoJogador;

            /*
             * Fim do serviço que jogar o vetor $codigoJogador na sessão  $_SESSION['codigoJogador']
             * para enviar para a pagina de serviços.
             * 
             */

            $contadorJogadores = $contadorJogadores + 1;


            $_SESSION['contadorJogadores'] = $i;
        }
        ?>
    </table>
    <br />
    <button type="button" onclick="validaCamposElenco('frmElenco');">elencar time</button>

</form>

<?php
for ($i = 0; $i < $contagemTimes; $i++) {

    echo '<br /><br /><br />Time : ' . $time[$i] . "<br />";

    $consulta = "Select * from jogadores j
inner JOIN times_has_jogadores t_h_j
ON
j.idJogador=t_h_j.idJogador
INNER JOIN times t 
ON
t_h_j.idTime=t.idTime
WHERE
t.idTime='$idTime[$i]'";
    $contagemJogadores = $contabilizar->contaOcorrencias($consulta);

    $nomeJogador = $contabilizar->listaOcorrencia($consulta, 'nomeJogador');
    $idJogador = $contabilizar->listaOcorrencia($consulta, 'idJogador');


    for ($j = 0; $j < $contagemJogadores; $j++) {
        ?>
        <form method="POST" id="frmExclusaoJogadorElenco" name="frmExclusaoJogadorElenco" action="./servicos/excluirJogadorElenco.php">

            <input readonly="" name="id" type="text" value="<?php echo $idJogador[$j] ?>">
            <input readonly="" name="nome" type="text" value="<?php echo $nomeJogador[$j] ?>">
            <button >excluir</button>
        </form>
        <br />

        <?php
    }

    echo '<br /><br />';
}
?>