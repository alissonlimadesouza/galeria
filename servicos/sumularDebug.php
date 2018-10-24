<img src="../img/200.gif"> 
    <?php
include './contabilizarCartoesAmarelos.php';
include './contabilizarCartoesVermelhos.php';


$sumular = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
date_default_timezone_set('America/Sao_Paulo');
$dataAtual = date("Y-m-d");
$horaAtual = date("H:i:s");
$br = "<br />";
echo "id do jogo" . $idJogo = $_POST['idJogo'] . $br;
echo "Nome do time : " . $timeA = $_POST['timeA'] . $br;
$idJogadorA = $_POST['idJogador'];
$nomeJogadorA = $_POST['nomeJogador'];
$amarelosA = $_POST['amarelos'];
$vermelhosA = $_POST['vermelhos'];
$golsA = $_POST['gols'];

$idTimeA = $_POST['idTimeA'];
$idTimeB = $_POST['idTimeB'];


echo "quantidade de jogadores : " . $contagemA = count($idJogadorA) . $br; // Aqui apresenta a quantidade de jogadores.






/*
 * Programação para inserir os cartões amarelos do time A
 * 
 * 
 */



for ($j = 0; $j < $contagemA; $j++) {



  

if ($amarelosA[$j] == 1) {
       


        echo "Alguém levou 1 e foi $nomeJogadorA[$j] <br />";


        $consulta = "INSERT INTO time_has_torneio_has_cartoes VALUES ('','$idJogo','2','$idJogadorA[$j]','1');";
        $sumular->salvaOcorrencia($consulta);
    } elseif ($amarelosA[$j] == 2) {

        echo "Alguém levou 2 e foi $nomeJogadorA[$j] <br />";


        $consulta = "INSERT INTO time_has_torneio_has_cartoes VALUES ('','$idJogo','2','$idJogadorA[$j]','2');";
        $sumular->salvaOcorrencia($consulta);
    }
}

/*
 * Fim da pogramação para inserir os cartões amarelos do time A
 * 
 */


/*
 * Programação para salvar os cartões vermelhos
 * 
 */

for ($l = 0; $l < $contagemA; $l++) {

    if ($vermelhosA[$l] == 1) {
        $consulta = "INSERT INTO time_has_torneio_has_cartoes VALUES ('','$idJogo','1','$idJogadorA[$l]','1');";
        $sumular->salvaOcorrencia($consulta);
    }
}

/*
 * Fim da programação para salvar os cartões vermelhos.
 * 
 */


/*
 * Programação para salvar os gols
 * 
 */


for ($m = 0; $m < $contagemA; $m++) {

    if ($golsA[$m] > 0) {


        $consulta = "INSERT INTO time_has_torneio_has_gols VALUES ('','$idJogo','1','$idJogadorA[$m]','$golsA[$m]')";
        $sumular->salvaOcorrencia($consulta);
    }
}

/*
 * Fim da programação para salvar os gols.
 * 
 */

//#############################################################################################################
/*
 * ABAIXO SEGUE A PROGRAMAÇÃO PARA O TIME B
 * 
 * 
 * 
 * **************************************************************************************************************
 * ############################################################################################################
 */


$timeB = $_POST['timeB'];
$idJogadorB = $_POST['idJogadorB'];
$nomeJogadorB = $_POST['nomeJogadorB'];
$amarelosB = $_POST['amarelosB'];
$vermelhosB = $_POST['vermelhosB'];
$golsB = $_POST['golsB'];

echo "quantidade de jogadores : " . $contagemB = count($idJogadorB) . $br; // Aqui apresenta a quantidade de jogadores do time B.


/*
 * Programação para inserir os cartões amarelos do time B
 * 
 * 
 */



for ($n = 0; $n < $contagemB; $n++) {

    echo "amarelo quantidade : " . $amarelosB[$n] . $nomeJogadorB[$n] . $br;


    if ($amarelosB[$n] == 1) {
        //     echo "Esse é do jogador ".$nomeJogadorA[$j];


        echo "Alguém levou 1 e foi $nomeJogadorB[$n] <br />";


        $consulta = "INSERT INTO time_has_torneio_has_cartoes VALUES ('','$idJogo','2','$idJogadorB[$n]','1');";
        $sumular->salvaOcorrencia($consulta);
    } elseif ($amarelosB[$n] == 2) {

        echo "Alguém levou 1 e foi $nomeJogadorB[$n] <br />";


        $consulta = "INSERT INTO time_has_torneio_has_cartoes VALUES ('','$idJogo','2','$idJogadorB[$n]','2');";
        $sumular->salvaOcorrencia($consulta);
    }
}

/*
 * Fim da pogramação para inserir os cartões amarelos do time B
 * 
 */
/*
 * Programação para salvar os cartões vermelhos time B
 * 
 */

for ($o = 0; $o < $contagemB; $o++) {

    if ($vermelhosB[$o] == 1) {
        $consulta = "INSERT INTO time_has_torneio_has_cartoes VALUES ('','$idJogo','1','$idJogadorB[$o]','1');";
        $sumular->salvaOcorrencia($consulta);
    }
}

/*
 * Fim da programação para salvar os cartões vermelhos time B.
 * 
 */



/*
 * Programação para salvar os gols time B
 * 
 */

for ($p = 0; $p < $contagemB; $p++) {

    if ($golsB[$p] > 0) {


        $consulta = "INSERT INTO time_has_torneio_has_gols VALUES ('','$idJogo','1','$idJogadorB[$p]','$golsB[$p]')";
        $sumular->salvaOcorrencia($consulta);
    }
}

/*
 * Fim da programação para salvar os gols time B.
 * 
 */
/*
 * 
 * Altera o status do jogo para sumulado
 */



$consulta = "UPDATE times_has_torneios SET statusLancamento='1', dataLancamento='$dataAtual', horaLancamento='$horaAtual' WHERE idTimeHasTorneiro='$idJogo'";
$sumular->editarOcorrencia($consulta);

header("refresh:1; url=../servicos/verificaStatus.php?idTimeA=$idTimeA&idTimeB=$idTimeB");
