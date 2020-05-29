<script type="text/javascript" src="../js/medico.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">MANTENIMIENTO DE MEDICOS</h3>

            <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
            </div>
            <!-- /.box-tools -->
        </div>
        <!-- /.box-header -->
        <form onsubmit="return false" autocomplete="false">
            <div class="box-body">
                <div class="form-group">
                    <div class="col-lg-10">
                        <div class="input-group">
                            <input type="text" class="global_filter form-control" id="global_filter"
                                placeholder="Ingresar dato a buscar">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    <div class="col-lg-2">
                        <button class="btn btn-danger" style="width:100%" onclick="AbrirModalRegistro()"><i
                                class="glyphicon glyphicon-plus"></i>Nuevo Registro</button>
                    </div>
                </div>
                <table id="tablamedico" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Sexo</th>
                            <th>Dni</th>
                            <th>Colegiatura</th>
                            <th>Especialidad</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Sexo</th>
                            <th>Dni</th>
                            <th>Colegiatura</th>
                            <th>Especialidad</th>
                            <th>Estatus</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
    </div>
</div>
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_registro" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;"><b>Registro De Medico</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-6">
                        <label for="">DNI</label>
                        <input type="text" class="form-control" id="txt_dni" placeholder="Ingrese DNI" maxlength="8" onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_nombre" placeholder="Ingrese Nombre" maxlength="250" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Paterno</label>
                        <input type="text" class="form-control" id="txt_apepa" placeholder="Ingrese Apellido Paterno" maxlength="250" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Materno</label>
                        <input type="text" class="form-control" id="txt_apema" placeholder="Ingrese Apellido Materno" maxlength="250" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" id="txt_dir" placeholder="Ingrese Dirección" maxlength="250"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" id="txt_telefono" placeholder="Ingrese Telefono" maxlength="12" onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state" id="cbm_sexo" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Colegiatura</label>
                        <input type="text" class="form-control" id="txt_colegio" placeholder="Ingrese Colegiatura" maxlength="5" ><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Especialidad</label>
                        <select class="js-example-basic-single" name="state" id="cbm_especialidad" style="width:100%;">
                        </select><br><br>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="">Estatus</label>
                        <select class="js-example-basic-single" name="state" id="cbm_estatus" style="width:100%;">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Registrar_Medico()"><i
                            class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title" style="text-align:center;"><b>Actualizar Medico</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-6">
                        <label for="">DNI</label>
                        <input type="text" id="txtmedico" hidden>
                        <input type="text" class="form-control" id="txt_dni_editar" placeholder="Ingrese DNI" maxlength="8" onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Nombre</label>
                        <input type="text" class="form-control" id="txt_nombre_editar" placeholder="Ingrese Nombre" maxlength="250" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Paterno</label>
                        <input type="text" class="form-control" id="txt_apepa_editar" placeholder="Ingrese Apellido Paterno" maxlength="250" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Apellido Materno</label>
                        <input type="text" class="form-control" id="txt_apema_editar" placeholder="Ingrese Apellido Materno" maxlength="250" onkeypress="return soloLetras(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Dirección</label>
                        <input type="text" class="form-control" id="txt_dir_editar" placeholder="Ingrese Dirección" maxlength="250"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Telefono</label>
                        <input type="text" class="form-control" id="txt_telefono_editar" placeholder="Ingrese Telefono" maxlength="12" onkeypress="return soloNumeros(event)"><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Sexo</label>
                        <select class="js-example-basic-single" name="state" id="cbm_sexo_editar" style="width:100%;">
                            <option value="M">MASCULINO</option>
                            <option value="F">FEMENINO</option>
                        </select><br><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Colegiatura</label>
                        <input type="text" class="form-control" id="txt_colegio_editar" placeholder="Ingrese Colegiatura" maxlength="5" ><br>
                    </div>
                    <div class="col-lg-6">
                        <label for="">Especialidad</label>
                        <select class="js-example-basic-single" name="state" id="edit" style="width:100%;">
                        </select><br><br>
                    </div>
                    
                    <div class="col-lg-6">
                        <label for="">Estatus</label>
                        <select class="js-example-basic-single" name="state" id="cbm_estatus_editar" style="width:100%;">
                            <option value="ACTIVO">ACTIVO</option>
                            <option value="INACTIVO">INACTIVO</option>
                        </select><br><br>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Modificar_Medico()"><i
                            class="fa fa-check"><b>&nbsp;Registrar</b></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"><b>&nbsp;Cerrar</b></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        listar_medico(); 
        $('.js-example-basic-single').select2();
        listar_combo_especialidad();
        $("#modal_registro").on('shown.bs.modal', function() {
            $("#txt_dni").focus();
        })
    });

</script>