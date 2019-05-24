  let buttonSupport=$("#contactSupport");
  let modalSupport =$('#supportModal');
  let informationAlert = $("#informationAlert");
  let messageSupport = $("#messageSupport");    
  buttonSupport.click(function(){
    buttonSupport.attr("hidden","true");        
    if(messageSupport.val() == ""){
        let msj="Favor de ingresar un mensaje";
        error(msj);             
        return false;
    }    

    let msg_data={
        action : 'support',
        message : messageSupport.val()
    }

    $.post("../../mail/mailer.php", msg_data,"json")
    .done((data)=>{  
        console.log("Conexión correcta",data); 
        if(data!=1){  
            let msj="Ocurrió un error al contactar a soporte :( Por favor acude al área de sistemas de tu campus";          
            error(msj);
        }else{
            success();
        }        
        setTimeout(function(){ 
            reset();
            modalSupport.modal('hide'); 
        }, 3000);
    })
    .fail(()=>{
        console.log("Error en conexión");
        let msj="Ocurrió un error al contactar a soporte :( Por favor acude al área de sistemas de tu campus";
        error(msj);
        setTimeout(function(){
            reset();
            modalSupport.modal('hide'); 
        }, 3000);
    });    
    //informationAlert.attr("hidden","true");
  });

  function error(msj){                     
    informationAlert.removeAttr("hidden");
    informationAlert.text(msj);
    buttonSupport.removeAttr("hidden");
    return; 
  }
  function success(){
    informationAlert.removeAttr("hidden"); 
    informationAlert.removeClass("alert-danger");
    informationAlert.addClass("alert-success");
    informationAlert.text("Gracias por contactar con soporte, pronto nos pondremos en contacto contigo. :)");
    return;
  }
  function reset(){
    informationAlert.attr("hidden","true");
    messageSupport.val('');
    return;
  }