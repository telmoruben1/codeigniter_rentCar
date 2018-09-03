$(document).ready(function(){
  var id_rio=0;
  $(".remove_button2").click(function(){
    console.log("remove");
     id_rio=$(this).val();
     console.log(id_rio);
    // console.log(id_rio);
    $.ajax({
      type: "post",
      url: "http://localhost/CodeIgniter_automoveis/index.php/tabela/deleterow",
      cache: false,
      data: {"id_automovel":id_rio},
      success: function(response){
        try{
          alert("O veiculo foi removido");
          location.reload();
        }catch(e) {
          console.log(e);
          alert('Exception while request..');
        }
      },
      error: function(){
        alert('Error while request..');
      }
    });

  });
  $(".update_table").click(function(){
    console.log("update");
    id_rio=$(this).val();
    console.log(id_rio);
    $("#janelaUpdate").css('display','block');
    $(".tabela2").css('display','none');
    $(".tabela").css('display','none');

  });
  $(".close").click(function(){
    $("#janelaUpdate").css('display','none');
    $(".tabela2").css('display','block');
    $(".tabela").css('display','block');
  });



  $(".update_table_pop_up").click(function(){
    $("#janelaUpdate").css('display','none');
    $(".tabela2").css('display','block');
    $(".tabela").css('display','block');
    var modelo=$("#modelo").val();
    var fabricante=$("#fabricante").val();
    var matricula=$("#matricula").val();
    var disbonibilidade=$('form input[type=radio]:checked').val();
    console.log(modelo);
    console.log(fabricante);
    console.log(matricula);
    console.log(disbonibilidade);
    var url=window.location.href;
    var array_user=url.split('?.');
    console.log(array_user[1]);
    // if(array_user[1] !=""){
    //   console.log("apagou");
    //   $.ajax({
    //     type: "post",
    //     url: "http://localhost/CodeIgniter-ponchaAdvisor/index.php/login/verifica_user_logado",
    //     cache: false,
    //     data: {"user":array_user[1]},
    //     success: function(response){
    //       try{
    //         //console.log(response)  --> "Result";
    //         // console.log("deu");
    //         if(response==true){
    //           console.log("deu logado");
    //           $.ajax({
    //             type: "post",
    //             url: "http://localhost/CodeIgniter-ponchaAdvisor/index.php/tabela/update_table",
    //             cache: false,
    //             data: {"id_comentario":id_rio,"titulo":tit,"classificacao":classificacao},
    //             success: function(response){
    //               try{
    //
    //                 location.reload();
    //
    //               }catch(e) {
    //                 console.log(e);
    //                 alert('Erro no cath');
    //               }
    //             },
    //             error: function(){
    //               alert('Error no update');
    //             }
    //           });
    //         }else{
    //           console.log("deu nao logado");
    //         }
    //
    //         // location.reload();
    //
    //       }catch(e) {
    //         console.log(e);
    //         alert('Exception while request..');
    //       }
    //     },
    //     error: function(){
    //       alert('Error while request..');
    //     }
    //   });
    //
    // }else{
    //   alert("Não tem permissao de remover");
    // }

  });


});
