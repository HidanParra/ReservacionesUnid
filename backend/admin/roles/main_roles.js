$(document).ready(function(){    
    //inicializar el plugin de datatable        
    Mostrar();
    
    tablaroles=$("#tablaroles").DataTable({
       
        
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
    $("#btnNuevo").click(function(){         
        $("#formulario").trigger("reset");
        $(".modal-header").css("background-color","#28a745"); 
        $(".modal-header").css("color","white"); 
        $(".modal-title").text("Agregar Rol");  
        $("#btnGuardarRol").text("Guardar");  
        $("#modalroles").modal("show");   
    });
    //Obtener los parametros
    $("#btnGuardarRol").click(function(){
        console.log("en formulario")                
        nom=$("#nombre").val();
        desc=$("#descripcion").val();        
        est=$("#lista").val();
            
        obj={
                accion: "insertar_rol",                
                nom: nom,
                desc: desc,
                est: est                
            }            
     if($(this).data("edicion")==1){
         obj["accion"]="editar_rol";
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
            $("#modalroles").modal("hide");
            location.reload();
        }
    });
    
    $(document).on("click", ".eliminar_rol", function(){
        id=$(this).data("id");
        
          if(id <=3){
            alert("No se puede eliminar este rol");
            return;
        }
        $.ajax({
            url: "../../includes/funciones_roles_niveles.php",
            type: "POST",
            dataType: "json",
            data: {
                accion: "eliminar_rol",
                id: id
            },
            success: function(data){
                console.log(data);
            }
        })
        location.reload();
    });

    //Editar
    $(document).on("click", ".editar_rol", function(){
        id=$(this).data("id");
        
        if(id <=3){
            alert("No se puede modificar este rol");
            return;
        }
        
        obj={
            "accion" : "consultar_rol",
            "id" : $(this).data("id")
        }
        $.post("../../includes/funciones_roles_niveles.php", obj, function(data){       
            $("#nombre").val(data.Nombre);
            $("#descripcion").val(data.Descripcion);            
            $("#lista").val(data.Estatus);                    
        }, "JSON");
        
       
        $(".modal-header").css("background-color", "#007bff");
        $(".modal-header").css("color", "white");
        $(".modal-title").text("Editar Rol"); 
        $("#btnGuardarRol").text("Actualizar").data("edicion", 1).data("id", id);    
        $("#modalroles").modal("show");  

        
    });

    function Mostrar(){
        
        let obj={
            "accion" : "mostrar_roles"
            
        }
        let template = ``; 
        
         $.post("../../includes/funciones_roles_niveles.php", obj, function(data){       
             $.each(data,function(i,e){
                 console.log(i,e);
                 template += `           <tr>
                                        <td>${i+1}</td>
                                        <td>${e.Nombre}</td>
                                        <td>${e.Descripcion}</td>
                                        <td>${e.Estatus}</td>
                                        <td>${e.FechaAlta}</td>     
                                        <td>
                                            <a href="#" class="editar_rol" data-id="${e.Id}" ><i  class="fas fa-edit"></i></a>
                                        </td>
                                        <td>
                                            <a href="#" class="eliminar_rol" data-id="${e.Id}" ><i class="fas fa-trash"></i></a>
                                    </td>  
                                    </tr>`; 
                 
             });
             $("#tablaroles tbody").html(template);
             tablaroles.trigger("update");
        }, "JSON");
        
                                    
    }
});