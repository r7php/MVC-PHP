

$(document).ready(function(){
  var baseUrl = $('body').data('base-url');
  console.log(baseUrl+"ajax/alterarFeed");

  let btnLan = document.getElementById('btnLan')
    if(!!btnLan){
        btnLan.addEventListener('click', function(e) {
            e.preventDefault();
                            
              let id = $('#id').val();              
              let AVALIACAO_PRODUTIVIDADE = $('#AVALIACAO_PRODUTIVIDADE').val();
              let AVALIACAO_QUALIDADE = $('#AVALIACAO_QUALIDADE').val();
              let AVALIACAO_COMPORTAMENTAL = $('#AVALIACAO_COMPORTAMENTAL').val();
              let META_ACORDOS_FIRMADOS  = $('#META_ACORDOS_FIRMADOS').val();
              let cpf  = $('#cpf').val();
              let nome = $('#nome').val();
 
              $.ajax({
                    url:baseUrl+"ajax/alterarFeed",
                    type:'POST',
                    data: {id:id,AVALIACAO_PRODUTIVIDADE:AVALIACAO_PRODUTIVIDADE,AVALIACAO_QUALIDADE:AVALIACAO_QUALIDADE,AVALIACAO_COMPORTAMENTAL:AVALIACAO_COMPORTAMENTAL,META_ACORDOS_FIRMADOS:META_ACORDOS_FIRMADOS,cpf:cpf,nome:nome},                         
                    dataType: 'json',
                    beforeSend:function(){
                        $('#wait').show();
                    },
                    complete:function(){
                        $('#wait').hide();
                    },
                    success:function(js){     
                      console.log(js);
                       $("#ms1").show();
                      if(js.msg == 'Este CPF não existe na base do PONTO MAIS'){
                        $("#ms1").html(js.msg).css('color','red');  
                      }else{
                        $("#ms1").html(js.msg).css('color','green');  
                      }
                      
                    },
                });
          }, false)
        }
      });