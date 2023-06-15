<?php
session_start();
include_once('conexao.php');
$id_fun = filter_input(INPUT_GET,'name', FILTER_SANITIZE_NUMBER_INT);
if(!empty($id_fun)){
    $sql = "DELETE FROM LOGIN_FUNCIONARIO WHERE FK_FUN_LOG = '$id_fun'";
    $mysqli->query($sql);
    $sql = "DELETE FROM ENDERECO_FUNCIONARIO WHERE FK_FUN_END = '$id_fun'";
    $mysqli->query($sql);
    $sql = "DELETE FROM FUNCIONARIO WHERE ID_FUNCIONARIO = '$id_fun'";
    $mysqli->query($sql);
    header("Location: painel.php");
}else{
    header("Location: painel.php");
}
?>