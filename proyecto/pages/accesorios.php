<?php
require_once '../includes/_db.php';
require_once '../includes/funciones.php';

?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Jekyll v3.8.5">
  <title>Dashboard Template · Bootstrap</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <link href="../css/estilo.css" rel="stylesheet">
</head>
<body>
  <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">Company name</a>
    <input class="form-control form-control-dark w-100" type="text" placeholder="Search" aria-label="Search">
    <ul class="navbar-nav px-3">
      <li class="nav-item text-nowrap">
        <a class="nav-link" href="#">Sign out</a>
      </li>
    </ul>
  </nav>

  <div class="container-fluid">
    <div class="row">
      <nav class="col-md-2 d-none d-md-block bg-light sidebar">
        <div class="sidebar-sticky">
          <ul class="nav flex-column">
            <li class="nav-item">
              <a class="nav-link" href="#">
                <span data-feather="home"></span>
                Dashboard
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="campus.php">
                <span data-feather="file"></span>
                Campus<span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="proyectores.php">
                <span data-feather="file"></span>
                Proyectores<span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link " href="aulas.php">
                <span data-feather="file"></span>
                Aulas<span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link active" href="accesorios.php">
                <span data-feather="file"></span>
                Accesorios<span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main id="main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <h2>Accesorios
          <button type="button" id="btn_nuevo" class="btn btn-outline-primary">Nuevo</button>
        </h2>
        <div class="table-responsive view" id="mostrar_datos">
          <table class="table table-striped table-sm" id="table_datos">
            <thead>
              <tr>
                <th>Nombre</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $accesorios = $db->select("accesorios",[
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
   
              foreach ($accesorios as $accesorios => $acs) {
                ?>
                <tr>
                  <td><?php echo $acs["acs_nombre"]; ?></td>
                  <td><?php echo $acs["acs_modelo"]; ?></td>
                  <td><?php echo $acs["mac_nombre"]; ?></td>
                  <td>
                    <a href="#" class="editar_accesorios"data-id="<?php echo $acs["acs_id"]; ?>">Editar</a>
                    <a href="#" class="eliminar_accesorios" data-id="<?php echo $acs["acs_id"]; ?>">Eliminar</a></td>
                  </tr>
                  <?php
                }
                ?>
              </tbody>
            </table>
          </div>
          <div id="formulario_datos" class="view">
            <form action="#" id="frm_datos">
              <div class="row">
                <div class="col">
                  <div class="form-group">
                    <label for="nom">Nombre</label>
                    <input type="text" class="form-control" name="nom" id="nom">
                  </div>
                  <div class="form-group">
                    <label for="mol">Modelo</label>
                    <input type="text" class="form-control" name="mol" id="mol">
                  </div>
                  <div class="form-group">
                <label for="mar">Marca:</label>
                  <select class="form-control" name="mar" id="mar">
                   <option value="0">Seleccionar</option>
                   <option value="1">Sin marca</option>
                   <option value="2">Manhattan</option>
                  </select>
            </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col">
                  <button type="button" class="btn btn-outline-danger cancelar">Cancelar</button>
                  <button type="button" class="btn btn-outline-success" id="registrar">Guardar</button>

                </div>
              </div>
            </form>
          </div>
        </main>
      </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script>
       
      change_view();
      function change_view(vista = "mostrar_datos"){
        $("#main").find(".view").each(function(){
          $(this).addClass('d-none');
          let id = $(this).attr("id");
          if(id == vista){
            $(this).removeClass("d-none");
          }
        });
      }
      $("#btn_nuevo").click(function(){
        change_view("formulario_datos");
      });
      $("#main").find(".cancelar").click(function(){
        $("#frm_datos")[0].reset();
        change_view();
      });
         $("#main").on("click",".editar_accesorios", function(e){
        e.preventDefault();
        change_view("formulario_datos");
        let id=$(this).data("id")
        let obj={
            "accion" : "consultar_accesorios",
            "registro" : $(this).data("id")
        }
         $.post("../includes/funciones.php", obj, function(data){
             $("#nom").val(data.acs_nombre);
             $("#mol").val(data.acs_modelo);
             $("#mar").val(data.mac_id);
         }, "JSON");
        
        $("#registrar").text("Actualizar").data("edicion", 1).data("registro", id);
    });
         $("#frm_datos").find("input").keyup(function(){
          $(this).removeClass("error");
        });
      $("#registrar").click(function(){

          let nom=$("#nom").val();
        let mol=$("#mol").val();
        let mar=$("#mar").val();

        let obj = {
          "accion" : "insertar_accesorios",
            "nom" : nom,
            "mol" : mol,
            "mar" : mar
        };

       
        $("#frm_datos").find("input").each(function(){
          $(this).removeClass("error");
          if($(this).val() == ""){
            $(this).addClass("error").focus();
            return false;
          }else{
            obj[$(this).prop("name")] = $(this).val();
          }

        });
          if($(this).data("edicion")==1){
                obj["accion"]="editar_accesorios";
                obj["registro"]=$(this).data("registro");
              $(this).text("Guardar").removeData("edicion").removeData("registro");
             }

          if(nom.length==0 || mol.length==0 || mar.length==0){
              alert("Por favor no dejes campos vacios");

          }else{
              $.post("../includes/funciones.php", obj, function(data){
                  alert(data);
                  change_view(); 
                  mostrar_accesorios();
                  $("#frm_datos")[0].reset(); 
                });
          


          }

      });
      $("#main").on("click",".eliminar_accesorios",function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let obj = {
          "accion" : "eliminar_accesorios",
          "accesorios" : id
        }
        $.post("../includes/funciones.php",obj, function(data){
          mostrar_accesorios();
        });
      });
      function mostrar_accesorios(){
        let obj = {
          "accion" : "mostrar_accesorios"
        }

        $.post("../includes/funciones.php",obj, function(data){
          let template = ``;
          $.each(data, function(e,elem){
            template += `
            <tr>
            <td>${elem.acs_nombre}</td>
            <td>${elem.acs_modelo}</td>
            <td>${elem.mac_nombre}</td>
            <td>
            <a href="#" class="editar_accesorios"data-id="${elem.acs_id}">Editar</a>
            <a href="#" class="eliminar_accesorios" data-id="${elem.acs_id}">Eliminar</a></td>
            </tr>ﬂﬂﬂ
            `;
          });
          $("#table_datos tbody").html(template);
        },"JSON");
      }
    </script>
    </html>
