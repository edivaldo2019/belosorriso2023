<?php 
$g_tabDentista =$_GET['dentistaAgenda'];
$usuariConn =  $_SESSION['s_usuarioConn'];
$nivelacesso = $_SESSION['s_nivelAcesso'];

if(isset($_POST['bt'])){
    $ID = mysqli_real_escape_string($conn, trim($_POST['ID']));
    $DES_DATA = mysqli_real_escape_string($conn, trim($_POST['DES_DATA']));
    if($DES_DATA ==''){$DES_DATA = date("Y-m-d");}$DES_DATA = $DES_DATA . date(' H:i:s');
    $DES_QUANT = mysqli_real_escape_string($conn, trim($_POST['DES_QUANT']));
    $DES_DESCRICAO = mysqli_real_escape_string($conn, trim($_POST['DES_DESCRICAO']));
    $DES_SUB_CATEGORIA = mysqli_real_escape_string($conn, trim($_POST['DES_SUB_CATEGORIA']));
    $DES_CATEGORIA = mysqli_real_escape_string($conn, trim($_POST['DES_CATEGORIA']));         
    $DES_VALOR = mysqli_real_escape_string($conn, trim($_POST['DES_VALOR']));
    $LOJA = mysqli_real_escape_string($conn, trim($_POST['LOJA']));
    $FIXO = mysqli_real_escape_string($conn, trim($_POST['FIXO']));
        $sql = " UPDATE `FINANCEIRO` SET
					`DES_DATA`='$DES_DATA', 
                    `DES_QUANT`='$DES_QUANT', 
                    `DES_DESCRICAO`='$DES_DESCRICAO',
                    `DES_SUB_CATEGORIA`='$DES_SUB_CATEGORIA',

                    `DES_CATEGORIA`='$DES_CATEGORIA',


                    `DES_VALOR`='$DES_VALOR',


                    `LOJA`='$LOJA'


                    WHERE ID = '$ID'";


     if ($conn->query($sql) === TRUE) {


        $last_id = $conn->insert_id;


       	echo "New record created successfully. Last inserted ID is: " . $last_id ;


        header('Location: despesasListar.php?');


    }


    else {


        echo "Error: " . $sql . "<br>" . $conn->error .'<br>';// die(mysqli_error($connfuncionario));


    } 


} 


$id = $_GET['id'];


if($id>0){ 


    $sql2 = "SELECT `ID`,`DES_DATA`, `DES_QUANT`, `DES_DESCRICAO`, `DES_SUB_CATEGORIA`, `DES_CATEGORIA`, `DES_VALOR`,`LOJA`,  `banco`, `obs` FROM   FINANCEIRO  WHERE ID = '$id'";


     $result = $conn -> query($sql2);


     if(!$result){	die(mysqli_error($conn));}


     $row = $result -> fetch_assoc();


    


}





?>


<!DOCTYPE html>


<html lang="pt-br">


<head>


    <meta charset="UTF-8">


    <meta name="viewport" content="width=device-width, initial-scale=1">


    <title><?php echo   $_SESSION['s_bd'] .'_'.  $usuariConn;?></title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" >


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" >


    <link rel="stylesheet" type="text/css" href="css/navbarSuperior.css" />


    <link rel="stylesheet" type="text/css" href="css/geral.css" />


    <script src="https://kit.fontawesome.com/c1424ea52a.js" crossorigin="anonymous"></script>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">


</head>


<body>


<body >


<div class="container-fluid">    


<div class="row">


    <!-- coluna  navbar lateral -->


    <div class="baraLateral bg-dark text-white col-md-4 col-lg-3 col-xl-3 pt-5">


            <h2 class="text-white p-2 ms-5" >MENU</h2>


            <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white min-vh-100">


                <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start" >


                     <li class="nav-item">


                        <a href="agenda.php" class="nav-link align-middle px-0">


                           <i class="fs-4  bi-cash-coin"></i><span class="ms-1 d-none d-sm-inline">AGENDA</span>


                        </a>


                    </li>


                  <li class="nav-item">


                    <a href="home.php" class="nav-link align-middle px-0">


                       <i class="fs-4  bi-cash-coin"></i><span class="ms-1 d-none d-sm-inline">PESQUISAR</span>


                    </a>


                    </li>


                    


                    <li>


                        <a href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">


                            <i class="fs-4 bi-file-earmark-plus"></i> 


                            <span class="ms-1 d-none d-sm-inline">CADASTRAR</span></a>


                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">


                            <li class="w-100">


                                <a href="pacienteCadastro.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">PACIENTE</span>


                                </a>


                            </li>


                            


                            <li>


                                <button type="button" class="nav-link px-0" data-bs-toggle="modal" data-bs-target="#staticBackdrop">


                                    DESPESAS </button>


                            </li>


                        </ul>


                    </li>


                    <li class="nav-item">


                        <a href="caixa.php" class="nav-link align-middle px-0">


                           <i class="fs-4  bi-cash-coin"></i><span class="ms-1 d-none d-sm-inline">CAIXA</span>


                        </a>


                    </li>


                   


                     <li>


                        <a href="#config" data-bs-toggle="collapse" class="nav-link px-0 align-middle ">


                            <i class="fs-4 bi-file-earmark-plus"></i> <span class="ms-1 d-none d-sm-inline">CONFIGURAÇÃO</span></a>


                        <ul class="collapse nav flex-column ms-1" id="config" data-bs-parent="#menu">


                            <li class="w-100">


                                <a href="configMeuConsultorio.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">MEU CONSULTORIO</span>


                                </a>


                            </li>


                            <li>


                                <a href="profissionaislistar.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">PROFISSIONAIS</span> 


                                </a>


                            </li>


                            <li>


                                <a href="procedimentolistar.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">PROCEDIMENTOS</span> 


                                </a>


                            </li>


                             <li>


                                <a href="despesasListar.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">LISTA DESPESAS</span> 


                                </a>


                            </li>


                             <li>


                                <a href="  https://140.238.178.252:7800/database" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">database</span> 


                                </a>


                            </li>


                            <li>


                                <a class="dropdown-item" href="https://140.238.178.252:7800/0be90058" target="_blank">AAPANEL</a>


                            </li>


                        </ul>


                    </li>


                    <li>


                        <a href="sair.php" class="nav-link px-0 align-middle">


                            <i class="fs-4 bi-people"></i> <span class="ms-1 d-none d-sm-inline">SAIR</span> </a>


                    </li>


                </ul> 


                <div class="dropdown pb-4">


                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">


                        <img src="https://github.com/mdo.png" alt="hugenerd" width="30" height="30" class="rounded-circle">


                        <span class="d-none d-sm-inline mx-1">loser</span>


                    </a>


                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">


                        <li><a class="dropdown-item" href="sair.php">SAIR</a></li>


                        <li class="w-100">


                                <a href="configMeuConsultorio.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">MEU CONSULTORIO</span>


                                </a>


                            </li>


                            <li>


                                <a href="profissionaislistar.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">PROFISSIONAIS</span> 


                                </a>


                            </li>


                            <li>


                                <a href="procedimentolistar.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">PROCEDIMENTOS</span> 


                                </a>


                            </li>


                             <li>


                                <a href="despesasListar.php" class="nav-link px-0"> 


                                    <span class="d-none d-sm-inline">despesasListar</span> 


                                </a>


                            </li>


                             <li>


                                <a href="http://140.238.178.252:888/phpmyadmin_81a4828547cd2340/index.php" 


                                    class="nav-link px-0"  target="_blank"> 


                                    <span class="d-none d-sm-inline">database</span> 


                                </a>


                            </li>


                            <li>


                                <a class="dropdown-item" href="https://140.238.178.252:7800/0be90058" target="_blank">AAPANEL</a>


                            </li>


                        <li class="nav-item">


                            <a href="despesasListar.php" class="nav-link align-middle px-0">


                                <i class="fs-4 bi-file-earmark-plus"></i><span class="ms-1 d-none d-sm-inline">despesasListar.php</span>


                            </a>


                        </li>


                       


                        <li><a class="dropdown-item" href="teste/despesas.php">teste</a></li>


                        


                        <li>


                            <hr class="dropdown-divider">


                        </li>


                        <li><a class="dropdown-item" href="#">Sign out</a></li>


                    </ul>


                </div>


            </div>


        </div>


    <!-- coluna principal -->


    <main class="col">


        <!-- navbar superior-->


        <header id="header" class="bg-dark mb-3 d-flex justify-content-between ">


            <nav class="">


                <form class=" col-12" role="search">


                    <input class="form-control" type="search" placeholder="PESQUISAR" aria-label="Search" name="pesquisa" id="pesquisa">


                </form>


            </nav>


            <nav id="nav">


                 


                <button class="text-white bg-primary" aria-label="Abrir Menu" id="btn-mobile" aria-haspopup="true" aria-controls="menu"  aria-expanded="false" >


                     Menu


                    <span id="hamburger"></span>


                </button>


                <ul id="menu" class="menu" role="menu">


                    <li class="nav-item">


                        <a href="agenda.php" class="nav-link align-middle px-0">


                           <i class="fs-4  bi-cash-coin"></i><span class="ms-1 d-none d-sm-inline">AGENDA</span>


                        </a>


                    </li>


                    <li>


                        <a  href="#submenu2" data-bs-toggle="collapse" class="nav-link px-0 align-middle dropdown-toggle ">


                            <i class="fs-4 bi-file-earmark-plus"></i> 


                            <span class="ms-1 d-noneW d-sm-inline">CADASTRAR</span>


                        </a>


                        <ul class="collapse nav flex-column ms-1" id="submenu2" data-bs-parent="#menu">


                            <li class="w-100">


                                <a href="pacienteCadastro.php" class="nav-link px-0"> 


                                    <span class="d-non d-sm-inline">PACIENTE</span>


                                </a>


                            </li>


                            <li>


                                <a href="despesas.php" class="nav-link px-0"> 


                                    <span class="d-noneE d-sm-inline">DESPESAS</span> 


                                </a>


                            </li>


                        </ul>


                    </li>


                    <li class="nav-item">


                        <a href="caixa.php" class="nav-link align-middle px-0">


                          <i class="fs-4  bi-cash-coin"></i>


                          <span class="ms-1 d-noneE d-sm-inline">CAIXA</span>


                        </a>


                    </li>


                    <li class="nav-item">


                        <a href="colaborador.php?funcionario=inserir" class="nav-link align-middle px-0">


                           <i class="fs-4  bi-cash-coin"></i><span class="ms-1  d-sm-inline">COLABORADOR</span>


                        </a>


                    </li>


                    <li>


                        <a href="sair.php" class="nav-link px-0 align-middle">


                        <i class="fs-4 bi-people"></i> 


                        <span class="ms-1 d-noneE d-sm-inline">SAIR</span> </a>


                    </li>


                </ul>


            </nav>


        </header>


        <!--  CONTEUDO PRINCIPAL------------------>


        <!--  TITULO  -->


        <nav class="bg-light d-flex justify-content-between m-3">


            <h2>  Olá <?php echo  $usuariConn;?></h2> 


            <h2>  <?php echo   $_SESSION['s_bd'];?></h2>


        </nav>


        <!------   TABELA  ----->


        <div class="form-control mx-2">


            <form method="post" action="#">         


                <hr>


            <div class="row">


                <div class="col-2">


                   <label  class="form-label "> Valor</label>


                   <input   type="hidden" name="ID" id="ID" value="<?=$row['ID']?>"  required> 


                    <input class="form-control" type="number" name="DES_VALOR" id="DES_VALOR" step="0.01" value="<?=$row['DES_VALOR'];?>" required > 


                </div>


                <div class="mb-3 col-3" >


                    <label class="form-label">DES_DATA</label>


                       <? $d = $row['DES_DATA'];$d = explode(" ", $d);list($date, $hora) = $d; ?>


                    <input class="form-control" type="date" name="DES_DATA" value="<?=$date?>" > 


                </div>


                 


            </div>


            <div class="row">


                 <div class="mb-3 col-7" >


                    <label class="form-label">Descrição</label>


                    <input type="hidden" id="id_usuario" name="id_usuario">


                    <input class="form-control" type="text" name="DES_DESCRICAO"  id="DES_DESCRICAO" 


                    value="<?=$row['DES_DESCRICAO']?> "   onkeyup="carregar_usuarios(this.value)" autocomplete="off"


                   autocomplete="off"> 


                      <span id="resultado_pesquisa"></span>


                </div> 


                <div class="col-3 d-none">


                   <label class="form-label"> quantidade</label>


                   <input class="form-control" type="number" name="DES_QUANT" id="DES_QUANT" value="<?=$row['DES_QUANT']?>"  > 


                </div>jk


            </div>


            <div class="row">


                <div class="mb-3 col-auto">


                    <label for="bairro" class="form-label">Sub Categoria</label>


                    <select name="DES_SUB_CATEGORIA" id="DES_SUB_CATEGORIA" class="form-select  mb-3" aria-label=".form-select-lg example"  >


                       <option value="<?php echo $row['DES_SUB_CATEGORIA']; ?>"><?php echo $row['DES_SUB_CATEGORIA']; ?></option>


                    <?


                        $result_niveis_acessos = "SELECT DISTINCT DES_SUB_CATEGORIA  FROM FINANCEIRO where DES_SUB_CATEGORIA!= '' and DES_DATA > '2023-02-01T 00:00:01'  ORDER BY   DES_SUB_CATEGORIA ASC";


                        $resultado_niveis_acesso = mysqli_query($conn,$result_niveis_acessos);


                        


                        while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ 


                    ?>


                            


                            <option value="<?php echo $row['DES_SUB_CATEGORIA']; ?>"><?php echo $row_niveis_acessos['DES_SUB_CATEGORIA']; ?></option> 


                    <?


                        }


                    ?>


                    </select>


                </div>


                <div class="mb-3 col-auto">


                    <label for="bairro" class="form-label">Categoria</label>


                    <select name="DES_CATEGORIA" id="DES_CATEGORIA" class="form-select  mb-3" aria-label=".form-select-lg example" >


                          <option selected value="<?php echo $row['DES_CATEGORIA']; ?>"><?php echo $row['DES_CATEGORIA']; ?></option> 


                    <?


                        $result_niveis_acessos = "SELECT DISTINCT DES_CATEGORIA  FROM FINANCEIRO where DES_CATEGORIA != '' ORDER BY DES_CATEGORIA";


                        $resultado_niveis_acesso = mysqli_query($conn,$result_niveis_acessos);


                        while($row_niveis_acessos = mysqli_fetch_assoc($resultado_niveis_acesso)){ 


                    ?>     


                            <option value="<?php echo $row_niveis_acessos['DES_CATEGORIA']; ?>"><?php echo $row_niveis_acessos['DES_CATEGORIA']; ?></option> 


                    <?


                        }


                    ?>


                    </select>


                </div>


                <div class="row ">


                   <button name="bt" class="btn  btn-primary col-auto ms-4 mb-3"  >Salvar</button>  


                    <a class="btn btn-secondary col-auto ms-2 mb-3 " href="despesasListar.php" role="button">Voltar</a>


                </div> 


            </div>    


            </form>


        </div>


    </main>   


</div> 


</div>    





<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>


<script src="js/navbarSuperior.js"></script>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script> 


<script>


async function carregar_usuarios(valor) {


    if (valor.length >= 1) {


        //console.log("Pesquisar: " + valor);


        const dados = await fetch('descricaoListar.php?nome=' + valor);


        const resposta = await dados.json();


        //console.log(resposta);


        var html = "<ul class='list-group position-fixed ' style='z-index:2000'>";


        if (resposta['erro']) {


            html += "<li class='list-group-item disabled'>" + resposta['msg'] + "</li>";


        } else {


            for (i = 0; i < resposta['dados'].length; i++) {


                html += "<li class='list-group-item list-group-item-action ' onclick='get_id_usuario(" + resposta['dados'][i].id + "," + JSON.stringify(resposta['dados'][i].nome) + ")'>" + resposta['dados'][i].nome + "</li>";


            }


        }


        html += "</ul>";


        document.getElementById('resultado_pesquisa').innerHTML = html;


    }


}


function get_id_usuario(id_usuario, nome) {


    //console.log("Id do usuario selecionado: " + id_usuario);


  


    document.getElementById("DES_DESCRICAO").value = nome;


    document.getElementById("id_usuario").value = id_usuario;


}


const fechar = document.getElementById('DES_DESCRICAO');


document.addEventListener('click', function (event) {


    const validar_clique = fechar.contains(event.target);


    if (!validar_clique) {


        document.getElementById('resultado_pesquisa').innerHTML = '';


    }


});


</script>


</body>


</html>   











