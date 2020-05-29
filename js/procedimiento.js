function VerificarUsuario() {
    var usu = $("#txt_usu").val();
    var con = $("#txt_con").val();

    if (usu.length == 0 || con.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    $.ajax({
        url: '../controlador/usuario/controlador_verificar_usuario.php',
        type: 'POST',
        data: {
            user: usu,
            pass: con
        }
    }).done(function (resp) {
        if (resp == 0) {
            $.ajax({
                url:'../controlador/usuario/controlador_intento_modificar.php',
                type:'POST',
                data:{
                    usuario:usu
                }
            }).done(function (resp) {
                if (resp==2) {
                    return Swal.fire("Mensaje De Advertencia", "Usuario y/o contrase\u00f1a incorrecta, Intentos fallidos: " + (parseInt(resp)+1) + " - para poder acceder a su cuenta restablesca la contrase&#241;a ", "warning");
                }else{
                    return Swal.fire("Mensaje De Advertencia", "Usuario y/o contrase\u00f1a incorrecta, Intentos fallidos: " + (parseInt(resp)+1) + " ", "warning");
                }  
            })
        } else {
            var data = JSON.parse(resp);
            if (data[0][5] === 'INACTIVO') {
                return Swal.fire("Mensaje De Advertencia", "Lo sentimos el usuario " + usu + " se encuentra suspendido, comuniquese con el administrador", "warning");
            }
            if (data[0][7] == 2) {
                return Swal.fire("Mensaje De Advertencia", "Lo sentimos su cuenta  esta bosqueada, restablesca su contrase\u00f1a", "warning");
            }
            $.ajax({
                url: '../controlador/usuario/controlador_crear_session.php',
                type: 'POST',
                data: {
                    idusuario: data[0][0],
                    user: data[0][1],
                    rol: data[0][6]
                }
            }).done(function (resp) {
                let timerInterval
                Swal.fire({
                    title: 'BIENVENIDO AL SISTEMA',
                    html: 'Usted sera redireccionado en <b></b> milisegundos.',
                    timer: 2000,
                    timerProgressBar: true,
                    onBeforeOpen: () => {
                        Swal.showLoading()
                        timerInterval = setInterval(() => {
                            const content = Swal.getContent()
                            if (content) {
                                const b = content.querySelector('b')
                                if (b) {
                                    b.textContent = Swal.getTimerLeft()
                                }
                            }
                        }, 100)
                    },
                    onClose: () => {
                        clearInterval(timerInterval)
                    }
                }).then((result) => {
                    /* Read more about handling dismissals below */
                    if (result.dismiss === Swal.DismissReason.timer) {
                        location.reload();
                    }
                })
            })

        }
    })
}
var tableprocedimiento;
function listar_procedimiento() {
        tableprocedimiento = $("#tabla_procedimiento").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 20,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/procedimiento/controlador_procedimiento_listar.php",
            type: 'POST'
        },
        "order":[[1,'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "procedimiento_nombre" },
            { "data": "procedimiento_fecregistro" },
            {
                "data": "procedimiento_estatus",
                render: function (data, type, row) {
                    if (data == 'ACTIVO') {
                        return "<span class='label label-success'>" + data + "</span>";
                    } else {
                        return "<span class='label label-danger'>" + data + "</span>";
                    }
                }
            },
            { "defaultContent": "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-edit'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-trash'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='activar btn btn-success'><i class='fa fa-check'></i></button>" }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_procedimiento_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    //codigo para el contador de numero de registros
    tableprocedimiento.on( 'draw.dt', function () {
        var PageInfo = $('#tabla_procedimiento').DataTable().page.info();
        tableprocedimiento.column(0, { page: 'current' }).nodes().each( function (cell, i) {
                cell.innerHTML = i + 1 + PageInfo.start;
            } );
    } );
}

$('#tabla_procedimiento').on('click', '.activar', function () {
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

$('#tabla_procedimiento').on('click', '.desactivar', function () {
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

$('#tabla_procedimiento').on('click', '.editar', function () {
    var data = tableprocedimiento.row($(this).parents('tr')).data();
    if (tableprocedimiento.row(this).child.isShown()) {
        var data = tableprocedimiento.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txtidprocedimiento").val(data.procedimiento_id);
    $("#txt_procedimiento_editar").val(data.procedimiento_nombre);
    $("#cbm_estatus_editar").val(data.procedimiento_estatus).trigger("change"); 
})

function Modificar_Estatus(idusuario, estatus) {
    var mensaje = "";
    if (estatus == 'INACTIVO') {
        mensaje = "desactivo";
    } else {
        mensaje = "activo";
    }
    $.ajax({
        "url": "../controlador/usuario/controlador_modificar_estatus_usuario.php",
        type: 'POST',
        data: {
            idusuario: idusuario,
            estatus: estatus
        }
    }).done(function (resp) {
        if (resp > 0) {
            Swal.fire("Mensaje De Confirmacion", "El usuario se " + mensaje + " con exito", "success")
                .then((value) => {
                    table.ajax.reload();
                });
        }
    })


}

function filterGlobal() {
    $('#tabla_procedimiento').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function AbrirModalRegistro() {
    $("#modal_registro").modal({ backdrop: 'static', keyboard: false })
    $("#modal_registro").modal('show');
}

function listar_combo_rol() {
    $.ajax({
        "url": "../controlador/usuario/controlador_combo_rol_listar.php",
        type: 'POST'
    }).done(function (resp) {
        var data = JSON.parse(resp);
        var cadena = "";
        if (data.length > 0) {
            for (var i = 0; i < data.length; i++) {
                cadena += "<option value='" + data[i][0] + "'>" + data[i][1] + "</option>";
            }
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        } else {
            cadena += "<option value=''>NO SE ENCONTRARON REGISTROS</option>";
            $("#cbm_rol").html(cadena);
            $("#cbm_rol_editar").html(cadena);
        }
    })
}

function Registrar_Procedimiento() {
    var procedimiento = $("#txt_procedimiento").val();
    var estatus = $("#cbm_estatus").val();
    
    if (procedimiento.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    $.ajax({
        url: "../controlador/procedimiento/controlador_procedimiento_registro.php",
        type: 'POST',
        data: {
            procedimiento: procedimiento,
            estatus: estatus
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide');//cerrar modal 
                Swal.fire("Mensaje De Confirmacion", "Datos correctamente, Nuevo Procedimiento Registrado", "success")
                    .then((value) => {
                        LimpiarRegistro();
                        listar_procedimiento();
                        tableprocedimiento.ajax.reload();
                    });
            } else {
                return Swal.fire("Mensaje De Advertencia", "Lo sentimos, el nombre del Procedimiento ya se encuentra en nuestra base de datos", "warning");
            }
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar el registro", "error");
        }
    })


}

function Modificar_Procedimiento() {
   var procedimientoid = $("#txtidprocedimiento").val();
   var procedimiento = $("#txt_procedimiento_editar").val();
   var estatus = $("#cbm_estatus_editar").val();

    if (procedimiento.length == 0 || estatus.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/procedimiento/controlador_procedimiento_modificar.php",
        type: 'POST',
        data: {
            procedimientoid: procedimientoid,
            procedimiento: procedimiento,
            estatus: estatus
        }
    }).done(function (resp) {
        if (resp > 0) {
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Datos actualizados correctamente.", "success")
                .then((value) => {
                    listar_procedimiento();
                    tableprocedimiento.ajax.reload();
                    TraerDatosUsuario();
                });
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar la actualización", "error");
        }
    })
}

function LimpiarRegistro() {
    $("#txt_usu").val("");
    $("#txt_con1").val("");
    $("#txt_con2").val("");
}

function TraerDatosUsuario() {
    var usuario = $("#usuarioprincipal").val();
    $.ajax({
        "url": "../controlador/usuario/controlador_traerdatos_usuario.php",
        type: 'POST',
        data: {
            usuario: usuario
        }

    }).done(function (resp) {
        var data = JSON.parse(resp);
        if (data.length > 0) {
            $("#txtcontra_bd").val(data[0][2]);
            if (data[0][3] == "M") {
                $("#img_nav").attr("src", "../Plantilla/dist/img/doctor.JPG");
                $("#img_subnav").attr("src", "../Plantilla/dist/img/doctor.jpg");
                $("#img_lateral").attr("src", "../Plantilla/dist/img/doctor.jpg");
            } else {
                $("#img_nav").attr("src", "../Plantilla/dist/img/doctora.JPG");
                $("#img_subnav").attr("src", "../Plantilla/dist/img/doctora.jpg");
                $("#img_lateral").attr("src", "../Plantilla/dist/img/doctora.jpg");
            }

        }
    })
}

function AbrirModalEditarContra() {
    $("#modal_editar_contra").modal({ backdrop: 'static', keyboard: false });
    $("#modal_editar_contra").modal('show');
    $("#modal_editar_contra").on('shown.bs.modal', function () {
        $("#txtcontraactual_editar").focus();
    })
}

function Editar_Contra() {
    var idusuario = $("#txtidprincipal").val();
    var contrabd = $("#txtcontra_bd").val();
    var contraescrita = $("#txtcontraactual_editar").val();
    var contranu = $("#txtcontranun_editar").val();
    var contrare = $("#txtcontrare_editar").val();

    if (contraescrita.length == 0 || contranu.length == 0 || contrare.length == 0) {
        return Swal.fire("Mensaje de adevertencia", "LLena los campos vacios", "warning");
    }
    if (contranu = !contrare) {
        return Swal.fire("Mensaje de adevertencia", "La contraseña repetida no coencide", "warning");
    }

    $.ajax({
        url: '../controlador/usuario/controlador_contra_modificar.php',
        type: 'POST',
        data: {
            idusuario: idusuario,
            contrabd: contrabd,
            contraescrita: contraescrita,
            contranu: contranu
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                LimpiarEditarContra();
                $("#modal_editar_contra").modal('hide');
                Swal.fire("Mensaje De Confirmacion", "contra\u00f1a actualizada con exito", "success")
                    .then((value) => {
                        TraerDatosUsuario();
                    });
            } else {
                Swal.fire("Mensaje de Error", "No se pudo actualizar la contra\u00f1a, la nueva contra\u00f1a ingresada no coencide con la que tenemos en base de datos", "error");
            }
        } else {
            Swal.fire("Mensaje de Error", "No se pudo actualizar la contrase\u00f1a", "error");
        }
    })
}
function LimpiarEditarContra() {
    $("#txtcontraactual_editar").val("");
    $("#txtcontra_editar").val("");
    $("#txtcontrare_editar").val("");
}

function AbrirModalRestablecer(){
    $("#modal_restablecer_contra").modal({ backdrop: 'static', keyboard: false });
    $("#modal_restablecer_contra").modal('show');
    $("#modal_restablecer_contra").on('shown.bs.modal', function () {
        $("#txt_email").focus();
    });
}

function Restablecer_Contra(){
    var email = $("#txt_email").val();
    if (email.length==0) {
        return Swal.fire("Mensaje De Advertencia", "Ingrese Email", "warning");
    }
    var caracteres = "abcdefrwrkdjshjsfhjsfhsREABCDQWERTY12344465!#$%$&=";
    var contrasena="";
    for (let i = 0; i < 6; i++) {
        contrasena += caracteres.charAt(Math.floor(Math.random()*caracteres.length));    
    }
    $.ajax({
        url:"../controlador/usuario/controlador_restablecer_contra.php",
        type:'POST',
        data:{
            email:email,
            contrasena:contrasena
        }
    }).done(function(resp){
        if (resp>0) {
            if (resp==1) {
                Swal.fire("Mensaje De Confirmaci&#241;n", "su contraseña fue restablecida con exito al correo " + email + "", "success")
            }else{
                Swal.fire("Mensaje de advertencia ", "no se encuentra el correo <b>" + email + "</b> en nuestra data", "warning")
            }
        } else {
            Swal.fire("Mensaje De Error", 'no se pudo restablecer su contrase&#241;a', "error");
        }
    })

}