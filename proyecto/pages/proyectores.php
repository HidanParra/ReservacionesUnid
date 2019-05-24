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
              <a class="nav-link active" href="proyectores.php">
                <span data-feather="file"></span>
                Proyectores<span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="aulas.php">
                <span data-feather="file"></span>
                Aulas<span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="accesorios.php">
                <span data-feather="file"></span>
                Accesorios<span class="sr-only">(current)</span>
              </a>
            </li>
          </ul>
        </div>
      </nav>

      <main id="main" role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">

        <h2>Proyectores
          <button type="button" id="btn_nuevo" class="btn btn-outline-primary">Nuevo</button>
        </h2>
        <div class="table-responsive view" id="mostrar_datos">
          <table class="table table-striped table-sm" id="table_datos">
            <thead>
              <tr>
                <th>No serie</th>
                <th>Modelo</th>
                <th>Marca</th>
                <th>Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $proyectores = $db->select("proyectores",[
                "[>]marca_proy"=>"mar_id"
              ],[
                  "proyectores.pts_id",
                  "proyectores.pts_modelo",
                  "proyectores.mar_id",
                  "marca_proy.mar_nombre"
              ],[
                  "proyectores.pts_status"=>1
                ]);
   
              foreach ($proyectores as $proyectores => $pts) {
                ?>
                <tr>
                  <td><?php echo $pts["pts_id"]; ?></td>
                  <td><?php echo $pts["pts_modelo"]; ?></td>
                  <td><?php echo $pts["mar_nombre"]; ?></td>
                  <td>
                    <a href="#" class="editar_proyectores"data-id="<?php echo $pts["pts_id"]; ?>">Editar</a>
                    <a href="#" class="eliminar_proyectores" data-id="<?php echo $pts["pts_id"]; ?>">Eliminar</a></td>
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
                    <label for="serie">serie</label>
                    <input type="text" class="form-control" name="serie" id="serie">
                  </div>
                  <div class="form-group">
                    <label for="mol">Modelo</label>
                    <input type="text" class="form-control" name="mol" id="mol">
                  </div>
                  <div class="form-group">
                <label for="mar">Marca:</label>
                  <select class="form-control" name="mar" id="mar">
                   <option value="0">Seleccionar</option>
                   <option value="60">Epson</option>
                   <option value="61">Panasonic</option>
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
         $("#main").on("click",".editar_proyectores", function(e){
        e.preventDefault();
        change_view("formulario_datos");
        let id=$(this).data("id")
        let obj={
            "accion" : "consultar_proyectores",
            "registro" : $(this).data("id")
        }
         $.post("../includes/funciones.php", obj, function(data){
             $("#serie").val(data.pts_id);
             $("#mol").val(data.pts_modelo);
             $("#mar").val(data.mar_id);
         }, "JSON");
        
        $("#registrar").text("Actualizar").data("edicion", 1).data("registro", id);
    });
         $("#frm_datos").find("input").keyup(function(){
          $(this).removeClass("error");
        });
      $("#registrar").click(function(){

          let serie=$("#serie").val();
        let mol=$("#mol").val();
        let mar=$("#mar").val();

        let obj = {
          "accion" : "insertar_proyectores",
            "serie" : serie,
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
                obj["accion"]="editar_proyectores";
                obj["registro"]=$(this).data("registro");
              $(this).text("Guardar").removeData("edicion").removeData("registro");
             }

          if(serie.length==0 || mol.length==0 || mar.length==0){
              alert("Por favor no dejes campos vacios");

          }else{
              $.post("../includes/funciones.php", obj, function(data){
                  alert(data);
                  change_view(); 
                  mostar_proyectores();
                  $("#frm_datos")[0].reset(); 
                });
          


          }

      });
      $("#main").on("click",".eliminar_proyectores",function(e){
        e.preventDefault();
        let id = $(this).data('id');
        let obj = {
          "accion" : "eliminar_proyectores",
          "proyectores" : id
        }
        $.post("../includes/funciones.php",obj, function(data){
          mostar_proyectores();
        });
      });
      function mostar_proyectores(){
        let obj = {
          "accion" : "mostar_proyectores"
        }

        $.post("../includes/funciones.php",obj, function(data){
          let template = ``;
          $.each(data, function(e,elem){
            template += `
            <tr>
            <td>${elem.pts_id}</td>
            <td>${elem.pts_modelo}</td>
            <td>${elem.mar_nombre}</td>
            <td>
            <a href="#" class="editar_campus"data-id="${elem.pts_id}">Editar</a>
            <a href="#" class="eliminar_campus" data-id="${elem.pts_id}">Eliminar</a></td>
            </tr>ﬂﬂﬂ
            `;
          });
          $("#table_datos tbody").html(template);
        },"JSON");
      }
    </script>
</html>
