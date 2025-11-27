<?php 
    require '../Classes/usuario.php';
    $usuario = new Usuario();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro Usuário</title>
</head>
<body>
    <h2>CADASTRO DE USUÁRIO</h2>
    <form method="post">
        <input type="text" name="nome" placeholder="Digite seu nome."><br><br>
        <input type="email" name="email" placeholder="Digite seu email"><br><br>
        <input type="text" name="endereco" placeholder="Digite seu enedereço."><br><br>
        <input type="text" name="cidade" placeholder="Digite a cidade onde você mora."><br><br>
        <input type="text" name="estado" placeholder="Digite o estado onde você mora."><br><br>
        <input type="tel" name="telefone" placeholder="Digite o número do seu telefone."><br><br>
        <input type="password" name="senha" placeholder="Digite sua senha."><br><br>
        <input type="password" name="Confsenha" placeholder="Confirme sua senha."><br><br>
        <input type="submit" value="CADASTRAR"><br><br>
        <p>Já é cadastrado? Clique <a href="login.php">Aqui</a> para acessar.</p>

    </form>
    <?php 
        if(isset($_POST['nome']))
        {
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $cidade = $_POST['cidade'];
            $estado = $_POST['estado'];
            $telefone = $_POST['telefone'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            $confsenha = addslashes($_POST['Confsenha']);

            //Verificar se todos os campos estão preenchidos
            if(!empty($nome) && !empty($endereco) && !empty($cidade) && !empty($estado) && !empty($telefone) && !empty($email) && !empty($senha))
            {
                $usuario->conectar("estacio2025","localhost", "root", "");
                if($usuario->msgErro == "")
                {
                    echo "conectou";
                    if($senha == $confsenha)
                    {
                        if($usuario->cadastrarUsuario($nome,$endereco,$cidade,$estado,$telefone,$email, $senha)){

                            ?>
                                <div class="msg-sucesso">
                                    <p>Usuário Cadastrado com Sucesso.</p>
                                </div>
                            <?php
                        }
                        else
                        {
                            ?>
                                <div class="msg-sucesso">
                                    <p>Usuário Já cadastrado.</p>
                                </div>
                            <?php
                        }
                    }
                    else
                    {
                        ?>
                                <div class="msg-sucesso">
                                    <p>Senha e confirmar senha não conferem</p>
                                </div>
                            <?php
                    }
                }
                else
                {
                    ?>
                                <div class="msg-sucesso">
                                    <?php echo "Erro: ".$usuario->msgErro; ?>
                                </div>
                            <?php
                }
            }
        }

    ?>
    
</body>
</html>