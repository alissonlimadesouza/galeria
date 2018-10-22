

<?php
$dadosBanco = new ConexaoProjeto($_local, $_senha, $_usuario, $_banco);
?>



<table style="border: 01px solid black;">
    <thead>
        <tr>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Nome do banco </td>
            <td><?php echo $nomeBanco = $dadosBanco->get_banco(); ?></td>
        </tr>
        <tr>
            <td>Nome do Usuário</td>
            <td><?php echo $usuario = $dadosBanco->get_usuario(); ?></td>
        </tr>
        <tr>
            <td>Nome do Local</td>
            <td><?php echo $local = $dadosBanco->get_local(); ?></td>
        </tr>
        <tr>
            <td>Nome do Senha</td>
            <td><?php echo $senha = $dadosBanco->get_senha()?:"vazio"; ?></td>
        </tr>
    </tbody>
</table>
