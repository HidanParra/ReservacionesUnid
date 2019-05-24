<?php
require_once '../../back-core/session.php';
require_once '../../includes/_db.php';
session_start();
global $db;
if(!isset($_COOKIE['lau'])|| $_COOKIE['lau']==0||$_SESSION['TYPE'] !=3){
    echo "SESSION named is not set!";
    header('Location: ../');
    return false;
    exit();
}else{
    $u_id=$_COOKIE['lau'];
}
?>
<!DOCTYPE html>
<html dir="ltr" lang="es_MX">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/branding_unid/unid-ico.jpg">
    <title>APARTADOS:UNID</title>
    <!-- Custom CSS -->
    <link href="../assets/libs/flot/css/float-chart.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="../assets/extra-libs/multicheck/multicheck.css">
    <link href="../assets/libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">    
    <link rel="stylesheet" type="text/css" href="../assets/libs/select2/dist/css/select2.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/jquery-minicolors/jquery.minicolors.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" type="text/css" href="../assets/libs/quill/dist/quill.snow.css">
    <link href="../assets/libs/jquery-steps/jquery.steps.css" rel="stylesheet">
    <link href="../assets/libs/jquery-steps/steps.css" rel="stylesheet">
    <link href="../assets/libs/clockpicker/css/bootstrap-clockpicker.min.css" rel="stylesheet">
    <link href="../assets/libs/clockpicker/css/jquery-clockpicker.min.css" rel="stylesheet">
    <link href="../dist/css/clockpicker.css" rel="stylesheet">
    <!--<link href="../dist/css/standalone.css" rel="stylesheet">-->


    <!-- Custom CSS -->
    <link href="../dist/css/style.min.css" rel="stylesheet">
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css'> 
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->    
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand">
                        <!-- Logo icon -->
                        <b class="logo-icon p-l-10">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img style="width: 60%;" src="../assets/images/branding_unid/unid-ico.jpg" alt="homepage" class="light-logo" />
                           
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text">
                             <!-- dark Logo text -->
                             <img style="width:60%;" src="../assets/images/branding_unid/unid_logo_blank.png" alt="homepage" class="light-logo" />
                            
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->
                            
                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>                        
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <!--<li class="nav-item search-box"> <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="ti-search"></i></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"> <a class="srh-btn"><i class="ti-close"></i></a>
                            </form>
                        </li>-->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                                                
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../assets/images/users/1.jpg" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <!--<a class="dropdown-item" href="./?mod=2"><i class="ti-user m-r-5 m-l-5"></i> My Profile</a>-->
                                <a class="dropdown-item" href="javascript:void(0)" data-toggle="modal" data-target="#supportModal"><i class="ti-email m-r-5 m-l-5"></i> Soporte</a>
                                <div class="dropdown-divider"></div>                                
                                <a class="dropdown-item" href="javascript:close_session();" ><i class="fa fa-power-off m-r-5 m-l-5"></i> Cerrar sesión</a>                                
                            </div>
                        </li>
                        <!--@click="<?php //$_COOKIE["lau"]=0; ?>" ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav" class="p-t-30">
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./?mod=1" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>
                        
                         <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./?mod=2" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Mi Perfil</span></a></li>
                        <!--<li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link" href="./?mod=2" aria-expanded="false"><i class="fas fa-user-astronaut"></i><span class="hide-menu">Mi perfil</span></a></li>-->
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            
        <?php
            switch ($_GET["mod"]){
                case 1:
                    include ("./dashboard/index.php");
                break;
                case 2:
                    include ("./profile/index.php");
                break;
                
                default:
                    header("Location: ../auth/404.php"); 
                    //include ("./error/index.php");
                break;
            }
        ?>
        <!-- Comments Modal -->
            <div class="modal fade" id="supportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Contacto con soporte</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>                    
                        <form class="form-horizontal">
                            <div class="modal-body">
                                <div hidden class="alert alert-danger" id="informationAlert" role="alert"></div>
                                <div class="card-body">                                                                                                                                                              
                                    <div class="form-group row">
                                        <label for="cono1" class=" control-label col-form-label">Mensaje *</label>
                                        <div class="col-sm-12">
                                            <textarea id="messageSupport" class="form-control"></textarea>
                                        </div>
                                    </div>
                                </div>                            
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>                        
                                <button id="contactSupport" type="button" class="btn btn-primary">Enviar</button>
                            </div>
                        </form>                                        
                    </div>
                </div>
            </div>
            <!-- ============================================================== -->
            <!-- footer -->
            <!-- ============================================================== -->
            <footer class="footer text-center">
                All Rights Reserved &copy;.
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="../assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="../assets/libs/perfect-scrollbar/dist/perfect-scrollbar.jquery.min.js"></script>
    <script src="../assets/extra-libs/sparkline/sparkline.js"></script>
    <!--Wave Effects -->
    <script src="../dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="../dist/js/sidebarmenu.js"></script>
    <!--This page JavaScript -->
    <!-- <script src="../../dist/js/pages/dashboards/dashboard1.js"></script> -->
    <!-- Charts js Files -->
    <script src="../assets/libs/flot/excanvas.js"></script>
    <script src="../assets/libs/flot/jquery.flot.js"></script>
    <script src="../assets/libs/flot/jquery.flot.pie.js"></script>
    <script src="../assets/libs/flot/jquery.flot.time.js"></script>
    <script src="../assets/libs/flot/jquery.flot.stack.js"></script>
    <script src="../assets/libs/flot/jquery.flot.crosshair.js"></script>
    <script src="../assets/libs/flot.tooltip/js/jquery.flot.tooltip.min.js"></script>
    <script src="../dist/js/pages/chart/chart-page-init.js"></script>
    <!-- Tables -->
    <script src="../assets/extra-libs/multicheck/datatable-checkbox-init.js"></script>
    <script src="../assets/extra-libs/multicheck/jquery.multicheck.js"></script>
    <script src="../assets/extra-libs/DataTables/datatables.min.js"></script>    
    <!-- Forms -->
    <script src="../assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="../dist/js/pages/mask/mask.init.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.full.min.js"></script>
    <script src="../assets/libs/select2/dist/js/select2.min.js"></script>
    <script src="../assets/libs/jquery-asColor/dist/jquery-asColor.min.js"></script>
    <script src="../assets/libs/jquery-asGradient/dist/jquery-asGradient.js"></script>
    <script src="../assets/libs/jquery-asColorPicker/dist/jquery-asColorPicker.min.js"></script>
    <script src="../assets/libs/jquery-minicolors/jquery.minicolors.min.js"></script>
    <script src="../assets/libs/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
    <script src="../assets/libs/quill/dist/quill.min.js"></script>
    <script src="../assets/libs/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="../assets/libs/jquery-validation/dist/jquery.validate.min.js"></script>
    <script src="../assets/libs/clockpicker/js/bootstrap-clockpicker.min.js"></script>
    <script src="../assets/libs/clockpicker/js/jquery-clockpicker.min.js"></script>
    <script src="../dist/js/clockpicker.js"></script>
    <!--Custom JavaScript -->
    <script src="../dist/js/custom.min.js"></script>
    <script src="../dist/js/user/_scripts.js"></script>
    <script src="../data/_support.js"></script>

    <script>
mostrar_reservas();
    //Evento para eliminar registro de usuario en base de datos
    function eliminar_reserva(e){                
        let obj = {
          "accion" : "eliminar_reservacion",
          "reservacion" : e
        }
        $.post("../../includes/funciones.php",obj, function(data){
          mostrar_reservas();
        });
    } 

      //Evento para recargar la tabla y mostrar cambios en base de datos
      function mostrar_reservas(){
        let user_id =$("#user_info").data('user');
        let obj = {
          "accion" : "mostrar_reservacion",
          "usuario": user_id
        }
        $.post("../../includes/funciones.php",obj, function(data){
          let template = ``;           
          $.each(data, function(e,elem){
            template += `
            <tr>
                <td>${elem.pac_tipo}</td>
                <td>${elem.pac_fecha}</td>
                <td>${elem.pac_entrada} - ${elem.pac_salida}</td>
                <td>${elem.sls_numero}</td>
                <td>
                    <i style="color:`;
                    if(elem.pac_status=="ACTIVO"){
                        template+=`green`;
                    }else{
                        template+=`red`;
                    }
                    template+=`" class="fas fa-circle status_reserv"></i>                                        
                </td>
                <td>`;
                    if(elem.pac_status=="ACTIVO"){                    
                        template+=`<!--<a href="#" data-id="${elem.pac_id}"><i class="fas fa-cog"></i></a> /--> `;
                    }
                    template+=`<a href="javascript: eliminar_reserva(${elem.pac_id});" id="delete_reserv" class="eliminar_registro" data-id="${elem.pac_id}"><i class="fas fa-trash"></i></a>
                </td>
            </tr>   
            `;
          });
          $("#zero_config tbody").html(template);
        },"JSON");
      }
      function close_session(){
          let obj={
              "accion": "close_session"
          }
          $.post("../../includes/funciones.php",obj, function(data){
            location.href="../";
          });
 
      }
</script>

</body>

</html>