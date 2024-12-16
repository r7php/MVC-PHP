<style type="text/css">
    textarea{
        border-radius: 10px;
        border-bottom: 10px;
    }
    #tb{
        border: 1px solid black; height: 100px; width:500px;padding: 10px; display:none;
    }
    #tb2{
        margin-top: 10px; border: 1px solid black; height: 100px; width:500px;padding: 10px;display:none;
    }
    .radio-container {
  display: flex;
  justify-content: center;
  
}
.table{
    border:1px solid black;width:500px
}

.radio-container label {
  margin-right: 10px; /* Espaçamento entre os radio buttons */
}

</style>
<form method='POST'>
<div class='All-feed'>
   <center><img src='assets/img/topo2.PNG' width='800' style="border-radius: 20px;"></center>
    <div class='text-fist'>
        <h4>FORMULÁRIO DE FEEDBACK MENSAL – FULLTIME SOLUÇÕES</h4>
    </div>  
     <div class='text-second'>
            <div class='ts-1'>
              <input type='hidden' id='id' value='<?php echo $id; ?>'></input>
              <input type='hidden' id='id_sp' value='<?php echo $id_super; ?>'></input>
              <input type='hidden' id='reg' value='<?php echo $reg; ?>'></input>
                <label>Setor: <p id='dep' data-dep="<?php echo $department; ?>"><?php echo $department; ?></p></label>
            </div>
            <div class='ts-2'>
            
            <label>Mês Avaliado :<br><select class="form-control" id="MES" style="width: 90px;" required> 
                <option></option>
                <?php echo trim($options); ?>
            </select>
            </div>
     </div>   
     <div class='text-three'>
            <div class='tt-1'>
            <label>Colaborador:</label><p id='Colaborador' data-Colaborador="<?php echo $name; ?>"><?php echo $name; ?></p>
            </div>
            <div class='tt-2'>
            <label>Data/Admissão:<p id='admission_date' data-admission_date="<?php echo $admission_date; ?>"><?php echo $admission_date; ?></p></label>
            </div>
     </div>   
     <div class='text-four'>
            <div class='tf-1'>
            <label>Supervisor:<p id='team' data-team="<?php echo $team; ?>"><?php echo $team; ?></p></label>
            </div>
            <div class='tf-2'>
            <label>Data/Avaliado: <br>Não definido</label>
            </div>           
     </div>   
 
     <div class='AV-pt-1'>
            Avaliação de Produtividade:
        </div>
      <div class='AV-pt-1'>
                <textarea  class='AV-pt-1-area' id='AVALIACAO_PRODUTIVIDADE' required></textarea>
      </div>
      <div class='AV-pt-1'>
      Avaliação de Qualidade:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_QUALIDADE' required></textarea>
      </div>
      <div class='AV-pt-1'>
            Avaliação Comportamental:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_COMPORTAMENTAL' required></textarea>
      </div>

      <div class='AV-pt-1'>
      Meta / Acordo Firmados:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='META_ACORDOS_FIRMADOS' required></textarea>
      </div>

       <div class='AV-pt-1' style="margin-top:20px">
            Tipo do feedback: 
        </div>
      <div class='AV-pt-1'>
        <fieldset style="border: 1px solid black; width: 400px;margin: 10px;"> 
           <div class="radio-container">
          <label>
            <input type="radio" name="options" id="pont" value="Pontual"class="radio-button"> Pontual
          </label>
          <label>
            <input type="radio" id="est" name="options" value="Estruturado" class="radio-button"> Estruturado
          </label>
        </div>
        </fieldset> 
      </div> 


<div class='AV-pt-1'>

       <div id="tb">
           <div class="radio-container">
          <label>
            <input type="checkbox"  name="escopo" value="Qualidade"class="radio-button"> Qualidade
          </label>
          <label>
            <input type="checkbox" name="escopo" value="Comportamental" class="radio-button"> Comportamental
          </label>
          <label>
            <input type="checkbox" name="escopo" value="Produtividade" class="radio-button"> Produtividade
          </label>

        </div>
        </div> 
    </div>

<div class='AV-pt-1'>
   <div  id="tb2">
        <div class="radio-container" >
          <label>
            <input type="radio" name="perfil"  value="Reconhecimento"class="radio-button"> Reconhecimento
          </label>
          <label>
            <input type="radio" name="perfil" value="Ponto_a_melhorar" class="radio-button"> Ponto a melhorar
          </label>
        </div>
    </div> 
</div>



     <center><br><input type='submit' value='Lançar' class='btn btn-primary' id='btn'>
        <div class="alert alert-primary" role="alert" style='display:none;width:500px;margin-top:10px' id='ms1'>
         </div>  
      <center><img src='assets/img/dow2.PNG'   width='800' style='margin-top:60px;border-radius: 20px;'></center>
      
     <div class='spac'></div>     


    </div>
</div>
</form>



<script>
$(document).ready(function(){

    $("#pont").click(function(){
        $("#tb").show();
        $("#tb2").show();
    });


    $("#est").click(function(){
        $("#tb").hide();
        $("#tb2").hide();

    });


  const checkboxes = document.querySelectorAll('input[type="checkbox"]');
  checkboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function() {
      if (this.checked) {
        checkboxes.forEach(cb => {
          if (cb !== this) {
            cb.checked = false;
          }
        });
      }
    });
  });

  let btn = document.getElementById('btn')
    if(!!btn){
        btn.addEventListener('click', function(e) {
            e.preventDefault();
         

              let id = $('#id').val();              

              let escopo = $("input[name='escopo']:checked").val();
              let perfil = $("input[name='perfil']:checked").val();
              let AVALIACAO_PRODUTIVIDADE = $('#AVALIACAO_PRODUTIVIDADE').val();
              let AVALIACAO_QUALIDADE = $('#AVALIACAO_QUALIDADE').val();
              let AVALIACAO_COMPORTAMENTAL = $('#AVALIACAO_COMPORTAMENTAL').val();
              let META_ACORDOS_FIRMADOS  = $('#META_ACORDOS_FIRMADOS').val();
              let id_sp = $('#id_sp').val();
              let reg = $('#reg').val();
              let MES = $('#MES').val();
              
             let tipo = $("input[name='options']:checked").val();

             if(tipo){
             
             if(MES == ''){
                alert('Mes vazio');

              }else{

              
             if(tipo == 'Estruturado'){
                let escopo = ""
                let perfil = "";

                if(AVALIACAO_PRODUTIVIDADE == ''){
                    alert('Feedback estruturado exige todos os campos preenchidos!');
                }else if(AVALIACAO_QUALIDADE==''){
                    alert('Feedback estruturado exige todos os campos preenchidos!');
                }else if(AVALIACAO_COMPORTAMENTAL == ''){
                    alert('Feedback estruturado exige todos os campos preenchidos!');
                }else if(META_ACORDOS_FIRMADOS ==''){
                    alert('Feedback estruturado exige todos os campos preenchidos!');
                }else{
                    $.ajax({
                    url:base_url+"InserirFeed",
                    type:'POST',
                    data: {id:id,AVALIACAO_PRODUTIVIDADE:AVALIACAO_PRODUTIVIDADE,AVALIACAO_QUALIDADE:AVALIACAO_QUALIDADE,AVALIACAO_COMPORTAMENTAL:AVALIACAO_COMPORTAMENTAL,META_ACORDOS_FIRMADOS:META_ACORDOS_FIRMADOS,id_sp:id_sp,MES:MES,tipo:tipo,escopo:escopo,perfil:perfil,reg:reg},                         
                    beforeSend:function(){
                        $('#wait').show();
                    },
                    complete:function(){
                        $('#wait').hide();
                    },
                    success:function(e){      
                      $("#ms1").show();
                      $("#ms1").html(e).css('color','green');
                        },
                    });
                }
             }else if(tipo == 'Pontual'){
                

                if(escopo == ''){
                        alert('Escopo vazio!');
                        return;
                }else if(perfil==''){
                        alert('Perfil vazio!');
                        return;
                }
                else{
                    if(escopo == "Qualidade"){
                       if(AVALIACAO_QUALIDADE==''){
                            alert('AVALIACAO de QUALIDADE é obrigatório!');
                            return;



                       }
                    }else if(escopo == "Comportamental"){
                        if(AVALIACAO_COMPORTAMENTAL==''){
                            alert('AVALIAÇÂO COMPORTAMENTAL é obrigatória!');
                            return;

                        }


                     }
                     else if(escopo == "Produtividade"){
                        if(AVALIACAO_PRODUTIVIDADE==''){
                            alert('AVALIACAO de PRODUTIVIDADE é obrigatório!');
                            return;

                        }
                     }
                     
                     
                     $.ajax({
                                    url:base_url+"InserirFeed",
                                    type:'POST',
                                    data: {id:id,AVALIACAO_PRODUTIVIDADE:AVALIACAO_PRODUTIVIDADE,AVALIACAO_QUALIDADE:AVALIACAO_QUALIDADE,AVALIACAO_COMPORTAMENTAL:AVALIACAO_COMPORTAMENTAL,META_ACORDOS_FIRMADOS:META_ACORDOS_FIRMADOS,id_sp:id_sp,MES:MES,tipo:tipo,escopo:escopo,perfil:perfil,reg:reg},                         
                                    beforeSend:function(){
                                        $('#wait').show();
                                    },
                                    complete:function(){
                                        $('#wait').hide();
                                    },
                                    success:function(e){      
                                      $("#ms1").show();
                                      $("#ms1").html(e).css('color','green');
                         },
                     });
                     

                      
                    


                    
                }

            
             }

         }
             }else{
                alert('Selecione um tipo');
             }

    //      }
    //           else {
    //   // O usuário clicou em "Cancelar" ou fechou a caixa de diálogo.
    //   alert("Ação cancelada.");
    // }
            
          
             
          }, false)
        }
      });


</script>




