<!-- ============================================================== -->
<!-- Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 d-flex no-block align-items-center">
            <h4 id="user_info" class="page-title" data-user="<?php echo $u_id ?>">Jair Enrique Gomez Rodriguez 22 <small>(Docente)</small></h4>
            <!--<div class="ml-auto text-right">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Library</li>
                    </ol>
                </nav>
            </div>-->
        </div>
    </div>
</div>
<!-- ============================================================== -->
<!-- End Bread crumb and right sidebar toggle -->
<!-- ============================================================== -->
<!-- ============================================================== -->
<!-- Container fluid  -->
<!-- ============================================================== -->
<div class="container-fluid">
    <!-- ============================================================== -->
    <!-- Sales Cards  -->
    <!-- ============================================================== -->
    <div class="row">
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a href="./?mod=2" class="card card-hover" data-toggle="modal" data-target="#reservationModal" data-whatever="Reserva de proyector" data-type="proyector">
                <div class="box bg-cyan text-center">
                    <h1 class="font-light text-white"><i class="fas fa-chart-line"></i></h1>
                    <h6 class="text-white">Reservar Proyector</h6>
                </div>
            </a>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a class="card card-hover" data-toggle="modal" data-target="#reservationModal" data-whatever="Reserva de auditorio" data-type="auditorio">
                <div class="box bg-success text-center">
                    <h1 class="font-light text-white"><i class="fas fa-chalkboard-teacher"></i></h1>
                    <h6 class="text-white">Reservar Auditorio</h6>
                </div>
            </a>
        </div>
            <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a class="card card-hover" data-toggle="modal" data-target="#reservationModal" data-whatever="Reserva de cabina de radio" data-type="cabina">
                <div class="box bg-warning text-center">
                    <h1 class="font-light text-white"><i class="fas fa-microphone-alt"></i></h1>
                    <h6 class="text-white">Reservar cabina de radio</h6>
                </div>
            </a>
        </div>
        <!-- Column -->
        <div class="col-md-6 col-lg-3 col-xlg-3">
            <a class="card card-hover" data-toggle="modal" data-target="#reservationModal" data-whatever="Reserva de otros recursos" data-type="otros">
                <div class="box bg-danger text-center">
                    <h1 class="font-light text-white"><i class="mdi mdi-border-outside"></i></h1>
                    <h6 class="text-white">Reservar otros</h6>
                </div>
            </a>
        </div>                                        
    </div>

    <!-- ============================================================== -->
    <!-- Start Page Content -->
    <!-- ============================================================== -->
    <div class="row">
        <div class="col-12">                        
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Tus reservas</h5>
                    <div class="table-responsive">
                        <table id="zero_config" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Fecha</th>
                                    <th>Horario <sup>(24)</sup> </th>
                                    <th>Salon</th>
                                    <th>Status</th>
                                    <th>Cancelar</th>
                                </tr>
                            </thead>
                            <tbody style="text-align:center;">
                                                                                     
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Tipo</th>
                                    <th>Fecha</th>
                                    <th>Horario <sup>(24)</sup> </th>
                                    <th>Salon</th>
                                    <th>Status</th>
                                    <th>Cancelar</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- End PAge Content -->
    <!-- ============================================================== -->

    <!-- ============================================================== -->
    <!-- Start Modal Content -->
    <!-- ============================================================== -->

    <div class="modal fade bd-example-modal-lg" data-target=".bd-example-modal-lg" id="reservationModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="reservationModalLabel"></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="card">
                    <div class="card-body wizard-content">                        
                        <h6 class="card-subtitle"></h6>
                        <form id="example-form" action="#" class="m-t-40">
                            <div>
                                <h3>Tipo de reserva</h3>
                                <section>
                                    
                                    <label for="typeReserve">Seleccione una opción *</label>
                                    <select id="typeReserve" class="select2 form-control custom-select required" style="width: 100%; height:36px;">
                                        <option disabled>Reservar por: </option>                                            
                                        <option value="1">Dia</option>
                                        <option value="2">Temporada</option>                                            
                                    </select>
                                    <p>(*) Obligatorio</p>
                                </section>
                                <h3>Dias</h3>
                                <section>
                                    <label for="week">Seleccione los dias de la semana que desea reservar *</label>
                                    <select id="week" class="select2 form-control m-t-15 required" multiple="multiple" style="height: 36px;width: 100%;" placeholder="Lunes, Martes, etc...">                                        
                                        <optgroup label="Dias de la semana">
                                            <option value="mon" selected>LUNES</option>
                                            <option value="tue">MARTES</option>
                                            <option value="wed">MIÉRCOLES</option>
                                            <option value="thu">JUEVES</option>
                                            <option value="fri">VIERNES</option>
                                            <option value="sat">SÁBADO</option>
                                        </optgroup>                                        
                                    </select>
                                    <p>(*) Obligatorio</p>                                  
                                </section>
                                <h3>Horas</h3>
                                <section>
                                    <div>
                                        <div>
                                            <h3>Lunes</h3>
                                        </div>
                                        <div class="row">                                        
                                            <div class="col-md-3">
                                                <h5>Hora de inicio *</h5>
                                                <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                    <input for="startHour" type="text" class="form-control" value="07:00">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Hora de finalización *</h5>
                                                <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                    <input for="finishHour" type="text" class="form-control" value="09:00">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                        <div>
                                            <div class="border-top">
                                                <div class="card-body">                                            
                                                    <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i> Agregar horario</button>
                                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Borrar</button>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>   
                                    <div>
                                        <div>
                                            <h3>Martes</h3>
                                        </div>
                                        <div class="row">                                        
                                            <div class="col-md-3">
                                                <h5>Hora de inicio</h5>
                                                <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                    <input for="startHour" type="text" class="form-control" value="07:00">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>Hora de finalización</h5>
                                                <div class="input-group clockpicker" data-placement="left" data-align="top" data-autoclose="true">
                                                    <input for="finishHour" type="text" class="form-control" value="09:00">
                                                    <span class="input-group-addon">
                                                        <span class="glyphicon glyphicon-time"></span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> 
                                        <div>
                                            <div class="border-top">
                                                <div class="card-body">                                            
                                                    <button type="submit" class="btn btn-info"><i class="fas fa-plus"></i> Agregar horario</button>
                                                    <button type="submit" class="btn btn-danger"> <i class="fas fa-trash"></i> Borrar</button>
                                                </div>
                                            </div>
                                        </div> 
                                    </div>  
                                    <p>(*) Obligatorio</p>                                                                    
                                </section>
                                <h3>Fechas</h3>
                                <section>
                                    <div>                                        
                                        <div class="row">                                        
                                            <div class="col-md-4 offset-md-2">
                                                <h5>Fecha de inicio *</h5>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <h5>Fecha de finalización *</h5>
                                                <div class="input-group">
                                                    <input type="text" class="form-control" id="datepicker-autoclose" placeholder="mm/dd/yyyy">
                                                    <div class="input-group-append">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                                          
                                    </div>
                                    <p>(*) Obligatorio</p>
                                </section>
                                <h3>Datos personales</h3>
                                <section>
                                    <div>
                                        <div class="card-body">                                            
                                            <div class="form-group row">
                                                <label for="fname" class="col-sm-3 text-right control-label col-form-label">Nombres *</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="fname" placeholder="First Name Here">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="lname" class="col-sm-3 text-right control-label col-form-label">Apellidos *</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control" id="lname" placeholder="Last Name Here">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class=" col-sm-3 text-right control-label col-form-label">Teléfono *</label>
                                                <div class="col-sm-6">
                                                    <input type="text" class="form-control phone-inputmask" id="phone-mask" placeholder="(999) 999-9999">
                                                </div>
                                            </div>                                                                                        
                                        </div>
                                    </div>
                                    <p>(*) Obligatorio</p>
                                </section>
                            </div>
                        </form>
                    </div>
                </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" disabled>Reservar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== --> 
    <!-- End Modal Content -->
    <!-- ============================================================== -->
    
    
</div>
<!-- ============================================================== -->
<!-- End Container fluid  -->
<!-- ============================================================== -->
