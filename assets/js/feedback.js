var baseUrl = $('body').data('base-url');

  $(document).ready(function() {
    // Abrir modal suavemente cuando se hace clic en el botón
    $("#btnAbrirModal").click(function() {
      $("#miModal").fadeIn(300); // Tiempo de 300 milisegundos para mostrar suavemente el modal
    });

    // Cerrar modal cuando se hace clic en el botón de cerrar o fuera del modal
    $(".cerrar-modal, .modal").click(function() {
      $("#miModal").fadeOut(300); // Tiempo de 300 milisegundos para ocultar suavemente el modal
    });

    // Evitar que el clic en el contenido del modal también lo cierre
    $(".modal-contenido").click(function(event) {
      event.stopPropagation();
    });
  }); 

  $(document).ready(function() {
    // Captura o campo de pesquisa e a tabela usando o jQuery
    const $inputPesquisar = $('#inputPesquisar');
    const $tabela = $('#tabelaResultados');

    // Adiciona um ouvinte de evento ao campo de pesquisa usando o método .on() do jQuery
    $inputPesquisar.on('input', function() {
      const termoPesquisa = $inputPesquisar.val().toLowerCase();
      const $linhas = $tabela.find('tbody tr');

      // Loop pelas linhas da tabela
      $linhas.each(function() {
        const $linha = $(this);
        const $colunas = $linha.find('td');
        let encontrou = false;

        // Loop pelas colunas da linha atual
        $colunas.each(function() {
          const conteudoColuna = $(this).text().toLowerCase();

          // Verifica se o termo de pesquisa está presente na coluna atual
          if (conteudoColuna.includes(termoPesquisa)) {
            encontrou = true;
            return false; // Equivalente a break no loop do jQuery
          }
        });

        // Exibe ou oculta a linha conforme o resultado da pesquisa
        if (encontrou) {
          $linha.show();
        } else {
          $linha.hide();
        }
      });
    });
  });

$(document).ready(function() {
    var ID_SUPERVISOR = $("#ID_SUPERVISOR").val();

    var url = window.location.href;
    var searchParams = new URLSearchParams(new URL(url).search);
    var nome_colaborador = searchParams.get('id');
 
 
    if(nome_colaborador){
        
          $.ajax({
          url:baseUrl+"ajax/carregar_colaborador_feed",
          method: "POST",
          dataType: 'json',
          data: {nome_colaborador:nome_colaborador},
          

          beforeSend:function(){
            $("#loadingIcon").show();
          },

          success: function(data) {
            $("#loadingIcon").hide();
              var tabela = $('#tabelaResultado_all tbody');
               //$("#tabelaResultado_all tbody").html(response);  
              var txt = "";
              $.each(data, function(indice, linha) {
                if(linha.STATUS == 'ASSINADO'){
                  txt = "<p style='color:green'>ASSINADO</p>";
                }else{
                  txt = "<p style='color:red'>PENDENTE</p>";
                }

                tabela.append('<tr><td><a href="AlterarForm?id=' + linha.ID + '">Feed</td><td>' + linha.COLABORADOR + '</td><td>' + linha.DATA_AVALIADO + '</td><td>' + txt + '</td><td>' + linha.MES_AVALIADO + '</td></tr>');
              });

             },

         });
    }else{
      $("#tabelaResultado_all tbody").html('');  
    }

    var nome = $("#nome").val();
   
        $.ajax({
         url:baseUrl+"ajax/carregar_mes",
         method: "POST",
         data: {nome:nome,ID_SUPERVISOR:ID_SUPERVISOR},
         beforeSend:function(){
            $("#loadingIcon").show();
            $("#tabelaResultados").hide();  
          },

         success: function(response) {
              $("#loadingIcon").hide();
              $("#tabelaResultados").show();  
              $("#tabelaResultados tbody").html(response);  
                     
            },

        });
        $("#mes").on("change", function(e) {
        e.preventDefault();
        var mes = $("#mes").val();    

        $.ajax({
         url:baseUrl+"ajax/carregar_mes_anterior",
         method: "POST",
         data: {mes:mes,ID_SUPERVISOR:ID_SUPERVISOR},
         //dataType:'json',
         beforeSend:function(){
            $("#loadingIcon").show();
          },

         success: function(response){
              $("#loadingIcon").hide();
              console.log(response);
              $("#tabelaResultados tbody").html(response);  
                
            }
        });
    });
    
 
    
});

$(document).ready(function() {
    
    $("#btnPesquisar").on("click", function(e) {
      e.preventDefault();


        var ID_SUPERVISOR = $("#ID_SUPERVISOR").val();
        var id = $("#id").val();
        var NOME = $("#NOME").val();
        var id_chefe = $("#id_chefe").val();
        
        $.ajax({
            url:baseUrl+"ajax/pesquisa_colaborador",
            method: "POST",
            data: {id: id,NOME:NOME,ID_SUPERVISOR:ID_SUPERVISOR},

            success: function(response) {
                if(response == "Colaborador não encontrado"){
                  alert('Colaborador não encontrado');
                }else{
                  $("#tabelaResultados_1").show();
                  $("#tabelaResultados_1 tbody").html(response);  
                }
                
            },

        });
    });
});