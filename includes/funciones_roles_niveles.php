<?php  

    require_once '_db.php';
    if(isset($_POST["accion"])){
	    switch ($_POST["accion"]) {
            case 'insertar_rol':
                insertar_rol();
            break;                
            case 'consultar_rol':
                consultar_rol($_POST["id"]);
            break;
            case 'eliminar_rol':
                eliminar_rol($_POST["id"]);
            break;   
            case 'editar_rol':
                editar_rol();
            case 'cambiar_statusRol':
                cambiar_statusRol();
            break;  
            case 'mostrar_roles':
                mostrar_roles();
            break;                  
            case 'insertar_nivel':           
            insertar_nivel();
            break;                
            case 'consultar_nivel':                
                consultar_nivel($_POST["id"]);
            break;
            case 'eliminar_nivel':
                eliminar_nivel($_POST["id"]);
            break;   
            case 'mostrar_niveles':
                mostrar_niveles();
            break;   
            case 'editar_nivel':
                editar_nivel();
            break;
            case 'cambiar_statusNivel':
                cambiar_statusNivel();
            break;  
        }
    }

    function insertar_rol(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("Roles",[
                                            "rol_Nombre"=>$nom,
                                            "rol_Descripcion"=>$desc,
                                            "rol_Estatus"=>$est ,
                                            "rol_FechaAlta" => date("Y").date("m").date("d")
                                            ]);
        if($insertar){
            echo "Registro existoso";
        }else{
            echo "Se ocasiono un error";
	    }
        return;
    }

    function consultar_rol($id){
        global $db;
         $consultar = $db -> get("Roles","*",["AND" => [ "rol_Id"=>$id]]);
        echo json_encode($consultar);

    }

    function eliminar_rol($id){
        global $db;
        $eliminar = $db->delete("Roles",["rol_Id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

   function editar_rol(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Roles",["rol_Nombre"=>$nom,
                                        "rol_Descripcion"=>$desc,
                                        "rol_Estatus"=>$est,
                                        ],["rol_Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        } 
    }

function cambiar_statusRol(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Roles",["rol_Estatus"=>$status,
                                        ],["rol_Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        } 
    }

function mostrar_roles(){

                            global $db;
                            $roles = $db->select("Roles","*",["rol_Id[>]" => 3]);
                            echo json_encode($roles);                                                                                                                                                                                      
}
                                                            
    function insertar_nivel(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("Niveles",[
                                            "niv_Nombre"=>$nom,
                                            "niv_Descripcion"=>$desc,
                                            "niv_Estatus"=>$est ,
                                            "niv_FechaAlta" => date("Y").date("m").date("d")
                                            ]);
        if($insertar){
            echo "Registro existoso";
        }else{
            echo "Se ocasiono un error";
	    }
    }

    function consultar_nivel($id){

        global $db;
         $consultar = $db -> get("Niveles","*", ["AND" =>[ "niv_Id"=>$id]]);
        echo json_encode($consultar);

    }

    function eliminar_nivel($id){
        global $db;
        
        $eliminar = $db->delete("Niveles",["niv_Id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

    function mostrar_niveles(){

                            global $db;
                            $niveles = $db->select("Niveles","*","");
                            echo json_encode($niveles);                                                                                                                                                              
                                
    }

   function editar_nivel(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Niveles",["niv_Nombre"=>$nom,
                                        "niv_Descripcion"=>$desc,
                                        "niv_Estatus"=>$est,
                                        ],["niv_Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        } 
    }

function cambiar_statusNivel(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Niveles",["niv_Estatus"=>$status,
                                        ],["niv_Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        } 
    }


?>

