<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="css/perfil_cli_dados.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="icon" href="img/icons/logo.png" type="Image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    
    <title>Perfil</title>
</head>
<body>
    <!-- navbar -->

    <nav id="nav" class="navbar navbar-expand-lg sticky-top" style="background-color: #518CD7;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img src="img/icons/logo.png" style="width: 15vh; height: 15vh; margin-bottom: -25px; margin-top: -25px;" alt="logo da petquery"></a>
            <span><img src="img/cadeado.png" class="me-5" alt="icone de cadeado" style="width: 5vh;"></span>
        </div>
    </nav>

    <?php 
    session_start();
    include_once('conexao.php');
    if(isset($_SESSION['id']) == false){
        header("Location: login.php");
    }else{
        $id = $_SESSION['id'];
        $tabela = $_SESSION['tabela'];
        $resultado_cli = mysqli_query($mysqli,"SELECT * FROM $tabela WHERE ID_CLIENTE = '$id'");
        while ($row = mysqli_fetch_assoc($resultado_cli)){
            $nome = $row['NOME'];
            $sobrenome = $row['SOBRENOME'];
            $cpf = $row['CPF'];
            $email = $row['EMAIL'];
            $ddd = $row['DDD'];
            $telefone = $row['TELEFONE'];
            $data = $row['DATA_NASCIMENTO'];
        }
        $_SESSION['nome_perfil'] = $nome;
    }
    ?>

    <div class="w3-sidebar w3-bar-block w3-collapse w3-card w3-animate-left" style="width:200px;" id="mySidebar">
        <button class="w3-bar-item w3-button w3-large w3-hide-large" onclick="w3_close()">Fechar &times;</button>
        <label for="nome_cliente" class="mt-3 ms-3 mb-3" style="color: #000000; font-weight: 700; font-size: 20px">Olá, <?php echo $nome ?></label>
        <a href="perfil_cli.php" class="w3-bar-item w3-button">
            <label for="dados" style="color: #000000; font-weight: 600;">Dados</label><br>
            <label for="dados" style="color: #808080; font-weight: 500;">Meus dados</label>
        </a>
        <a href="perfil_cli_end.php" class="w3-bar-item w3-button">
            <label for="end" style="color: #000000; font-weight: 600;">Endereços</label><br>
            <label for="end" style="color: #808080; font-weight: 500;">Meus endereços</label>
        </a>
        <a href="perfil_cli_seg.php" class="w3-bar-item w3-button">
            <label for="seguranca" style="color: #000000; font-weight: 600;">Segurança</label><br>
            <label for="seguranca" style="color: #808080; font-weight: 500;">Altere sua senha</label>
        </a>
        <a href="#" class="w3-bar-item w3-button">
            <label for="pets" style="color: #000000; font-weight: 600;">Pets</label><br>
            <label for="pets" style="color: #808080; font-weight: 500;">Meus pets cadastrados</label>
        </a>
      </div>
      
      <div class="w3-main" style="margin-left:200px">
      <div class="nav-item">
        <button class="w3-button burguer-teal w3-xlarge w3-hide-large" style="color: #fff ; background-color: #A7C8F2;" onclick="w3_open()">&#9776;</button>
        <div class="w3-container">
          <h1>Meus dados</h1>
        </div>
      </div>
      
      <div class="w3-container">
        <p style="color: #808080; font-weight: 500;">Mantenha seus dados sempre atualizados para ter uma melhor experiência com a PetQuery</p>

        <form action="proc_atualizar_dados.php" method="POST">

            <div class="row">
                <div class="col mb-2" id="colname">
                    <label class="placeholder" style="font-weight: 600">Nome:</label>
                    <input type="text" class="form-control" required="required" style="width: 300px;" name="nome" value="<?php echo $nome; ?>">
                </div>
                <div class="col mb-2" style="margin-right: 60%;">
                    <label class="placeholder" style="font-weight: 600">Sobrenome:</label>
                    <input type="text" class="form-control" required="required" style="width: 300px;" name="sobrenome" value="<?php echo $sobrenome; ?>">
                </div>
            </div><br>
    
            <div class="row">
                <div class="col mb-2">
                    <label class="placeholder" style="font-weight: 600">E-mail:</label>
                    <input type="text" class="form-control" required="required" style="width: 300px;" name="email" value="<?php echo $email; ?>">
                </div>
                <div class="col mb-2" style="margin-right: 60%";>
                    <label class="placeholder" style="font-weight: 600">Telefone: </label>
                    <div class="row">
                        <div class="col-md-3 mb-2">
                            <input type="number" class="form-control" required="required" maxlength="2" style="width: 70px;" name="ddd" value="<?php echo $ddd ?>">
                        </div>
                        <div class="col-md-9">
                            <input type="text" class="form-control" required="required" style="width: 150px;" name="telefone" value="<?php echo $telefone?>">
                        </div>
                    </div>
                </div>
            </div><br>
    
            <div class="row">
                <div class="col mb-2">
                    <label class="placeholder"  style="font-weight: 600">CPF:</label>
                    <input type="text" class="form-control" required="required" maxlength="11" style="width: 300px;" name="cpf" value="<?php echo $cpf ?>">
                    <?php if(isset($_SESSION['msgcpf'])){ echo $_SESSION['msgcpf']; unset($_SESSION['msgcpf']); } ?>
                </div>
                <div class="col mb-2" style="margin-right: 60%;">
                    <label class="placeholder" style="font-weight: 600">Data de nascimento: </label>
                    <input type="date" class="form-control" required="required" onkeydown="return false" max="<?php echo date('Y-m-d'); ?>" style="width: 300px;" name="data_nascimento" value="<?php echo $data ?>">
                    
                </div>
            </div><br>
    
            <div>
            <button type="submit" class="btn btn-primary mb-3"id="criar">Editar informações</button>
            </div>
          </div>
        </form>

         
      
      </div>
      
      <script>
      function w3_open() {
        document.getElementById("mySidebar").style.display = "block";
      }
      
      function w3_close() {
        document.getElementById("mySidebar").style.display = "none";
      }
      </script>

    
        <!--<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%; margin-left: 15%">
            <h3 class="w3-bar-item">Minha Conta</h3>
            <a href="dados_cli.php">
                <label for="dados" style="color: #000000; font-weight: 600; font-size: 20px">Ola, fulano</label><br>
                <label for="dados" style="color: #808080; font-weight: 500; font-size: 20px">Meus dados</label>
            </a>
            <hr>
            <a href="end_cadastrado.php">
                <label for="endereco" style="color: #000000; font-weight: 600; font-size: 20px">Endereços</label><br>
                <label for="endereco" style="color: #808080; font-weight: 500; font-size: 20px">Meus endereços</label>
            </a>
            <hr>
            <a href="seguranca.php">
                <label for="seguranca" style="color: #000000; font-weight: 600; font-size: 20px">Segurança</label><br>
                <label for="seguranca" style="color: #808080; font-weight: 500; font-size: 20px">Altere sua senha</label>
            </a>
            <hr>
            <a href="pets_cadastrados.php">
                <label for="pets" style="color: #000000; font-weight: 600; font-size: 20px">Pets</label><br>
                <label for="pets" style="color: #808080; font-weight: 500; font-size: 20px">Meus pets cadastrados</label>
            </a>
            <div style="margin-left:25%">
            
            <div class="w3-container w3-teal">
             <h1 style="margin-top: -25%; margin-left: 25%">Minha Conta</h1>
             <img src="img/icons/usuario.png" alt="Car" style="width:200px; margin-top: 1%; margin-left: 25%; border-radius: 150px">
            </div>
            
            
            
            
            
            </div>
          </div> -->
          
          <!-- Page Content -->
    </div>
</body>
</html>