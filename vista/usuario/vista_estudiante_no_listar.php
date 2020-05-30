<script type="text/javascript" src="../js/estudiante.js?rev=<?php echo time();?>"></script>
<div class="col-md-12">
    <div class="box box-warning box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">ESTUDIANTES NO ATENDIDOS</h3>

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
                    <div class="col-lg-12">
                        <div class="input-group">
                            <input type="text" class="global_filter form-control" id="global_filter"
                                placeholder="Ingresar dato a buscar">
                            <span class="input-group-addon"><i class="fa fa-search"></i></span>
                        </div>
                    </div>
                    
                </div>
                <table id="tabla_est" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Resultados</th>
                            <th>Atendido</th>
                            <th>Cod. alumno</th>
                            <th>Nombres</th>
                            <th>Dni</th>
                            <th>Telefono</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Resultados</th>
                            <th>Atendido</th>
                            <th>Cod. alumno</th>
                            <th>Nombres</th>
                            <th>Dni</th>
                            <th>Telefono</th>
                            <th>Acci&oacute;n</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </form>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_cancelar" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header" style="text-align:center">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Marcar estudiante como no atendido.</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        
                        <label for=""> (*) Con este procedimiento el alumno volvera estad <b>NO ATENDIDO</b></label> <br>
                        <input type="text" hidden id="txtid_editar" >
                        
                    </div>
                   
                    <div class="col-lg-12">
                        <label  for=""> Estudiante:</label>
                        <input disabled id = "nombre" type="text" class="form-control" id = "cod" placeholder="Ingrese usuario"><br>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Atender_Estudiante_No()"><i
                            class="fa fa-check"><b>&nbsp;Atender</b></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"><b>&nbsp;Cancelar</b></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<form autocomplete="false" onsubmit="return false">
    <div class="modal fade" id="modal_editar" role="dialog">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title"><b>Atender Alumno.</b></h4>
                </div>
                <div class="modal-body">
                    <div class="col-lg-12">
                        
                        <label for=""> (*) este proceso se realiza una vez dada, la respectiva atención medica</label> <br>
                        <input type="text" hidden id="txtid" >
                        
                    </div>
                    <div class="col-lg-12">
                        <label  for=""> Telefono:</label>
                        <input disabled type="text" class="form-control" id = "tel" placeholder="Ingrese usuario"><br>
                    </div>
                    <div class="col-lg-12">
                        <label  for=""> Cod:</label>
                        <input disabled type="text" class="form-control" id = "cod" placeholder="Ingrese usuario"><br>
                        
                    </div>
                    <div class="col-lg-12">
                        <label  for=""> Nombres:</label>
                        <input disabled id = "nombre" type="text" class="form-control" id = "cod" placeholder="Ingrese usuario"><br>
                    </div>
                    
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" onclick="Atender_Estudiante()"><i
                            class="fa fa-check"><b>&nbsp;Atender</b></i></button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                            class="fa fa-close"><b>&nbsp;Cancelar</b></i></button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>
    $(document).ready(function() {
        listar_estudiante_no();
        $('.js-example-basic-single').select2();
        listar_combo_rol();
        $("#modal_registro").on('shown.bs.modal', function() {
            $("#txt_usu").focus();
        })
    });

    document.getElementById('txt_email').addEventListener('input', function() {
        campo = event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (emailRegex.test(campo.value)) {
            $(this).css("border","");
            $("#OkEmail").html("");
            $("#validar_email").val("correcto");
        }else{
            $(this).css("border","1px solid red ");
            $("#OkEmail").html("Email formato incorrecto");
            $("#validar_email").val("incorrecto");
        }
    });
    //validacion de editar
    document.getElementById('txt_email_editar').addEventListener('input', function() {
        campo = event.target;
        emailRegex = /^[-\w.%+]{1,64}@(?:[A-Z0-9-]{1,63}\.){1,125}[A-Z]{2,63}$/i;
        if (emailRegex.test(campo.value)) {
            $(this).css("border","");
            $("#OkEmail_editar").html("");
            $("#validar_email_editar").val("correcto");
        }else{
            $(this).css("border","1px solid red ");
            $("#OkEmail_editar").html("Email formato incorrecto");
            $("#validar_email_editar").val("incorrecto");
        }
    });

</script>