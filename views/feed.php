<?php 
 if(!isset($_SESSION['NOME_EQ'])){
  //header("Location:".BASE_URL."\login");
  exit();
 }

  echo  $_SESSION['NOME_EQ'];

//        echo  $_SESSION['ID'] ;
//         echo  $_SESSION['CARGO'] ;

date_default_timezone_set('America/Sao_Paulo'); // Definir o fuso horário para o Brasil

$meses = array(
    1 => 'Janeiro',
    2 => 'Fevereiro',
    3 => 'Março',
    4 => 'Abril',
    5 => 'Maio',
    6 => 'Junho',
    7 => 'Julho',
    8 => 'Agosto',
    9 => 'Setembro',
    10 => 'Outubro',
    11 => 'Novembro',
    12 => 'Dezembro'
);

$mesAtual = (int)date('m'); // Obter o número do mês atual
$anoAtual = (int)date('Y'); // Obter o ano atual

$options = '';
for ($i = 0; $i < 6; $i++) {
    $mes = $mesAtual - $i;
    $ano = $anoAtual;

    if ($mes <= 0) {
        $mes += 12;
        $ano--;
    }

    $options .= '<option value="' . $meses[$mes] .'-'. $ano. '">' . $meses[$mes] . '-' . $ano . '</option>';
}

?>

<style type="text/css">
 #tabelaResultados_1 {
  display: none;
  width: 800px;

 }
#tabelaResultado_all tr td{ 
width: 200px;
}
#tabelaResultados tr td{
  width: 200px;

}
table, th, td {
  border: 1px solid #C0C0C0;
  padding: 9px;

}
/* Estilos para el modal */
.modal {
  display: none; /* Modal oculto por defecto */
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
}

.modal-contenido {
  background-color: white;
  width: 120%;
  max-width: 1000px;
  margin: 100px auto;
  padding: 20px;
  height: 600px;
}

.cerrar-modal {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  cursor: pointer;
}

.cerrar-modal:hover {
  color: black;
}
.reload {

  font-family: Lucida Sans Unicode;
  font-size: 90px;

}
#loadingIcon{
  display: none;
}


</style>
<!-- Modal -->
<div id="miModal" class="modal">
  <div class="modal-contenido">
    <span class="cerrar-modal">&times;</span>
    <div></div>
      <div class="form-group">
        <label for="exampleInputEmail1">Colaborador:</label>
        <input type="text" class="form-control" id="id" style='width:330px' placeholder="Matricula (Ponto Mais)">
        <input type="hidden" class="form-control" id="NOME" style='width:330px' value="<?php echo  $_SESSION['NOME_EQ'] ?>">
        <input type="hidden" class="form-control" id="id_chefe" style='width:330px' value="<?php echo  $_SESSION['ID'] ?>">
        <input type="hidden" class="form-control" id="CARGO" style='width:330px' value="<?php echo  $_SESSION['CARGO'] ?>">

      </div>
    <button type="submit" class="btn btn-primary" id="btnPesquisar">Procurar</button><br><br>

    <table id="tabelaResultados_1"  >
       <thead>
             <tr>
              <th>FeedBack</th>
                 <th>Nome</th>
              </tr>
           </thead>
         <tbody>
     </tbody>
</table>   
</div>
</div>

<form method="POST" style='margin-top:50px'>
<div class="form-group">
  <label for="exampleInputEmail1">Mes:</label>
  <select name="month" class="form-control" style="width:120px" id="mes">
  <option></option>
  <?php echo $options; ?>
   </select>
</form>
  <div id="btnAbrirModal" class="btn btn-success" style="margin-top:10px">Crie um novo</div>
  <a href="feed" >&#x21bb; </a><br>
  
   <br><input type="text" id="inputPesquisar" placeholder="Nome" class="form-control" style="width:120px"> 

<input type="hidden" id="nome" value="<?php echo $_SESSION['NOME_EQ']; ?>">
<input type="hidden" id="ID_SUPERVISOR" value="<?php echo $_SESSION['ID']; ?>">
<table id="tabelaResultado_all" >
<?php if(isset($_GET['id'])){?>
  
     <thead>
           <tr style="background-color:red;color: white;">
                <th>ID</th>
                <th>Nome</th>
                <th>DATA CRIAÇÃO</th>
                <th>STATUS</th>
                <th>MES_FEEDBACK</th>

              </tr>
           </thead>
         <tbody>
     </tbody>
</table>
  <?php } ?>
   
   <br> 
   
<div id="loadingIcon">
     <i class="fas fa-spinner fa-spin"></i> Carregando...
</div>
<table id="tabelaResultados">
     <thead>
           <tr style="background-color:red;color: white;">
                <th>ID</th>
                <th>Nome</th>
                <th>FEEDBACK</th>
                <th>ASSINADO</th>
                <th>PENDENTE</th>
              </tr>
           </thead>
         <tbody>
     </tbody>
</table>
  

















