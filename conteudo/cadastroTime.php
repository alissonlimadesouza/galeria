<form name="frmTimes" id="frmTimes" method="post" action="./servicos/cadastrarTime.php">
    nome do time<input type="text" name="nome">

    <button type="button" onclick="validaCamposTimes('frmTimes')">salvar</button>
</form>
<p>
    Nome dos times
</p>
<div>
    <?PHP
    $listar = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
    $listar->conectar();
    $consulta = "select * from times";
    $times = $listar->listaOcorrencia($consulta, 'nomeTime');
     $id = $listar->listaOcorrencia($consulta, 'idTime');
    $contagem = $listar->contaOcorrencias($consulta);



    for ($i = 0; $i < $contagem; $i++) {
        ?>
        <form method="post" action="./servicos/editarTime.php">
            <table>
                <tr>
                    <td><input readonly="" type="text" name="id" value="<?php echo $id[$i]; ?>"</td>
                    <td><input type="text" name="nome" value="<?php echo $times[$i]; ?>"></td>


                    <td><button>editar</button></td>
                    <td><button name="excluir" value="1">excluir</button></td>
                </tr>
            </table>
        </form>
        <?php
    }
    ?>



    <div>

        <?php
        if (isset($_GET['mensagem'])) {

            if ($_GET['mensagem'] == 1) {
                echo 'Cadastro realizado';
            } elseif ($_GET['mensagem'] == 2) {
                echo 'Cadastro não realizado';
            } elseif ($_GET['mensagem'] == 3) {
                echo 'Cadastro não realizado time já existe no sistema';
            }
        }
        ?>
    </div>

    <!--
    Edição de cadastro
    -->



</div>