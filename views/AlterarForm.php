<?PHP 
if($STATUS == "ASSINADO"){?>


<form method='POST'>
<div class='All-feed'>

   <center><img src='assets/img/topo2.PNG' width='800'></center>
   <center><u><p style="color:#A9A9A9">ID do feedback: <?php echo $id; ?></p></u></center>
    <div class='text-fist'>

        <h4>FORMULÁRIO DE FEEDBACK MENSAL – FULLTIME SOLUÇÕES</h4>
    </div>  
     <div class='text-second'>
            <div class='ts-1'>
              <input type='hidden' id='id' value='<?php echo $id; ?>'></input>
              <input type='hidden' id='nome' value='<?php echo $nome; ?>'></input>
                <label>Setor: <p id='dep' data-dep="<?php echo $dp; ?>"><?php echo $dp; ?></p></label>
            </div>
            <div class='ts-2'>
            <label>Mês Avaliado :<p id='MES' data-MES="<?php echo $MES_AVALIADO; ?>"><?php echo $MES_AVALIADO; ?></p></label>
            </div>
     </div>   
     <div class='text-three'>
            <div class='tt-1'>
            <label>Colaborador:</label><p id='Colaborador' data-Colaborador="<?php echo $COLABORADOR; ?>"><?php echo $COLABORADOR; ?></p>
            </div>
            <div class='tt-2'>
            <label>Data/Admissão:<p id='admission_date' data-admission_date="<?php echo $DATA_ADMISSAO; ?>"><?php echo $DATA_ADMISSAO; ?></p></label>
            </div>
     </div>   
     <div class='text-four'>
            <div class='tf-1'>
            <label>Supervisor:<p id='team' data-team="<?php echo $SUPERVISOR; ?>"><?php echo $SUPERVISOR?></p></label>
            </div>
            <div class='tf-2'>
            <label>Data/Avaliado: <br><?php echo $DATA_AVALIADO; ?></label>
            </div>           
     </div>   


       <div class='text-four'>
            <div class='tf-1'>
            <label>Assinado: <br><?php echo $Assinado; ?></label>
            </div>
            <div class='tf-2'>
            
            </div>           
     </div>   
     <div style="padding: 20px;"></div>
     <div class='AV-pt-1'>
            Avaliação de Produtividade:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_PRODUTIVIDADE' required><?php echo   $AVALIACAO_PRODUTIVIDADE; ?></textarea>
      </div>
      <div class='AV-pt-1'>
      Avaliação de Qualidade:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_QUALIDADE' required><?php echo   $AVALIACAO_QUALIDADE; ?></textarea>
      </div>
      <div class='AV-pt-1'>
            Avaliação Comportamental:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_COMPORTAMENTAL' required><?php echo   $AVALIACAO_COMPORTAMENTAL; ?></textarea>
      </div>

      <div class='AV-pt-1'>
      Meta / Acordo Firmados:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='META_ACORDOS_FIRMADOS' required><?php echo   $META_ACORDOS_FIRMADOS; ?></textarea>
      </div>


      <div class='AV-pt-1' style="margin-top:20px">
            Tipo do feedback: 
        </div>
      <div class='AV-pt-1'>
        <fieldset style="border: 1px solid black; width: 400px;margin: 10px;text-align: center;border: 1px solid #696969;"> 
           <div class="radio-container">
          <label>
            <?php  if($media == "Pontual"): ?>
            <input type="radio" name="options" id="pont" value="Pontual"class="radio-button" checked> Pontual
            <?php  else: ?>
          <input type="radio" name="options" id="pont" value="Pontual"class="radio-button"> Pontual
        <?php  endif; ?>

          </label>
          <label>
            <?php  if($media == "Estruturado"): ?>
            <input type="radio" id="est" name="options" value="Estruturado" class="radio-button" checked> Estruturado
            <?php  else: ?>
              <input type="radio" id="est" name="options" value="Estruturado" class="radio-button">Estruturado
              <?php  endif; ?>
          </label>
        </div>
        </fieldset> 
      </div> 
  
 <?php  if($media == "Pontual"):?>
   <div class='AV-pt-1'>
        <fieldset style="border: 1px solid black; width: 400px; height: 100px;text-align: center;border: 1px solid #696969   ;"> 

       <div class="radio-container"style="margin-top:30px;padding:10px">
          <label>
            <?php if($escopo == "Qualidade"): ?>
            <input type="checkbox"  name="escopo" value="Qualidade"class="radio-button" checked> Qualidade
          <?php else: ?>
            <input type="checkbox"  name="escopo" value="Qualidade"class="radio-button"> Qualidade
          <?php endif; ?>
          </label>
          <label>
            <?php if($escopo == "Comportamental"): ?>
            <input type="checkbox" name="escopo" value="Comportamental" class="radio-button" checked> Comportamental
            <?php else: ?>
              <input type="checkbox" name="escopo" value="Comportamental" class="radio-button"> Comportamental
              <?php endif; ?>
          </label>
          <label>
            <?php if($escopo == "Produtividade"): ?>
            <input type="checkbox" name="escopo" value="Produtividade" class="radio-button" checked> Produtividade
            <?php else: ?>
              <input type="checkbox" name="escopo" value="Produtividade" class="radio-button"> Produtividade
              <?php endif; ?>
          </label>
        </div>
    </fieldset>
  </div>

 <div class='AV-pt-1' style="margin-top: 5px;">
    <fieldset style="border: 1px solid black; width: 400px;height: 100px; text-align: center; border: 1px solid #696969  ;"> 


        <div class="radio-container"  style="margin-top:30px">

          <label>
              <?php if($perfil == "Reconhecimento"): ?>
              <input type="radio" name="perfil"  value="Reconhecimento"class="radio-button" checked> Reconhecimento
            <?php else: ?>
              <input type="radio" name="perfil"  value="Reconhecimento"class="radio-button"> Reconhecimento
              <?php endif; ?>
          </label>
          <label>
            <?php if($perfil == "Ponto_a_melhorar"): ?>
              <input type="radio" name="perfil" value="Ponto_a_melhorar" class="radio-button" checked> Ponto a melhorar
            <?php else: ?>
              <input type="radio" name="perfil" value="Ponto_a_melhorar" class="radio-button"> Ponto a melhorar
              <?php endif; ?>
          </label>
        </div>
    </div> 
</fieldset>
<?php endif; ?>


        <center><img src='assets/img/dow2.PNG'  width='800' style='margin-top:60px'></center>
      
     <div class='spac'></div>     

</div>
</form>

<?php 
}else{
?>

<form method='POST'>
<div class='All-feed'>

   <center><img src='assets/img/topo2.PNG' width='800'></center>
   <center><u><p style="color:#A9A9A9">ID do feedback: <?php echo $id; ?></p></u></center>
      <input type='hidden' id='nome' value='<?php echo $nome; ?>'></input>
    <div class='text-fist'>
        <h4>FORMULÁRIO DE FEEDBACK MENSAL – FULLTIME SOLUÇÕES</h4>
    </div>  
     <div class='text-second'>
            <div class='ts-1'>
              <input type='hidden' id='id' value='<?php echo $id; ?>'></input>
                <label>Setor: <p id='dep' data-dep="<?php echo $dp; ?>"><?php echo $dp; ?></p></label>
            </div>
            <div class='ts-2'>
            <label>Mês Avaliado :<p id='MES' data-MES="<?php echo $MES_AVALIADO; ?>"><?php echo $MES_AVALIADO; ?></p></label>
            </div>
     </div>   
     <div class='text-three'>
            <div class='tt-1'>
            <label>Colaborador:</label><p id='Colaborador' data-Colaborador="<?php echo $COLABORADOR; ?>"><?php echo $COLABORADOR; ?></p>
            </div>
            <div class='tt-2'>
            <label>Data/Admissão:<p id='admission_date' data-admission_date="<?php echo $DATA_ADMISSAO; ?>"><?php echo $DATA_ADMISSAO; ?></p></label>
            </div>
     </div>   
     <div class='text-four'>
            <div class='tf-1'>
            <label>Supervisor:<p id='team' data-team="<?php echo $SUPERVISOR; ?>"><?php echo $SUPERVISOR?></p></label>
            </div>
            <div class='tf-2'>
            <label>Data/Avaliado: <br><?php echo $DATA_AVALIADO; ?></label>
            </div>           
     </div>   

  <div class='text-four'>
            <div class='tf-1'>
            <label>Assinado: <br><?php echo $Assinado; ?></label>
            </div>
            <div class='tf-2'>
            
            </div>           
     </div> 
    <div style="padding: 20px;"></div>  
     <div class='AV-pt-1'>
            Avaliação de Produtividade:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_PRODUTIVIDADE' required><?php echo   $AVALIACAO_PRODUTIVIDADE; ?></textarea>
      </div>
      <div class='AV-pt-1'>
      Avaliação de Qualidade:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_QUALIDADE' required><?php echo   $AVALIACAO_QUALIDADE; ?></textarea>
      </div>
      <div class='AV-pt-1'>
            Avaliação Comportamental:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='AVALIACAO_COMPORTAMENTAL' required><?php echo   $AVALIACAO_COMPORTAMENTAL; ?></textarea>
      </div>

      <div class='AV-pt-1'>
      Meta / Acordo Firmados:
        </div>
      <div class='AV-pt-1'>
                <textarea class='AV-pt-1-area' id='META_ACORDOS_FIRMADOS' required><?php echo   $META_ACORDOS_FIRMADOS; ?></textarea>
      </div>
    <div class='AV-pt-1' style="margin-top:20px">
            Tipo do feedback: 
        </div>
      <div class='AV-pt-1'>
        <fieldset style="border: 1px solid black; width: 400px;margin: 10px;text-align: center;border: 1px solid #696969;"> 
           <div class="radio-container">
          <label>
            <?php  if($media == "Pontual"): ?>
            <input type="radio" name="options" id="pont" value="Pontual"class="radio-button" checked> Pontual
            <?php  else: ?>
          <input type="radio" name="options" id="pont" value="Pontual"class="radio-button"> Pontual
        <?php  endif; ?>

          </label>
          <label>
            <?php  if($media == "Estruturado"): ?>
            <input type="radio" id="est" name="options" value="Estruturado" class="radio-button" checked> Estruturado
            <?php  else: ?>
              <input type="radio" id="est" name="options" value="Estruturado" class="radio-button">Estruturado
              <?php  endif; ?>
          </label>
        </div>
        </fieldset> 
      </div> 
  
 <?php  if($media == "Pontual"):?>
   <div class='AV-pt-1'>
        <fieldset style="border: 1px solid black; width: 400px; height: 100px;text-align: center;border: 1px solid #696969   ;"> 

       <div class="radio-container"style="margin-top:30px;padding:10px">
          <label>
            <?php if($escopo == "Qualidade"): ?>
            <input type="checkbox"  name="escopo" value="Qualidade"class="radio-button" checked> Qualidade
          <?php else: ?>
            <input type="checkbox"  name="escopo" value="Qualidade"class="radio-button"> Qualidade
          <?php endif; ?>
          </label>
          <label>
            <?php if($escopo == "Comportamental"): ?>
            <input type="checkbox" name="escopo" value="Comportamental" class="radio-button" checked> Comportamental
            <?php else: ?>
              <input type="checkbox" name="escopo" value="Comportamental" class="radio-button"> Comportamental
              <?php endif; ?>
          </label>
          <label>
            <?php if($escopo == "Produtividade"): ?>
            <input type="checkbox" name="escopo" value="Produtividade" class="radio-button" checked> Produtividade
            <?php else: ?>
              <input type="checkbox" name="escopo" value="Produtividade" class="radio-button"> Produtividade
              <?php endif; ?>
          </label>
        </div>
    </fieldset>
  </div>

 <div class='AV-pt-1' style="margin-top: 5px;">
    <fieldset style="border: 1px solid black; width: 400px;height: 100px; text-align: center; border: 1px solid #696969  ;"> 


        <div class="radio-container"  style="margin-top:30px">

          <label>
              <?php if($perfil == "Reconhecimento"): ?>
              <input type="radio" name="perfil"  value="Reconhecimento"class="radio-button" checked> Reconhecimento
            <?php else: ?>
              <input type="radio" name="perfil"  value="Reconhecimento"class="radio-button"> Reconhecimento
              <?php endif; ?>
          </label>
          <label>
            <?php if($perfil == "Ponto_a_melhorar"): ?>
              <input type="radio" name="perfil" value="Ponto_a_melhorar" class="radio-button" checked> Ponto a melhorar
            <?php else: ?>
              <input type="radio" name="perfil" value="Ponto_a_melhorar" class="radio-button"> Ponto a melhorar
              <?php endif; ?>
          </label>
        </div>
    </div> 
</fieldset>
<?php endif; ?>


      
      <div class='text-second'>
         
                <div class='ts-1'>
                <label>4 últimos N do CPF(Colaborador): <input type='password' id='cpf' maxlength="4" required></label>
            </div>
         </div>  
            <center><input type='submit' value='Lançar' class='btn btn-primary' id='btnLan'>
               <div class="alert alert-primary" role="alert" style='display:none;width:500px;margin-top:10px' id='ms1'>
                </div>  
         </center>
            
             
             
     
     
        <center><img src='assets/img/dow2.PNG'  width='800' style='margin-top:60px'></center>
      
     <div class='spac'></div>     


    </div>
</div>
</form>


<?php }?>









