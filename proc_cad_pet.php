<?php
require('conexao.php');
$nome = filter_input(INPUT_POST,'nome',FILTER_SANITIZE_STRING);
$sexo = filter_input(INPUT_POST,'sexo',FILTER_SANITIZE_STRING);
$data = filter_input(INPUT_POST,'date',FILTER_SANITIZE_NUMBER_INT);
$cor = filter_input(INPUT_POST,'cor',FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST,'tipo',FILTER_SANITIZE_STRING);
$peso = filter_input(INPUT_POST,'peso',FILTER_SANITIZE_STRING);
$raca = filter_input(INPUT_POST,'raca',FILTER_SANITIZE_STRING);
date_default_timezone_set('America/Sao_Paulo');

// Gerar com PHP o horario atual
$horario_atual = date("H:i:s");
//var_dump($horario_atual);

// Gerar a data com PHP no formato que deve ser salvo no BD
$data = date('Y/m/d');
$data_entrada = ($data);

$insertpet = "INSERT INTO pet(ID_PET,NOME_pet,RACA,PET,SEXO,COR,PESO,DATA_NASCIMENTO_pet,FK_PET_CLI,data_cadastro) 
VALUE('', '$nome','$raca','$tipo','$sexo','$cor','$peso','$data','01',NOW())";
$resultpet = mysqli_query($mysqli,$insertpet);
var_dump($nome);
echo $data_entrada;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="cadastro_pet.php">VOLTAR</a>
</body>
</html>