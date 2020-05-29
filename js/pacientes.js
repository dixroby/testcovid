var tablepacientes;
function listar_pacientes() {
    tablepacientes = $("#tabla_pacientes").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 20,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/pacientes/controlador_pacientes_listar.php",
            type: 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "paciente_nombre" },
            { "data": "apellidos" },
            { "data": "paciente_direccion" },
            { "data": "paciente_movil" },
            { "data": "paciente_sexo" },
            { "data": "paciente_nrodocumento" },
            {
                "data": "paciente_estatus",
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    } else if(data == 'INACTIVO') {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }else{
                        return "<span class='label label-balck' style='background-color:black;'>" + data + "</span>";
                    }
                    
                }
            },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-trash'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_pacientes_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    //codigo para el contador de numero de registros
    tablepacientes.on('draw.dt', function () {
        var PageInfo = $('#tabla_pacientes').DataTable().page.info();
        tablepacientes.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

$('#tabla_pacientes').on('click', '.activar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de activar al usuario?',
        text: "Una vez hecho esto el usuario  tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id, 'ACTIVO');
        }
    })
})

$('#tabla_pacientes').on('click', '.desactivar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    Swal.fire({
        title: 'Esta seguro de desactivar al usuario?',
        text: "Una vez hecho esto el usuario no tendra acceso al sistema",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Si'
    }).then((result) => {
        if (result.value) {
            Modificar_Estatus(data.usu_id, 'INACTIVO');
        }
    })
})

$('#tabla_pacientes').on('click', '.editar', function () {
    var data = tablepacientes.row($(this).parents('tr')).data();
    if (tablepacientes.row(this).child.isShown()) {
        var data = tablepacientes.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txtidinsumo").val(data.paciente_id  );
    $("#txt_dni_editar").val(data.paciente_nrodocumento);
    $("#txt_nombre_editar").val(data.paciente_nombre );
    $("#txt_apepa_editar").val(data.paciente_apepat);
    $("#txt_apema_editar").val(data.paciente_apemat);
    $("#txt_dir_editar").val(data.paciente_direccion);
    $("#txt_telefono_editar").val(data.paciente_movil);
    $("#cbm_sexo_editar").val(data.paciente_sexo).trigger("change");
    $("#cbm_estatus_editar").val(data.paciente_estatus).trigger("change");
})

function filterGlobal() {
    $('#tabla_pacientes').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function Registrar_Paciente() {
    var nombre = $("#txt_nombre").val();
    var appat = $("#txt_apepa").val();
    var apmat = $("#txt_apema").val();
    var direccion = $("#txt_dir").val();
    var dni = $("#txt_dni").val();
    var telefono = $("#txt_telefono").val();
    var sexo = $("#cbm_sexo").val();
    var estatus = $("#cbm_estatus").val();

    if (nombre.length == 0 || appat.length==0 || apmat.length==0|| dni.length==0 ) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/pacientes/controlador_pacientes_registro.php",
        type: 'POST',
        data: {
            nombre: nombre,
            appat: appat,
            apmat: apmat,
            direccion: direccion,
            telefono: telefono,
            sexo: sexo,
            dni: dni,
            estatus: estatus,
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                
                tablepacientes.ajax.reload();
                $("#modal_registro").modal('hide');
                Swal.fire("Mensaje De Confirmacion", "Datos correctamente, Nuevo Paciente Registrado", "success")
                    .then((value) => {
                        LimpiarRegistro();
                    });
            } else {
                return Swal.fire("Mensaje De Advertencia", "Lo sentimos, el Paciente ya se encuentra en registrada en nuestra base de datos", "warning");
            }
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar el registro", "error");
        }
    })
}

function LimpiarRegistro() {
    $("#txt_nombre").val("");
    $("#txt_apepa").val("");
    $("#txt_apema").val("");
    $("#txt_dir").val("");
    $("#txt_dni").val("");
    $("#txt_telefono").val("");
}
 
function Modificar_Paciente() {
   var id = $("#txtidinsumo").val();
   var nombre = $("#txt_nombre_editar").val();
    var appat = $("#txt_apepa_editar").val();
    var apmat = $("#txt_apema_editar").val();
    var direccion = $("#txt_dir_editar").val();
    var dni = $("#txt_dni_editar").val();
    var telefono = $("#txt_telefono_editar").val();
    var sexo = $("#cbm_sexo_editar").val();
    var estatus = $("#cbm_estatus_editar").val();

    if (nombre.length == 0 || appat.length == 0|| apmat.length == 0|| dni.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        url: "../controlador/pacientes/controlador_pacientes_modificar.php",
        type: 'POST',
        data: {
            id:id,
            nombre: nombre,
            appat: appat,
            apmat: apmat,
            direccion: direccion,
            dni: dni,
            telefono: telefono,
            sexo: sexo,
            estatus: estatus
        }
    }).done(function (resp) {
        if (resp > 0) {
            tablepacientes.ajax.reload();
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Datos actualizados correctamente.", "success")
                .then((value) => {
                    listar_pacientes();
                    tablepacientes.ajax.reload();
                });
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar la actualización", "error");
        }
    })
}

function soloNumeros(e){
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8){
        return true;
    }
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    tecla_final = String.fromCharCode(tecla);
    return patron.test(tecla_final);
}
function soloLetras(e){
    key = e.keyCode || e.which;
    tecla = String.fromCharCode(key).toLowerCase();
    letras = "áéíóúabcdefghijklmnñopqrstuvwxyz";
    especiales = "8-37-39-46";
    tecla_especial = false
    for(var i in especiales){
        if(key == especiales[i]){
            tecla_especial = true;
            break;
        }
    }
    if(letras.indexOf(tecla)==-1 && !tecla_especial){
        return false;
    }
}