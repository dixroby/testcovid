var table;
function listar_estudiante_no() {
    table = $("#tabla_est").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 20,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/estudiante/controlador_estudiante_listar_no.php",
            type: 'POST'
        },
        "columns": [
            { "defaultContent": "" },
            {
                "data": "EstadoAlumno",
                render: function (data, type, row) {
                    if (data == "SI") {
                        return "Presenta sintomas altas.";
                    }
                    if (data == "NO") {
                        return "No presenta sintomas.";
                    }

                    if (data == "PENDIENTE") {
                        return "En sospecha.";
                    }
                }
            },
            { "data": "atendido" },
            { "data": "CodAlumno" },
            { "data": "nombres" },
            { "data": "DNIAlumno" },
            { "data": "TelefonoAlumno" },
            {
                "data": "atendido",
                render: function (data, type, row) {
                    if (data == 'SI') {
                        return "<button disabled style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-fw fa-check-square-o'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-fw fa-times'></i></button>";
                        
                    } else {
                        return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-fw fa-check-square-o'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-fw fa-times'></i></button>";
                    }
                }
            }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_est_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    //codigo para el contador de numero de registros
    table.on('draw.dt', function () {
        var PageInfo = $('#tabla_est').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}
function listar_estudiante() {
    table = $("#tabla_est").DataTable({
        "ordering": false,
        "bLengthChange": false,
        "searching": { "regex": false },
        "lengthMenu": [[10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]],
        "pageLength": 20,
        "destroy": true,
        "async": false,
        "processing": true,
        "ajax": {
            "url": "../controlador/estudiante/controlador_estudiante_listar.php",
            type: 'POST'
        },
        "columns": [
            { "defaultContent": "" },
            {
                "data": "EstadoAlumno",
                render: function (data, type, row) {
                    if (data == "SI") {
                        return "Presenta sintomas altas.";
                    }
                    if (data == "NO") {
                        return "No presenta sintomas.";
                    }

                    if (data == "PENDIENTE") {
                        return "En sospecha.";
                    }
                }
            },
            { "data": "atendido" },
            { "data": "CodAlumno" },
            { "data": "nombres" },
            { "data": "DNIAlumno" },
            { "data": "TelefonoAlumno" },
            {
                "data": "atendido",
                render: function (data, type, row) {
                    if (data == 'SI') {
                        return "<button disabled style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-fw fa-check-square-o'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger'><i class='fa fa-fw fa-times'></i></button>";
                        
                    } else {
                        return "<button style='font-size:13px;' type='button' class='editar btn btn-primary'><i class='fa fa-fw fa-check-square-o'></i></button>&nbsp;<button style='font-size:13px;' type='button' class='desactivar btn btn-danger' disabled><i class='fa fa-fw fa-times'></i></button>";
                    }
                }
            }
        ],

        "language": idioma_espanol,
        select: true
    });
    document.getElementById("tabla_est_filter").style.display = "none";
    $('input.global_filter').on('keyup click', function () {
        filterGlobal();
    });
    $('input.column_filter').on('keyup click', function () {
        filterColumn($(this).parents('tr').attr('data-column'));
    });
    //codigo para el contador de numero de registros
    table.on('draw.dt', function () {
        var PageInfo = $('#tabla_est').DataTable().page.info();
        table.column(0, { page: 'current' }).nodes().each(function (cell, i) {
            cell.innerHTML = i + 1 + PageInfo.start;
        });
    });

}

function VerificarEstudiante() {
    var dni = $("#txt_Dni").val();
    var con = $("#txt_Codigo").val();
    var tel = $("#tx_tTelefono").val();


    if (dni.length == 0 || con.length == 0 || tel.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }

    $.ajax({
        url: 'controlador/estudiante/controlador_verificar_estudiante.php',
        type: 'POST',
        data: {
            dni: dni,
            con: con,
            tel: tel
        }
    }).done(function (resp) {

        let timerInterval;
        Swal.fire({
            title: 'TEST UNAMBA',
            html: 'Por favor lea detenidamente y respoda las siguientes preguntas <br><br>Su test empieza en <b></b> milisegundos.',
            timer: 5000,
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
var table;


function valores() {
    var dni = document.getElementById("txtdniidid").value;
    var nota = 0;
    var estado = '';
    var prueba = 'SI';

    if (document.getElementById('p11').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p11').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p11').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p11').checked) {
        nota = nota + 2;
    }
    if (document.getElementById('p11').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p11').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p11').checked) {
        nota = nota + 0;
    }
    //////////////////////////////////////////////////////7
    if (document.getElementById('p21').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p21').checked) {
        nota = nota + 0;
    }
    //////////////////// situacion de riesgo//////////////////////////////////7
    if (document.getElementById('p31').checked) {
        nota = nota + 2;
    }
    if (document.getElementById('p31').checked) {
        nota = nota + 0;
    }
    //¿En los últimos 14 días, te has desplazado a un distrito diferente al de tu residencia? 
    if (document.getElementById('p41').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p42').checked) {
        nota = nota + 0;
    }
    //¿Has estado en contacto con algun centro de estabelcimiento de salud que atienda casos
    //de Covid-19?
    if (document.getElementById('p51').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p52').checked) {
        nota = nota + 0;
    }

    // Otras condiciones - ¿Tienes alguna de las siguientes enfermedades o condiciones?
    if (document.getElementById('p61').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p62').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p63').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p64').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p65').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p66').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p67').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p68').checked) {
        nota = nota + 0.51;
    }
    if (document.getElementById('p69').checked) {
        nota = nota + 0.5;
    }
    //¿En los últimos 14 días, te has desplazado a un distrito diferente al de tu residencia?
    if (document.getElementById('p71').checked) {
        nota = nota + 1;
    }
    if (document.getElementById('p72').checked) {
        nota = nota + 1;
    }
    //Otras condiciones ¿Vives en la misma casa con alguna persona de los siguientes grupos de riesgos?
    if (document.getElementById('p81').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p82').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p83').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p84').checked) {
        nota = nota + 0.5;
    }
    if (document.getElementById('p85').checked) {
        nota = nota + 0.5;
    }



    if (nota <= 4) {
        estado = 'NO';
        $.ajax({
            "url": "controlador/estudiante/controlador_estudiante_covid_no.php",
            type: 'POST',
            data: {
                dni: dni,
                estado: estado,
                prueba: prueba
            }
        }).done(function (resp) {
            if (resp > 0) {
                Swal.fire("Mensaje De Confirmacion", "Test realizado con exito", "success")
                    .then((value) => {
                        window.location = 'final.php';
                    });
            }
        })

    }
    if (nota > 4 && nota <= 5) {
        alert("tal vez");
        estado = 'PENDIENTE';
        $.ajax({
            "url": "controlador/estudiante/controlador_estudiante_covid_no.php",
            type: 'POST',
            data: {
                dni: dni,
                estado: estado,
                prueba: prueba
            }
        }).done(function (resp) {
            if (resp > 0) {
                Swal.fire("Mensaje De Confirmacion", "Test realizado con exito", "success")
                    .then((value) => {
                        window.location = 'final2.php';
                    });
            }
        })
    }
    if (nota > 5) {

        estado = 'SI';
        $.ajax({
            "url": "controlador/estudiante/controlador_estudiante_covid_no.php",
            type: 'POST',
            data: {
                dni: dni,
                estado: estado,
                prueba: prueba
            }
        }).done(function (resp) {
            if (resp > 0) {
                Swal.fire("Mensaje De Confirmacion", "Test realizado con exito", "success")
                    .then((value) => {
                        window.location = 'final3.php';
                    });
            }
        })
    }
}

function Atender_Estudiante() {
    var id = $("#txtid").val();
    
    $.ajax({
        "url": "../controlador/estudiante/controlador_estudiante_atender.php",
        type: 'POST',
        data: {
            id: id
        }
    }).done(function (resp) {
        if (resp > 0) {
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Se marco como <b>atendido</b> al estudiante.", "success")
                .then((value) => {
                    table.ajax.reload();
                });
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar la atención", "error");
        }
    })
}

function Atender_Estudiante_No() {
    var id = $("#txtid_editar").val();
    
    $.ajax({
        "url": "../controlador/estudiante/controlador_estudiante_atender_cancelar.php",
        type: 'POST',
        data: {
            id: id
        }
    }).done(function (resp) {
        if (resp > 0) {
            $("#modal_cancelar").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Se marco como <b>No atendido</b> al estudiante.", "success")
                .then((value) => {
                    table.ajax.reload();
                });
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar la atención", "error");
        }
    })
}

$('#tabla_est').on('click', '.editar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    $("#modal_editar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_editar").modal('show');
    $("#txtid").val(data.CodAlumno);
    $("#cod").val(data.CodAlumno);
    $("#nombre").val(data.nombres);
    $("#tel").val(data.TelefonoAlumno);
})

$('#tabla_est').on('click', '.desactivar', function () {
    var data = table.row($(this).parents('tr')).data();
    if (table.row(this).child.isShown()) {
        var data = table.row(this).data();
    }
    $("#modal_cancelar").modal({ backdrop: 'static', keyboard: false })
    $("#modal_cancelar").modal('show');
    $("#txtid_editar").val(data.CodAlumno);
    $("#nombre").val(data.nombres);
})