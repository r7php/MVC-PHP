$(document).ready(function(){
    var baseUrl = $('body').data('base-url'); 

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
                    url:baseUrl+"ajax/InserirFeed",
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
                                    url:baseUrl+"ajax/InserirFeed",
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
          
             
          }, false)
        }
      });
