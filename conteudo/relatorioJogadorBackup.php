<br ><br >
<?php
$contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
$consulta1 = "select * from times";
$contagemTimes = $contabilizar->contaOcorrencias($consulta1);
$time = $contabilizar->listaOcorrencia($consulta1, "nomeTime");
$idTime = $contabilizar->listaOcorrencia($consulta1, "idTime");
echo "Quantidade de times $contagemTimes";
for ($times = 0; $times < $contagemTimes; $times++) {
    ?>

    <p>

        <?php
        echo $time[$times];
        ?>


    </p> 
    <?php
    $consulta2 = "Select * from jogadores j
inner JOIN times_has_jogadores t_h_j
ON
j.idJogador=t_h_j.idJogador
INNER JOIN times t 
ON
t_h_j.idTime=t.idTime
WHERE
t.idTime='$idTime[$times]'";
    $contagemJogadores = $contabilizar->contaOcorrencias($consulta2);
    $nomeJogador = $contabilizar->listaOcorrencia($consulta2, 'nomeJogador');
    $idJogador = $contabilizar->listaOcorrencia($consulta2, 'idJogador');
    ?>
    <p>
        Quantidade de jogadores no clube

        <?php
        echo "$contagemJogadores";
        ?>

    </p>
    <?php
    for ($j = 0; $j < $contagemJogadores; $j++) {
        ?>
        <form method="POST" id="frmExclusaoJogadorElenco" name="frmExclusaoJogadorElenco" action="" >
            <table border="02">

                <?php
                if ($j == 0) {
                    ?>
                    <tr>
                        <td><input readonly="" name="id" type="text" value="matricula"></td>
                        <td><input readonly="" name="id" type="text" value="Nome"></td>
                        <td><input readonly="" name="id" type="text" value="cartões vermelhos"></td>
                        <td><input readonly="" name="id" type="text" value="cartões amarelos"></td>
                        <td><input readonly="" name="id" type="text" value="gols"></td>
                        <td><input readonly="" name="id" type="text" value="status"></td>
                    </tr>
                    <?php
                }
                ?>

                <tr>
                    <td><input readonly="" name="id" type="text" value="<?php echo $idJogador[$j]; ?>" ></td> 
                    <td><input readonly="" name="nome" type="text" value="<?php echo $nomeJogador[$j]; ?>" ></td> 


                    <?php
                    $consulta = "SELECT sum(quantidadeCartoes) as vermelho FROM jogadores j INNER join time_has_torneio_has_cartoes ththc ON ththc.idJogador=j.idJogador WHERE j.idJogador='$idJogador[$j]' AND ththc.idCartao=1
";
                    $contagem = $contabilizar->contaOcorrencias($consulta);
                    $vermelho = $contabilizar->listaOcorrencia($consulta, "vermelho");
                    for ($l = 0; $l < $contagem; $l++) {
                        ?>
                        <td><input readonly="" name="id" type="text" value="<?php echo $vermelho[$l]; ?>" ></td> 
                        <?php
                    }
                    
                    
                    $consulta = "SELECT sum(quantidadeCartoes) as amarelo FROM jogadores j INNER join time_has_torneio_has_cartoes ththc ON ththc.idJogador=j.idJogador WHERE j.idJogador='$idJogador[$j]' AND ththc.idCartao=2";
                    $contagem = $contabilizar->contaOcorrencias($consulta);
                    $amarelo = $contabilizar->listaOcorrencia($consulta, "amarelo");
                    for ($m = 0; $m < $contagem; $m++) {
                        ?>
                        <td><input readonly="" name="id" type="text" value="<?php echo $amarelo[$m]; ?>" ></td> 
                        <?php
                    }
                    
                    
                    
                    
                    
                    $consulta = "SELECT sum(quantidadeGol) as gol FROM jogadores j INNER join time_has_torneio_has_gols ththg ON ththg.idJogador=j.idJogador WHERE j.idJogador='$idJogador[$j]' AND ththg.idGol=1";
                    $contagem = $contabilizar->contaOcorrencias($consulta);
                    $gol = $contabilizar->listaOcorrencia($consulta, "gol");
                    for ($n = 0; $n < $contagem; $n++) {
                        ?>
                        <td><input readonly="" name="id" type="text" value="<?php echo $gol[$n]; ?>" ></td> 
                        <?php
                    }
                    
                    
                    
                    
                      
                    $consulta = "SELECT * FROM jogadores where idJogador='$idJogador[$j]'";
                    $contagem = $contabilizar->contaOcorrencias($consulta);
                    $ativoInativo = $contabilizar->listaOcorrencia($consulta, "statusJogador");
                    for ($o = 0; $o < $contagem; $o++) {
                        
                        if($ativoInativo[$o] == 0 ){
                        
                        ?>
                        
                        
                        
                        
                        <td><input style="background: green;" readonly="" name="id" type="text" value="<?php echo "Ativo"; ?>" ></td> 
                        <?php
                    }
                    elseif($ativoInativo[$o] == 1 ){
                        
                        ?>
                        
                        
                        
                        
                        <td><input style="background: red;" readonly="" name="id" type="text" value="<?php echo "Inativo"; ?>" ></td> 
                        <?php
                    }
                    
                    
                    
                    }
                    
                    
                    ?>
                </tr>
                <?php
            }
            ?>
        </table>
            <?php
        }