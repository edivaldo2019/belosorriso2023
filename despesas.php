<?php 


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
                    `DES_CATEGORIA`='$DES_CATEGORIA',.
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
<script>
async function carregar_usuarios(valor) {
    if (valor.length >= 1) {
        //console.log("Pesquisar: " + valor);
        const dados = await fetch('descricaoListar.php?nome=' + valor);
        const resposta = await dados.json();
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
