<?php
    error_reporting(0);
    session_start();
    include("conexao.php");

    // include_once inclui o arquivo mencionado

    $id_cliente=filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $id_endereco=filter_input(INPUT_POST, 'id_end_cli', FILTER_SANITIZE_NUMBER_INT);
    $nome=filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $sobrenome=filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $email=filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $ddd=filter_input(INPUT_POST, 'ddd', FILTER_SANITIZE_NUMBER_INT);
    $telefone=filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $cpf=(filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING));
    $cep=(filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_STRING));
    $logradouro=(filter_input(INPUT_POST, 'logradouro', FILTER_SANITIZE_STRING));
    $bairro=(filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING));
    $numero=(filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT));
    $cidade=(filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING));
    $complemento=(filter_input(INPUT_POST, 'complemento', FILTER_SANITIZE_STRING));
    $uf=(filter_input(INPUT_POST, 'uf', FILTER_SANITIZE_STRING));

    // FILTER_SANITIZE limpa tags HTML

    $result_usuario="UPDATE cliente INNER JOIN login_cliente INNER JOIN endereco_cliente SET username='$email', nome='$nome', sobrenome='$sobrenome', email='$email', ddd='$ddd', telefone='$telefone', cpf='$cpf', cep='$cep', logadouro='$logradouro', cidade='$cidade', bairro='$bairro', uf='$uf', numero='$numero', complemento='$complemento' WHERE id_cliente='$id_cliente' AND id_endereco_cliente='$id_endereco' AND id_login_cliente = '$id_cliente'";
    $resultado_usuario=mysqli_query($mysqli, $result_usuario);

    if (mysqli_affected_rows($mysqli)){
        echo "<div class='mb-5' style='text-align: center'><span style='text-align: center; color: green; font-size: 1.5rem'>Usuário editado com sucesso" . "!" . "</span></div>";
        if(isset($_SESSION['adm'])){
            header("Location: painel.php");
        } else if (isset($_SESSION['fun'])){
            header("Location: painel_func.php");
        }
    } else{
        echo "<div class='mb-5' style='text-align: center'><span style='text-align: center; color: red; font-size: 1.5rem'>Usuário não foi editado." . "</span></div>";
        header("Location: painel.php");   
    }