$(document).ready(function(){
  console.log("agoraaa");

  $("#avalia_button2").click(function(){
    var nome=$('#nome_contacto').val();
    var email=$('#email').val();
    var message=$('#message').val();
    console.log(nome);
    console.log(email);
    console.log(message);
      $.ajax({
        type: "post",
        url: "http://localhost/CodeIgniter_automoveis/index.php/avaliacao/inser_aval",
        cache: false,
        data: {nome:nome,email:email,mensagem:message},
        success: function(response){
          if(response=="success"){
            alert("A sua mensagem foi enviada com sucesso obrigado!");
            // window.location.href("http://localhost/CodeIgniter-ponchaAdvisor/index.php/Pages/view_succes");
          }
        },
        error: function(e){
           alert("Erro no insert");
        }
      });


  });
});
