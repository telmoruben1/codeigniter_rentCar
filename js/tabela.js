$(document).ready(function(){
  var id_rio=0;

  $(".remove_button2").click(function(){
    console.log("remove");
     id_rio=$(this).val();
     console.log(id_rio);
    // console.log(id_rio);
    var disp=0;
    $(this).parent().siblings().each(function() {
       if(this.cellIndex==4){
        disp=$(this).text();
      }
    });
    console.log(disp);
    if(disp!=0){
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
    }else{
      alert('Não pode remover este automovel esta como indisponivel!');
    }


  });
  $(".update_table").click(function(){
    console.log("update");
    id_rio=$(this).val();
    var id_fabri=0;
    var id_model=0;
    var id_cor=0;
    var matri="";
    var disp=0;
    $(this).parent().siblings().each(function() {
      if(this.cellIndex==0){

        id_fabri=$(this).attr('class');
      }else if(this.cellIndex==1){

        id_model=$(this).attr('class');
      }else if(this.cellIndex==2){

        id_cor=$(this).attr('class');
      }else if(this.cellIndex==3){
        matri=$(this).text();
      }else if(this.cellIndex==4){
        disp=$(this).text();
        console.log(disp+"dis");
      }
    });
    console.log(disp+"dis");
    console.log(id_rio);
    $("#modelo option[value="+id_model+"]").attr('selected', true);
    $("#fabricante option[value="+id_fabri+"]").attr('selected', true);
    $("#cor option[value="+id_cor+"]").attr('selected', true);
    $("#matricula").val(matri);
    $('input[name=disponibilidade][value=' + disp + ']').prop('checked',true)
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
    var cor=$("#cor").val();
    var id_auto=id_rio;
    var disponibilidade=$('form input[type=radio]:checked').val();
    console.log(modelo);
    console.log(fabricante);
    console.log(matricula);
    console.log(disponibilidade);
    console.log(cor+"cor");
    console.log(id_auto+"id");
    $.ajax({
      type: "post",
      url: "http://localhost/CodeIgniter_automoveis/index.php/tabela/update_table",
      cache: false,
      data: {"id_automovel":id_auto,"modelo_id":modelo,"cor_id":cor,"matricula":matricula,"disponibilidade":disponibilidade},
      success: function(response){
        try{
          alert("Foi feita a atualizacao com sucesso! Obrigado.");
          location.reload();

        }catch(e) {
          console.log(e);
          alert('Erro no cath');
        }
      },
      error: function(){
        alert('Error no update');
      }
    });

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
