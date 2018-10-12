<img src="../img/200.gif">
<?php

include './Conexao.php';
include './variaveisGlobais.php';

$contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);

$consulta1 = "Select * from jogadores";







$contagem = $contabilizar->contaOcorrencias($consulta1);

$idJogador = $contabilizar->listaOcorrencia($consulta1, "idJogador");




for ($l = 0; $l < $contagem; $l++) {

    $consulta2 = "SELECT *from jogadores
WHERE
idJogador='$idJogador[$l]'";


    $contagemSuspensao = $contabilizar->contaOcorrencias($consulta2);
    $statusJogador = $contabilizar->listaOcorrencia($consulta2, "statusJogador");
     $nomeJogador = $contabilizar->listaOcorrencia($consulta2, "nomeJogador");

    for ($m = 0; $m < $contagemSuspensao; $m++) {



        echo "Status : " . $statusJogador[$m] . "$nomeJogador[$m]";

        if ($statusJogador[$m] == 1) {
            echo 'atualizza';


            $consulta3 = "UPDATE jogadores SET statusJogador='0' WHERE idJogador ='$idJogador[$l]' ";


            $contabilizar->editarOcorrencia($consulta3);


            $consulta4 = "DELETE FROM time_has_torneio_has_cartoes WHERE idJogador ='$idJogador[$l]'";

            $contabilizar->editarOcorrencia($consulta4);
        }

        echo '<br />';
    }
}



echo "<br /><br /><br /><br />";


//***********************************************************
/*
 * 
 * Contagem dos cartões amarelos
 */


for ($l = 0; $l < $contagem; $l++) {

    $consulta5 = "SELECT sum(quantidadeCartoes) as amarelos from time_has_torneio_has_cartoes ththc 
INNER JOIN jogadores j 
ON
ththc.IdJogador=j.idJogador
WHERE
j.idJogador='$idJogador[$l]'
AND
ththc.idCartao=2";


    $contagemSuspensao = $contabilizar->contaOcorrencias($consulta5);
    $statusJogador = $contabilizar->listaOcorrencia($consulta5, "amarelos");

    for ($m = 0; $m < $contagemSuspensao; $m++) {



        echo "OS CARTOES : " . $statusJogador[$m] . "";

        if ($statusJogador[$m] >= 3) {
            echo 'atualizza';


            $consulta6 = "UPDATE jogadores SET statusJogador='1' WHERE idJogador ='$idJogador[$l]' ";


            $contabilizar->editarOcorrencia($consulta6);
        }

        echo '<br />';
    }
}

/*
 * 
 * fim da Contagem dos cartões amarelos.
 * 
 */

/*
 * 
 * Contagem dos cartões vermelhos
 */

for ($l = 0; $l < $contagem; $l++) {

    $consulta5 = "SELECT sum(quantidadeCartoes) as vermelhos from time_has_torneio_has_cartoes ththc 
INNER JOIN jogadores j 
ON
ththc.IdJogador=j.idJogador
WHERE
j.idJogador='$idJogador[$l]'
AND
ththc.idCartao=1";


    $contagemSuspensao = $contabilizar->contaOcorrencias($consulta5);
    $statusJogador = $contabilizar->listaOcorrencia($consulta5, "vermelhos");

    for ($m = 0; $m < $contagemSuspensao; $m++) {



        echo "OS CARTOES : " . $statusJogador[$m] . "";

        if ($statusJogador[$m] >= 1) {
            echo 'atualizza';


            $consulta6 = "UPDATE jogadores SET statusJogador='1' WHERE idJogador ='$idJogador[$l]' ";


            $contabilizar->editarOcorrencia($consulta6);
        }

        echo '<br />';
    }
}


/*
 * 
 * fim da Contagem dos cartões amarelos.
 * 
 */











header("refresh:1; url=../index.php?pagina=5");