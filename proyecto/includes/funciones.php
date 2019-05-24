<?php  

    require_once '_db.php';
    if(isset($_POST["accion"])){
	    switch ($_POST["accion"]) {
            case 'eliminar_campus':
            eliminar_campus($_POST["campus"]);
                break;

            case 'mostrar_campus':
                mostrar_campus();
            break;
                
            case 'insertar_campus':
                insertar_campus($_POST["nom"], $_POST["cam"], $_POST["est"], $_POST["tip"]);
            break;
            case 'consultar_campus':
                consultar_campus($_POST["registro"]);
            break;

            case 'editar_campus':
                editar_campus();
            break;
            //proyectores
            case 'eliminar_proyectores':
                eliminar_proyectores($_POST["proyectores"]);
            break;

            case 'mostrar_proyectores':
                mostrar_proyectores();
            break;
                
            case 'insertar_proyectores':
                insertar_proyectores($_POST["serie"], $_POST["mol"], $_POST["mar"]);
            break;
            case 'consultar_proyectores':
                consultar_proyectores($_POST["registro"]);
            break;

            case 'editar_proyectores':
                editar_proyectores();
            break;
            //Aulas
            case 'eliminar_aulas':
            eliminar_aulas($_POST["aulas"]);
            break;

            case 'mostrar_aulas':
                mostrar_aulas();
            break;
                
            case 'insertar_aulas':
                insertar_aulas($_POST["aul"], $_POST["cap"], $_POST["tip"]);
            break;
            case 'consultar_aulas':
                consultar_aulas($_POST["registro"]);
            break;

            case 'editar_aulas':
                editar_aulas();
            break;
            //Accesorios
            case 'eliminar_accesorios':
            eliminar_accesorios($_POST["accesorios"]);
                break;

            case 'mostrar_accesorios':
                mostrar_accesorios();
            break;
                
            case 'insertar_accesorios':
                insertar_accesorios($_POST["nom"], $_POST["mol"], $_POST["mar"]);
            break;
            case 'consultar_accesorios':
                consultar_accesorios($_POST["registro"]);
            break;

            case 'editar_accesorios':
                editar_accesorios();
            break;
        }   
    }

    function eliminar_campus($campus){
        global $db;

        $eliminar=$db->delete("campus",["cps_id"=>$campus]);
        if($eliminar){
            echo "Eliminado";
        }else{
            echo "Error";
        }
    }
    function mostrar_campus(){
        global $db;
        $consultar = $db->select("campus",[
            "[>]tipo_campus"=>"tyc_id"
          ],[
              "campus.cps_id",
              "campus.cps_nombre",
              "campus.cps_campus",
              "campus.cps_estado",
              "campus.tyc_id",
              "tipo_campus.tyc_nombre"
          ],[
              "campus.cps_status"=>1
            ]);
        echo json_encode($consultar);
    }
    function consultar_campus($id){
        global $db;
        $consultar = $db -> get("campus","*",["AND" => ["cps_status"=>1, "cps_id"=>$id]]);
        echo json_encode($consultar);
    }
    function editar_campus(){
        global $db;
        extract($_POST);
        $editar = $db->update("campus", ["cps_nombre" => $nom,
                                        "cps_campus" => $cam,
                                        "cps_estado" => $est,
                                        "tyc_id"=> $tip,
                                        "cps_status" => 1],["cps_id"=>$registro]);
        if($editar){
            echo "Registro exitoso";
        }else{
            echo "Error al registrar";
        }
    }
    function insertar_campus($nom, $cam, $est, $tip){
        global $db;
        
        $insertar=$db->insert("campus",["cps_nombre"=>$nom,
                                  "cps_campus"=>$cam,
                                  "cps_estado"=>$est,
                                  "tyc_id"=>$tip,
                                   "cps_status"=>1]);
        
        if($insertar){
            echo"Registro exitoso";
        }else{
            echo"Ocurrio un error";
        }
    }

//Funciones de modulo de proyectores
function eliminar_proyectores($proyectores){
    global $db;

    $eliminar=$db->delete("proyectores",["pts_id"=>$proyectores]);
    if($eliminar){
        echo "Eliminado";
    }else{
        echo "Error";
    }
}
function mostrar_proyectores(){
    global $db;
    $consultar = $db->select("proyectores",[
        "[>]marca_proy"=>"mar_id"
      ],[
          "proyectores.pts_id",
          "proyectores.pts_modelo",
          "proyectores.mar_id",
          "marca_proy.mar_nombre"
      ],[
          "proyectores.pts_status"=>1
        ]);
    echo json_encode($consultar);
}
function consultar_proyectores($id){
    global $db;
    $consultar = $db -> get("proyectores","*",["AND" => ["pts_status"=>1, "pts_id"=>$id]]);
    echo json_encode($consultar);
}
function editar_proyectores(){
    global $db;
    extract($_POST);
    $editar = $db->update("proyectores", ["pts_id" => $serie,
                                    "pts_modelo" => $mol,
                                    "mar_id" => $mar,
                                    "pts_status" => 1],["pts_id"=>$registro]);
    if($editar){
        echo "Registro exitoso";
    }else{
        echo "Error al registrar";
    }
}
function insertar_proyectores($serie, $mol, $mar){
    global $db;
    
    $insertar=$db->insert("proyectores",["pts_id"=>$serie,
                              "pts_modelo"=>$mol,
                              "mar_id"=>$mar,
                               "pts_status"=>1]);
    
    if($insertar){
        echo"Registro exitoso";
    }else{
        echo"Ocurrio un error";
    }
}

//Funciones de modulo de aulas
function eliminar_aulas($aulas){
    global $db;

    $eliminar=$db->delete("aulas",["sls_id"=>$aulas]);
    if($eliminar){
        echo "Eliminado";
    }else{
        echo "Error";
    }
}
function mostrar_aulas(){
    global $db;
    $consultar = $db->select("aulas",[
        "[>]tipo_aula"=>"tsl_id"
      ],[
          "aulas.sls_id",
          "aulas.sls_numero",
          "aulas.sls_capacidad",
          "aulas.tsl_id",
          "tipo_aula.tsl_nombre"
      ],[
          "aulas.sls_status"=>1
        ]);
    echo json_encode($consultar);
}
function consultar_aulas($id){
    global $db;
    $consultar = $db -> get("aulas","*",["AND" => ["sls_status"=>1, "sls_id"=>$id]]);
    echo json_encode($consultar);
}
function editar_aulas(){
    global $db;
    extract($_POST);
    $editar = $db->update("aulas",["sls_numero"=>$aul,
                                    "sls_capacidad"=>$cap,
                                    "tsl"=>$tip,
                                    "sls_status"=>1],["sls_id"=>$registro]);
    if($editar){
        echo "Registro exitoso";
    }else{
         echo "Error al registrar";
    }
}
function insertar_aulas($aul, $cap, $tip){
    global $db;
    
    $insertar=$db->insert("aulas",["sls_numero"=>$aul,
                              "sls_capacidad"=>$cap,
                              "tsl_id"=>$tip,
                               "sls_status"=>1]);
    
    if($insertar){
        echo"Registro exitoso";
    }else{
        echo"Ocurrio un error";
    }
}
//Modulo de acccesorios
function eliminar_accesorios($accesorios){
    global $db;

    $eliminar=$db->delete("accesorios",["acs_id"=>$accesorios]);
    if($eliminar){
        echo "Eliminado";
    }else{
        echo "Error";
    }
}
function mostrar_accesorios(){
    global $db;
    $consultar = $db->select("accesorios",[
        "[>]marcca_acs"=>"mac_id"
      ],[
          "accesorios.acs_id",
          "accesorios.acs_nombre",
          "accesorios.acs_modelo",
          "accesorios.mac_id",
          "marcca_acs.mac_nombre"
      ],[
          "accesorios.acs_status"=>1
        ]);
    echo json_encode($consultar);
}
function consultar_accesorios($id){
    global $db;
    $consultar = $db -> get("accesorios","*",["AND" => ["acs_status"=>1, "acs_id"=>$id]]);
    echo json_encode($consultar);
}
function editar_accesorios(){
    global $db;
    extract($_POST);
    $editar = $db->update("accesorios", ["acs_nombre" => $nom,
                                    "acs_modelo" => $mol,
                                    "mac_id" => $mar,
                                    "acs_status" => 1],["acs_id"=>$registro]);
    if($editar){
        echo "Registro exitoso";
    }else{
        echo "Error al registrar";
    }
}
function insertar_accesorios($nom, $mol, $mar){
    global $db;
    
    $insertar=$db->insert("accesorios",["acs_nombre"=>$nom,
                              "acs_modelo"=>$mol,
                              "mac_id"=>$mar,
                               "acs_status"=>1]);
    
    if($insertar){
        echo"Registro exitoso";
    }else{
        echo"Ocurrio un error";
    }
}

?>
