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
            case 'editar_nivel':
                editar_nivel();
            break;
        }
    }

    function insertar_rol(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("Roles",[
                                            "Nombre"=>$nom,
                                            "Descripcion"=>$desc,
                                            "Estatus"=>$est ,
                                            "FechaAlta" => date("Y").date("m").date("d")
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
         $consultar = $db -> get("Roles","*",["AND" => [ "Id"=>$id]]);
        echo json_encode($consultar);

    }

    function eliminar_rol($id){
        global $db;
        $eliminar = $db->delete("Roles",["Id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

   function editar_rol(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Roles",["Nombre"=>$nom,
                                        "Descripcion"=>$desc,
                                        "Estatus"=>$est,
                                        ],["Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        } 
    }

function mostrar_roles(){

                            global $db;
                            $roles = $db->select("Roles","*",["Id[>]" => 3]);
                            echo json_encode($roles);                                                                                                                                                              
                                
}
                                
                                


    function insertar_nivel(){
        global $db;
        extract($_POST);

        $insertar=$db ->insert("Niveles",[
                                            "Nombre"=>$nom,
                                            "Descripcion"=>$desc,
                                            "Estatus"=>$est ,
                                            "FechaAlta" => date("Y").date("m").date("d")
                                            ]);
        if($insertar){
            echo "Registro existoso";
        }else{
            echo "Se ocasiono un error";
	    }
    }

    function consultar_nivel($id){

        global $db;
         $consultar = $db -> get("Niveles","*", ["AND" =>[ "Id"=>$id]]);
        echo json_encode($consultar);

    }

    function eliminar_nivel($id){
        global $db;
        
        $eliminar = $db->delete("Niveles",["Id" => $id]);
        if($eliminar){
            echo "Registro eliminado";
        }else{
            echo "registro eliminado";
        }
    }

   function editar_nivel(){
        global $db;
        extract($_POST);
         $editar=$db ->update("Niveles",["Nombre"=>$nom,
                                        "Descripcion"=>$desc,
                                        "Estatus"=>$est,
                                        ],["Id"=>$id]);
        if($editar){
            echo "Edicion completada";
        }else{
            echo "Se ocasiono un error";
        } 
    }

?>

