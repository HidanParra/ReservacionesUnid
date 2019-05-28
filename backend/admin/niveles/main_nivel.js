$(document).ready(function(){
    //inicializar el plugin de datatable
    
     Mostrar();
    
    tablaniveles=$("#tablaniveles").DataTable({
       
        
        //Para cambiar el lenguaje a español
        "language": {
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
            "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "sSearch": "Buscar:",
            "oPaginate": {
                "sFirst": "Primero",
                "sLast":"Último",
                "sNext":"Siguiente",
                "sPrevious": "Anterior"
             },
             "sProcessing":"Procesando...",
        }
    });
    
    //inicializar accion del boton para mostrar el modal
    $("#btnNuevoNivel").click(function(){    
        $("#formulario").trigger("reset");
        $(".modal-header").css("background-color","#28a745"); 
        $(".modal-header").css("color","white"); 
        $(".modal-title").text("Agregar Nivel");  
        $("#btnGuardarNivel").text("Guardar");  
        $("#modalniveles").modal("show");   
    });
  
    //Obtener los parametros
    $("#btnGuardarNivel").click(function(){
        console.log("en formulario")                
        nom=$("#nombre").val();
        desc=$("#descripcion").val();        
        est=$("#lista").val();
            
        obj={
                accion: "insertar_nivel",                
                nom: nom,
                desc: desc,
                est: est                
            }            
     if($(this).data("edicion")==1){
         obj["accion"]="editar_nivel";
            obj["id"]=$(this).data("id");
          $(this).removeData("edicion").removeData("id");
        }
        
        if(nom=="" || est==""){
            alert("No dejes campos vacios");
            return;
        }else{
            $.ajax({
                url: "../../includes/funciones_roles_niveles.php",
                type: "POST",
                dataType: "json",
                data: obj,
                success: function(data){
                    console.log(data);
                }
            })
            $("#modalniveles").modal("hide");
            location.reload();
        }
    });
    
 $(document).on("click", ".eliminar_nivel", function(){
        id=$(this).data("id");
               
        $.ajax({
            url: "../../includes/funciones_roles_niveles.php",
            type: "POST",
            dataType: "json",
            data: {
                accion: "eliminar_nivel",
                id: id
            },
            success: function(data){
                console.log(data);
            }
        })
        location.reload();
    });

    //Editar
    $(document).on("click", ".editar_nivel", function(){
        id=$(this).data("id");   
        
        obj={ 
            "accion" : "consultar_nivel",
            "id" : $(this).data("id")
        }
        $.post("../../includes/funciones_roles_niveles.php", obj, function(data){            
            $("#id").val(data.niv_Id);
            $("#nombre").val(data.niv_Nombre);
            $("#descripcion").val(data.niv_Descripcion);            
            $("#lista").val(data.niv_Estatus);                    
        }, "JSON");
        
       
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Nivel"); 
        $("#btnGuardarNivel").text("Actualizar").data("edicion", 1).data("id", id);    
        $("#modalniveles").modal("show");  

        
    });
    
     $("#tablaniveles").on("change",".estatus_check", function(){
    let obj = {
        "accion" : "cambiar_statusNivel",
        "id" :  $(this).data("id"),
    };
    if($(this).is(":checked")){
        obj["status"] = 1;
    }else{
        obj["status"] = 0;
    }
    //console.log(obj);
      
      $.post("../../includes/funciones_roles_niveles.php",obj,"JSON");
    });
    
    function Mostrar(){
        
        
        let obj={
            "accion" : "mostrar_niveles"
            
        }
        let template = ``; 
        
         $.post("../../includes/funciones_roles_niveles.php", obj, function(data){       
             $.each(data,function(i,e){
                 console.log(i,e);
                 let status = "";
                 if(e.niv_Estatus ==  1){
                        status  =  'checked="checked"';
                    }
                 template += `           <tr>
                                        <td>${i+1}</td>
                                        <td>${e.niv_Nombre}</td>
                                        <td>${e.niv_Descripcion}</td>                                    
                                        <td><input type="checkbox" ${status} class="estatus_check" data-id="${e.niv_Id}" value="${e.niv_Estatus}"></td>
                                        <td>${e.niv_FechaAlta}</td>     
                                        <td>
                                            <a href="#" class="editar_nivel" data-id="${e.niv_Id}" ><i  class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="eliminar_nivel" data-id="${e.niv_Id}" ><i class="fas fa-trash"></i></a>
                                    </td>  
                                    </tr>`; 
                 
             });
             $("#tablaniveles tbody").html(template);
        }, "JSON");
        
                                    
    }
    
 });
