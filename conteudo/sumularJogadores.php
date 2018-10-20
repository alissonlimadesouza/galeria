<?php
$idJogo = $_POST['idJogo'];
$idTimeA = $_POST['idTimeA'];
$idTimeB = $_POST['idTimeB'];
$contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$consulta = "SELECT *from times_has_jogadores thj
inner JOIN times t
ON
thj.idTime=t.idTime
inner JOIN jogadores j 
ON
thj.idJogador=j.idJogador
WHERE
t.idTime ='$idTimeA'";
$consultaTimeA = "select * from times where idTime='$idTimeA'";
$contagem = $contabilizar->contaOcorrencias($consulta);
$nomeJogadorA = $contabilizar->listaOcorrencia($consulta, "nomeJogador");
$idJogadorA = $contabilizar->listaOcorrencia($consulta, "idJogador");
$nomeTimeA = $contabilizar->listaOcorrencia($consultaTimeA, "nomeTime");
$contador = 1;
?>
<form name="frmSumulaJogador" id="frmSumulaJogador" method="POST" action="./servicos/sumular.php">
    <input type="hidden"  name="idTimeA" value="<?php echo $idTimeA; ?>" >
    <input type="hidden"  name="idTimeB" value="<?php echo $idTimeB; ?>" >
    <table border="1">
        <?php
        for ($i = 0; $i < $contagem; $i++) {

            if ($i == 0) {
                ?>

                <td >
                <td colspan="4">id jogo<input type="text"  name="idJogo" value="<?php echo $idJogo; ?>" >
                </td>
                </tr>


                <tr>
                    <td colspan="4"><input type="text"  name="timeA" value="<?php echo $nomeTimeA[$i]; ?>" >
                    </td>
                </tr>

                <?php
            }
            $ativoInativo = $contabilizar->listaOcorrencia($consulta, "statusJogador");
            ?>
            <tr>
                <?php
                if ($ativoInativo[$i] == 1) {
                    ?>
                    <td style="background-color: red;">
                        inativo
                    </td>

                    <td>
                        <input type="text" name="idJogador[]" value="<?php echo $idJogadorA[$i]; ?>" >
                    </td>

                    <td>
                        <input  type="text" name="nomeJogador[]" value="<?php echo $nomeJogadorA[$i]; ?>" >
                    </td>
                    <td>
                        cartões amarelo<select disabled="" name="amarelos[]" onmouseout="validaCartoes()">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select></td>
                    <td>
                        cartões vermelhos<select disabled="" name="vermelhos[]">
                            <option value="0">0</option>
                            <option value="1">1</option>


                        </select>
                    </td>
                    <td>


                        quantidade de gols
                        <select disabled="" name="gols[]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>



                    </td>




                    <?php
                } elseif ($ativoInativo[$i] == 0) {
                    ?>
                    <td style="background-color: green;">
                        ativo
                    </td>

                    <td>
                        <input type="text" name="idJogador[]" value="<?php echo $idJogadorA[$i]; ?>"
                    </td>

                    <td>
                        <input type="text" name="nomeJogador[]" value="<?php echo $nomeJogadorA[$i]; ?>"
                    </td>
                    <td>
                        cartões amarelo<select name="amarelos[]" onmouseout="validaCartoes()">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select></td>
                    <td>
                        cartões vermelhos<select name="vermelhos[]">
                            <option value="0">0</option>
                            <option value="1">1</option>


                        </select>
                    </td>
                    <td>


                        quantidade de gols
                        <select name="gols[]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>



                    </td>


                    <?php
                }
                ?>
            </tr>
            <input type="hidden" name="cont" value="<?php echo $contador++; ?>" >

            <?php
        }
        ?>


    </table>


    <?php
    echo '<br />';
    echo '<br />';
    echo '<br />';
    $consulta = "SELECT * from times_has_jogadores thj
inner JOIN times t
ON
thj.idTime=t.idTime
inner JOIN jogadores j 
ON
thj.idJogador=j.idJogador
WHERE
t.idTime ='$idTimeB'";
    $contagem = $contabilizar->contaOcorrencias($consulta);
    $nomeJogadorB = $contabilizar->listaOcorrencia($consulta, "nomeJogador");
    $consultaTimeB = "select * from times where idTime='$idTimeB'";
    $nomeTimeB = $contabilizar->listaOcorrencia($consultaTimeB, "nomeTime");
    $idJogadorB = $contabilizar->listaOcorrencia($consulta, "idJogador");
    ?>
    <?php
    echo '<br />';
    ?>
    <table  border="2">
        <?php
        $contador = 1;

        for ($i = 0; $i < $contagem; $i++) {

            if ($i == 0) {
                ?>

                <tr>
                    <td colspan="4"><input type="text"  name="timeB" value="<?php echo $nomeTimeB[$i]; ?>" >
                    </td>
                </tr>

                <?php
            }


            $ativoInativo = $contabilizar->listaOcorrencia($consulta, "statusJogador");
            ?>
            <tr>
                <?php
                if ($ativoInativo[$i] == 1) {
                    ?>
                    <td style="background-color: red;">
                        inativo
                    </td>
                    <td >
                        <input type="text" name="idJogadorB[]" value="<?php echo $idJogadorB[$i]; ?>"
                    </td>

                    <td>
                        <input type="text" name="nomeJogadorB[]" value="<?php echo $nomeJogadorB[$i]; ?>"

                    </td>
                    <td>
                        cartões amarelo<select disabled="" name="amarelosB[]" onmouseout="validaCartoes()">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select></td>
                    <td>
                        cartões vermelhos<select  disabled="" name="vermelhosB[]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </td>
                    <td>
                        quantidade de gols<select  disabled="" name="golsB[]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>



                    <?php
                } elseif ($ativoInativo[$i] == 0) {
                    ?>
                    <td style="background-color: green;">
                        ativo
                    </td>

                    <td >
                        <input type="text" name="idJogadorB[]" value="<?php echo $idJogadorB[$i]; ?>" >
                    </td>

                    <td>
                        <input type="text" name="nomeJogadorB[]" value="<?php echo $nomeJogadorB[$i]; ?>" >

                    </td>
                    <td>
                        cartões amarelo<select name="amarelosB[]" onmouseout="validaCartoes()">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>

                        </select></td>
                    <td>
                        cartões vermelhos<select name="vermelhosB[]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                        </select>
                    </td>
                    <td>
                        quantidade de gols<select name="golsB[]">
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </td>



                    <?php
                }
                ?> 

            </tr>
            <input type="hidden" name="contB" value="<?php echo $contador++; ?>" >

            <?php
        }
        ?>
        <tr>
            <td colspan="4"> <button >sumular</button></td>
        </tr>
    </table>
</form>

<?php




