<?php
require_once '_db.php';
include '../back-core/session.php';
if(isset($_POST["accion"])){
  switch($_POST["accion"]){
        case'insertar_campus':
            insertar_campus($_POST["nombre"],$_POST["ciudad"],$_POST["estado"],$_POST["tipo"]);
        break;
        case'insertar_proyector':
            insertar_proyector($_POST["pts_modelo"],$_POST["mar_id"],$_POST["pts_status"]);
        break;
        case'insertar_accesorios':
            insertar_accesorios($_POST["acs_nombre"],$_POST["acs_modelo"],$_POST["mac_id"],$_POST["acs_status"]);
        break;       
        case 'close_session':
            delete_session();
        break;
        case 'eliminar_reservacion':
            eliminar_reservaciones($_POST["reservacion"]);
        break;
        case 'mostrar_reservacion':
            mostrar_reservaciones($_POST["usuario"]);
        break;
  } 

  
}

function insertar_campus($nombre, $ciudad, $estado, $tipo){
    global $db;
    
    $insertar->insert("campus",["cps_nombre"=>$nombre,
                              "cps_campus"=>$ciudad,
                              "cps_estado"=>$estado,
                              "tyc_id"=>$tipo]);
    
    if($insertar){
        echo"Registro exitoso";
    }else{
        echo"Ocurrio un error";
    }
}

function insertar_proyector($modelo, $mar_id, $status){
    global $db;
    
    $insertar->insert("proyectores",["pts_modelo"=>$modelo,
                              "mar_id"=>$mar_id,
                              "pts_status"=>$status]);
    
    if($insertar){
        echo"Registro exitoso";
    }else{
        echo"Ocurrio un error";
    }
}

function insertar_accesorios($nombre,$modelo, $mar_id, $status){
    global $db;
    
    $insertar->insert("accesorios",["acs_nombre" => $nombre,
    	"acs_modelo"=>$modelo,
                              "mac_id"=>$mar_id,
                              "acs_status"=>$status]);
    
    if($insertar){
        echo"Registro exitoso";
    }else{
        echo"Ocurrio un error";
    }
}
function mostrar_reservaciones($uId){
    global $db;    
    $reservs=$db->select("proyectores_pedidos",
            [
                "[>]usuarios"=>"usr_id",
                "[>]aulas"=>"sls_id"
            ],
            [
                "proyectores_pedidos.pac_id",
                "proyectores_pedidos.pac_status",
                "proyectores_pedidos.pac_tipo",
                "proyectores_pedidos.pac_fecha",
                "proyectores_pedidos.pac_entrada",
                "proyectores_pedidos.pac_salida",
                "aulas.sls_numero",
                "usuarios.usr_id"                                        
            ],
            [
                "proyectores_pedidos.usr_id"=>$uId
            ]
        );           
	echo json_encode($reservs);
}
function eliminar_reservaciones($reserv){
    global $db;
	$eliminar_reservacion = $db->delete("proyectores_pedidos",["pac_id" => $reserv]);
	if($eliminar_reservacion){
		echo 0;
	}else{
		echo 1;
	}
}

?>