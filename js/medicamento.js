var tablemedicamento;
function listar_medicamento() {
    tablemedicamento = $("#tabla_medicamento").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 20,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/medicamento/controlador_medicamento_listar.php",
            type: 'POST'
        },
        "order": [[1, 'asc']],
        "columns": [
            { "defaultContent": "" },
            { "data": "medicamento_nombre" },
            { "data": "medicamento_alias" },
            { "data": "medicamento_stock" },
            { "data": "medicamento_fregistro" },
            {
                "data": "medicamento_estatus",
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
    document.getElementById("tabla_medicamento_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    //codigo para el contador de numero de registros
    tablemedicamento.on('draw.dt', function () {
        var PageInfo = $('#tabla_medicamento').DataTable().page.info();
        tablemedicamento.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });
}

$('#tabla_medicamento').on('click', '.activar', function () {
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

$('#tabla_medicamento').on('click', '.desactivar', function () {
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

$('#tabla_medicamento').on('click', '.editar', function () {
    var data = tablemedicamento.row($(this).parents('tr')).data();
    if (tablemedicamento.row(this).child.isShown()) {
        var data = tablemedicamento.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txtidmedicamento").val(data.medicamento_id  );
    $("#txt_medicamento_editar").val(data.medicamento_nombre);
    $("#txt_medicamentoalias_editar").val(data.medicamento_alias);
    $("#txt_stock_editar").val(data.medicamento_stock);
    $("#cbm_estatus_editar").val(data.medicamento_estatus).trigger("change");
})

function filterGlobal() {
    $('#tabla_medicamento').DataTable().search(
        $('#global_filter').val(),
    ).draw();
}

function Registrar_Medicamento() {
    var nombre = $("#txt_medicamento").val();
    var alias = $("#txt_medicamentoalias").val();
    var stock = $("#txt_stock").val();
    var status = $("#cbm_estatus").val();
    if (nombre.length == 0 || stock.length==0 ) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    $.ajax({
        "url": "../controlador/medicamento/controlador_medicamento_registro.php",
        type: 'POST',
        data: {
            nombre:nombre,
            alias:alias,
            stock: stock,
            status:status
        }
    }).done(function (resp) {
        if (resp > 0) {
            if (resp == 1) {
                $("#modal_registro").modal('hide');
                Swal.fire("Mensaje De Confirmacion", "Datos correctamente, Nuevo Medicamento Registrado", "success")
                    .then((value) => {
                        LimpiarRegistro();
                        tablemedicamento.ajax.reload();
                    });
            } else {
                return Swal.fire("Mensaje De Advertencia", "Lo sentimos, el medicamento ya se encuentra en registrada en nuestra base de datos", "warning");
            }
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar el registro", "error");
        }
    })
}

function LimpiarRegistro() {
    $("#txt_medicamento").val("");
    $("#txt_medicamentoalias").val("");
    $("#txt_stock").val("");
    $("#cbm_estatus").val("");
}
 
function Modificar_Medicamento() {
   var id = $("#txtidmedicamento").val();
   var medicamento = $("#txt_medicamento_editar").val();
   var alias = $("#txt_medicamentoalias_editar").val();
   var stock = $("#txt_stock_editar").val();
   var estatus = $("#cbm_estatus_editar").val();

    if (medicamento.length == 0 || stock.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        "url": "../controlador/medicamento/controlador_medicamento_modificar.php",
        type: 'POST',
        data: {
            id:id,
            medicamento: medicamento,
            alias:alias,
            stock: stock,
            estatus: estatus
        }
    }).done(function (resp) {
        if (resp > 0) {
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Datos actualizados correctamente.", "success")
                .then((value) => {
                    listar_medicamento();
                    tablemedicamento.ajax.reload();
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