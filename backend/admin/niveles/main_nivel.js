$(document).ready(function(){
    //inicializar el plugin de datatable
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
            $("#id").val(data.Id);
            $("#nombre").val(data.Nombre);
            $("#descripcion").val(data.Descripcion);            
            $("#lista").val(data.Estatus);                    
        }, "JSON");
        
       
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Nivel"); 
        $("#btnGuardarNivel").text("Actualizar").data("edicion", 1).data("id", id);    
        $("#modalniveles").modal("show");  

        
    });
 });
