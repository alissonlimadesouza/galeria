<img src="../img/200.gif">
<?php
$idTimeA = $_GET['idTimeA'];
$idTimeB = $_GET['idTimeB'];


include './Conexao.php';

function verificaSuspensao($idTime) {

    include './variaveisGlobais.php';

    $contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);

    $consulta1 = "Select * from jogadores";



    $contagem = $contabilizar->contaOcorrencias($consulta1);

    $idJogador = $contabilizar->listaOcorrencia($consulta1, "idJogador");




    for ($l = 0; $l < $contagem; $l++) {

        $consulta2 = "Select * from  times_has_jogadores thj
INNER JOIN jogadores j 
ON
thj.idJogador=j.idJogador
INNER JOIN times t 
ON
t.idTime=thj.idTime
WHERE
j.idJogador='$idJogador[$l]'
AND
t.idTime='$idTime'";


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
}

verificaSuspensao($idTimeA);
verificaSuspensao($idTimeB);

echo "<br /><br /><br /><br />";

//***********************************************************
/*
 * 
 * Contagem dos cartões amarelos
 */


function verificaAmarelos($idTime) {
    include './variaveisGlobais.php';

    $contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);

    $consulta1 = "Select * from jogadores";



    $contagem = $contabilizar->contaOcorrencias($consulta1);

    $idJogador = $contabilizar->listaOcorrencia($consulta1, "idJogador");


    for ($l = 0; $l < $contagem; $l++) {

        $consulta5 = "SELECT sum(ththc.quantidadeCartoes) as amarelos FROM time_has_torneio_has_cartoes ththc
inner JOIN jogadores j 
ON
j.idJogador=ththc.IdJogador
inner JOIN times_has_jogadores thj  
ON
thj.idJogador=j.idJogador
INNER JOIN times t 
ON
t.idTime=thj.idTime
WHERE
ththc.idCartao=2
AND
j.idJogador='$idJogador[$l]'
AND
t.idTime='$idTime'";


        $contagemSuspensao = $contabilizar->contaOcorrencias($consulta5);
        $statusJogador = $contabilizar->listaOcorrencia($consulta5, "amarelos");

        for ($m = 0; $m < $contagemSuspensao; $m++) {



            echo "OS CARTOES amarelos : " . $statusJogador[$m] . "";

            if ($statusJogador[$m] >= 3) {
                echo 'atualizza';


                $consulta6 = "UPDATE jogadores SET statusJogador='1' WHERE idJogador ='$idJogador[$l]' ";


                $contabilizar->editarOcorrencia($consulta6);
            }

            echo '<br />';
        }
    }
}

verificaAmarelos($idTimeA);
verificaAmarelos($idTimeB);




/*
 * 
 * fim da Contagem dos cartões amarelos.
 * 
 */

/*
 * 
 * Contagem dos cartões vermelhos
 */

function verificaVermelhos($idTime) {
    include './variaveisGlobais.php';

    $contabilizar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);

    $consulta1 = "Select * from jogadores";



    $contagem = $contabilizar->contaOcorrencias($consulta1);

    $idJogador = $contabilizar->listaOcorrencia($consulta1, "idJogador");


    for ($l = 0; $l < $contagem; $l++) {

        $consulta5 = "SELECT sum(ththc.quantidadeCartoes) as vermelhos FROM time_has_torneio_has_cartoes ththc
inner JOIN jogadores j 
ON
j.idJogador=ththc.IdJogador
inner JOIN times_has_jogadores thj  
ON
thj.idJogador=j.idJogador
INNER JOIN times t 
ON
t.idTime=thj.idTime
WHERE
ththc.idCartao=1
AND
j.idJogador='$idJogador[$l]'
AND
t.idTime='$idTime'";


        $contagemSuspensao = $contabilizar->contaOcorrencias($consulta5);
        $statusJogador = $contabilizar->listaOcorrencia($consulta5, "vermelhos");

        for ($m = 0; $m < $contagemSuspensao; $m++) {



            echo "OS CARTOES vermelhos : " . $statusJogador[$m] . "";

            if ($statusJogador[$m] >= 1) {
                echo 'atualizza';


                $consulta6 = "UPDATE jogadores SET statusJogador='1' WHERE idJogador ='$idJogador[$l]' ";


                $contabilizar->editarOcorrencia($consulta6);
            }

            echo '<br />';
        }
    }
}

verificaVermelhos($idTimeA);
verificaVermelhos($idTimeB);
/*
 * 
 * fim da Contagem dos cartões amarelos.
 * 
 */











header("refresh:1; url=../index.php?pagina=5");