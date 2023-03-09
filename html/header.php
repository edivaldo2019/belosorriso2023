<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
     <script src="https://kit.fontawesome.com/c1424ea52a.js" crossorigin="anonymous"></script>
    <!--             MASCARAS          -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <!--     tests        MASCARAS   teste    maisum teste   -->
   <title><?php echo   $_SESSION['s_bd'] .'_'.  $usuarioConn;?></title>
<style>
:root{
    --height-header:  3.5rem;
    --heidht-conteudo-desconto: 4.5rem;
    --height-footer:  1rem;
    --width-menu: 11rem;
    --color-dark1: #131313;
    --color-dark2: #272727;
    --color-dark-hover: #373737 ;
    --color-barraLaterals: #131313;
    --color-white : #fff;
    --color-bg :    #e2e3e9;
    --color-bg-submenu: #272727;
    --color-blue: blue;
}

*{
    padding: 0;
    margin:0;
    box-sizing: border-box;
}
body{
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    background: var(--bg);
    font-size: 1.2rem;
}
input,select{
        font-size: 1rem;
        background-color: white;
        display:block;
        border-radius: 4px;
        border: 1px solid #ccc;
        height: 2.5rem;
        margin-top: 0.5rem;
        margin-left: 1rem;
        margin-bottom: 1rem;
        padding: 0.5rem 0.5rem 0.5rem 0.5rem;
    }
a{
    text-decoration: none;
    font-weight: bold;
    color: var(--color-blue);
}
.bgCinza{
        background: var(--color-bg);
    }
.header{
    display: flex;
    align-items: center;
    justify-content: space-between;
    background-color: var(--color-dark1);
    /*padding:1.3rem;/*16 px*/
    height: var(--height-header);
}
.btn_icon_header{
    background-color: transparent;
    border:none;
    color: var(--color-white);
    padding-top:0.4rem;
}
.row{display: flex;}
    .col{ display: block; }
    .col-auto{width:98%; }
    .col-ficha{ width: 5rem;}
    .col-Nome{width: 19rem;}
    .col-quant{width:4rem;}
    .list-group{
        background-color: white;
        list-style: none;
        margin-top: -15px;
        margin-left: 15px;
    }
    .d-flex{display: flex;}
    .d-none{display:none;}
    .form-control{
        border-radius: 4px;
        border: 1px solid #ccc;
        margin-top: 0.5rem;
        margin-left: 1rem;
        margin-bottom: 1rem;
        padding: 0.5rem 0.5rem 0.5rem 0.5rem;
    }
    .form-label{
        margin-left: 1.5rem;
        margin-bottom: 3rem;
    }
    .m-2{margin:1rem;}
    .ms-1{ margin-left: 0.7rem;}
    .ms-2{ margin-left: 1.5rem;}
    .ms-3{ margin-left: 3rem;}
    .ps-2{padding-left: 1.5rem;}
    .btn{
        display: block;
        
        height: 40px;
        line-height: 40px;
        padding:0px 5px;
        border:none;
        margin:2px;
        border-radius:5px;
        text-decoration: none;
        font-size:1rem;
        font-weight: bold;
        text-align: center;
        font-family: Arial;
    }
    .btn-primary{
        background-color: blue;
        color:#fff;
    }
    .btn-secondary{
        background-color: gray;
        color:#fff;
    }
    .color-bg-yellow{background-color: yellow;}
    .color-bg-red{background-color: red;}
    .color-bg-blue{background-color: blue;}
.inputPesquisar{
    font-size: 1.2rem;
    display:block;
    border-radius: 4px;
    border: 1px solid #ccc;
    width: 13rem;
    height: 1.8rem;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 1px; 
    background-repeat: no-repeat;
    padding: 0.5rem 0.5rem 0.5rem 0.5rem;
}
.menu{
    display: block;
    position: absolute;
    list-style: none;
    gap: 0.5rem;
    z-index: 100;
    background-color: var(--color-dark1);
}
.menu a {
    display: block;
    padding: 1rem 0;
    margin-inline: 1rem;
    border-bottom: 0.0625rem solid rgba(200, 200, 200, 0.16);
}
.menu a:hover{
    background: var(--color-dark-hover);
}
.subMenuCadastrar{
    visibility: hidden;
    overflow-y: hidden;
    height: 0;
    z-index: 1;
   transition: 0.5s;
    background-color: var(--color-bg-submenu);
}
.subMenuCadastrar.active{
    height: auto;
    visibility: visible ;
    z-index: 1;
    transition: 0.5s;
}
.subMenuConfig{
    visibility: hidden;
    overflow-y: hidden;
    height: 0;
    z-index: 1;
    transition: 0.5s;
    background-color: var(--color-bg-submenu);
}
.subMenuConfig.active{
    visibility: visible ;
    overflow-y: hidden; /*overflow-y: auto;/barra de rolagem*/
    z-index: 1;
    transition: 0.5s;
    height: auto;
}
@media(max-width : 780px){
    /*display moblie é o maior*/
    .container-tablet{display:block;}
    .col-valor{width:5.3rem;}
    span{ 
        padding: 0.7rem 2rem ;
    }
    .btn_icon_header{
        display: block;
    }
    .menu{
        visibility: hidden;
        overflow-y: hidden;
        height: 0;
        top:  var(--height-header);
        left: 0;
        width: 100%;
       text-align: center;
        z-index: 1;
        transition: 0.5s;
    }
    .nav.active .menu{
        height: calc(100vh - var(--heidht-conteudo-desconto));
        visibility: visible ;
        overflow-y: auto;/*/barra de rolagem*/
        width: 100%;
    }
    .logo{
            color:var(--color-white);
            font-size:1rem ; 
            font-weight:bold;
            margin-top: 0.425rem;
            padding-left: 0.3rem;
        }
    .logoImg{
        display: none;
    }   
    .conteudo{
       display: block;
       position: absolute;
       left:0;
       height: 100%;
       width: 100%;
    }
}
@media(min-width :780px){
     /* tela leptop fica dento da mobile*/
     span{
            padding:0.2re;
        }
    .btn_icon_header{
        display: none;
    }
    .menu{
        top:  var(--height-header);
        left: 0;
        height: calc(100vh - var(--height-header));
        width: var(--width-menu);
    }
    .logo{
            color: var(--color-white);
            font-size:1.5rem ; 
            font-weight:bold;
            margin-top: 0.625rem;
            padding-left: 0.5rem;
        }
    .conteudo{
       display: block;
       position: absolute;
       left: var(--width-menu);
       height: calc(100vh - var(--height-header));
       width: calc(100vw - var(--width-menu));
    
    }
    .container-tablet{display:flex;}
    .container-laptop{
        display:block;
        width: 50vw;
    }
    .col-valor{width:6.5rem;}
}
.container {
    width: 98%;
    margin: 3px auto;
    border: solid 2px blue;
    position: relative;
    background: var(--white);
    padding: 20px;
    box-shadow: 0 7px 25px rgba(0, 0, 0, 0.9);
    border-radius: 20px;
}
table {
    width: 700px;
    height: 300px;
    overflow-x: scroll;
    overflow-y: scroll;
    display: block;
}
table , th, td{
    1px solid #ededed;
    border-collapse: collapse;
    padding:  5px 4px 5px 4px;
    margin: 1rem auto;
}
th {
    background-color: var(--color-dark1);
    color:var(--color-blue);
} 
tr:nth-child(odd) {
	background-color:#ffffff;
}
tr:nth-child(even) {
	background-color:#00BFFF;
}
tr:hover{
    background-color:black;
}
td, th {
    height: 25px;
    border: solid 1px gray;
}        
</style>
  </head>
  <body class="bgCinza">
    <header class="header">
        <div class="logo">
            Belo Sorriso
            <a href="#" class="logoImg" id="" >
                    <img src="https://github.com/mdo.png"  
                    width="30" height="30" class="rounded-circle">
            </a>
        </div>
        <input class="form-control inputPesquisar" type="search" placeholder="Pesquisar" id="inputPesquisar" name="inputPesquisar">
        <nav id="nav" class="nav">
            <button class="btn_icon_header" id="btn_icon_header">
                <svg xmlns="http://www.w3.org/2000/svg" width="46" height="46" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
            <ul class="menu">
                <br>
                <li class="">
                    <a href="agenda.php" class="">
                       <span class="">AGENDA</span>
                    </a>
                </li>
                <li class="">
                    <a href="home.php" class="">
                       <span class="">PESQUISAR</span>
                    </a>
                </li>
                <li>
                    <a>
                        <span id="btnDrobDownCadastra" class="">
                            CADASTROS 
                        </span>
                    </a>
                    <ul class="subMenuCadastrar" id="subMenuCadastrar">
                        <li class="">
                             <a href="pacienteCadastro.php" class=""> 
                                <span class="subMenu">PACIENTE</span>
                            </a>
                        </li>
                        <li>
                            <a href="pacienteCadastro.php" class=""> 
                                <span class="subMenu">Despesas</span>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="">
                    <a href="caixa.php" class="">
                       <span class="">CAIXA</span>
                    </a>
                </li>
                <li>
                    <a class=" "><span id="btnDrobDownConfig" class="">CONFIGURAÇÃO</span></a>
                    <ul class="subMenuConfig" id="subMenuConfig">
                        <li class="">
                            <a href="configMeuConsultorio.php" class=""> 
                                <span class="">MEU CONSULTORIO</span>
                            </a>
                        </li>
                        <li>
                            <a href="profissionaislistar.php" class=""> 
                                <span class="">PROFISSIONAIS</span> 
                            </a>
                        </li>
                        <li>
                            <a href="procedimentolistar.php" class=""> 
                                <span class="">PROCEDIMENTOS</span> 
                            </a>
                        </li>
                         <li>
                            <a href="despesasListar.php" class=""> 
                                <span class="">LISTA DESPESAS</span> 
                            </a>
                        </li>
                         <li>
                            <a href="  https://140.238.178.252:7800/database"  target="_blank" class=""> 
                                <span class="">database</span> 
                            </a>
                        </li>
                        <li>
                            <a class="" href="https://140.238.178.252:7800/0be90058" target="_blank">
                             <span class="">AAPANEL</span>
                             <br>
                            
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="li">
                    <a href="sair.php" class="">
                         <span class="">SAIR</span> </a>
                </li>
             </ul>
        </nav>
    </header>
    <div class="conteudo">
       
   





