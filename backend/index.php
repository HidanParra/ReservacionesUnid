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
    <link rel="icon" type="image/png" sizes="16x16" href="./assets/images/branding_unid/unid-ico.jpg">
    <title>APARTADOS:UNID</title>
    <!-- Custom CSS -->
    <link href="./dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
    <meta HTTP-EQUIV="Pragma" CONTENT="no-cache">
    <meta HTTP-EQUIV="Expires" CONTENT="-1">
</head>

<body>
    <div class="main-wrapper">
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
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <div class="auth-wrapper d-flex no-block justify-content-center align-items-center bg-dark">
            <div class="auth-box bg-dark border-top border-secondary">
               
                   <div id="loginform">
                    <div class="text-center p-t-20 p-b-20">
                        <span class="db"><img style="width: 50%;" src="./assets/images/branding_unid/unid_logo_blank.png" alt="logo" /></span>
                    </div>
                    <!-- Form -->
                    <form class="form-horizontal m-t-20" id="loginform">
                        <div class="row p-b-30">
                            <div class="col-12">
                                <div hidden class="alert alert-danger" id="informationAlert" role="alert">
                                    
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-success text-white" id="basic-addon1"><i class="ti-user"></i></span>
                                    </div>
                                    <input id="inputEmail" type="email" class="form-control form-control-lg" placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1" required="">
                                </div>
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text bg-warning text-white" id="basic-addon2"><i class="ti-pencil"></i></span>
                                    </div>
                                    <input id="inputPassword" type="password" class="form-control form-control-lg" placeholder="Contraseña" aria-label="Password" aria-describedby="basic-addon1" required="">
                                </div>
                            </div>
                        </div>
                        <div class="row border-top border-secondary">
                            <div class="col-12">
                                <div class="form-group">
                                    <div class="p-t-20">
                                        <button class="btn btn-info" id="to-recover" type="button"><i class="fas fa-user-plus m-r-5"></i> Registrarse</button>
                                        <button class="btn btn-success float-right" id="buttonSubmit" type="button">Ingresar</button>                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div id="recoverform">
                    <div class="text-center">
                        <span class="text-white">Llena el formulario para solicitar tu registro.</span>
                    </div>
                    <div class="row m-t-20">
                        <!-- Form -->
                        <form class="col-12">
                            <!-- name -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Nombre" aria-label="name" aria-describedby="basic-addon1">
                            </div>
                            <!-- last name -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="far fa-user"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Apellido" aria-label="lastname" aria-describedby="basic-addon1">
                            </div>
                            <!-- email -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="ti-email"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg" placeholder="Correo Electrónico" aria-label="Username" aria-describedby="basic-addon1">
                            </div>
                            <!-- phone -->
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-danger text-white" id="basic-addon1"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control form-control-lg phone-inputmask" placeholder="Teléfono" aria-label="name" aria-describedby="basic-addon1">
                            </div>

                            <div class="row m-t-20 p-t-20 border-top border-secondary">
                                <div class="col-12">
                                    <a class="btn btn-success" href="#" id="to-login" name="action">Cancelar</a>
                                    <button class="btn btn-info float-right" type="button" name="action">Registrarse</button>                                                                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <button class="btn btn-lg btn-success btn-block" hidden id="buttonOk"><i class="fas fa-check"></i></button>
                <button class="btn btn-lg btn-danger btn-block" hidden id="buttonError"><i class="fas fa-times"></i></button>    
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- Login box.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper scss in scafholding.scss -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Right Sidebar -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- All Required js -->
    <!-- ============================================================== -->
    <script src="./assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="./assets/libs/popper.js/dist/umd/popper.min.js"></script>
    <script src="./assets/libs/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="./data/_validate.js"></script>
    <script src="./assets/libs/inputmask/dist/min/jquery.inputmask.bundle.min.js"></script>
    <script src="./dist/js/pages/mask/mask.init.js"></script>
    <!-- ============================================================== -->
    <!-- This page plugin js -->
    <!-- ============================================================== -->
    <script>
        $('[data-toggle="tooltip"]').tooltip();
        $(".preloader").fadeOut();
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $('#to-login').click(function(){
            
            $("#recoverform").hide();
            $("#loginform").fadeIn();
        });
    </script>

</body>

</html>