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
                estado: estado
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
                estado: estado
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
                estado: estado
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

function Modificar_Usuario() {
    var idusuario = $("#txtidusuario").val();
    var sexo = $("#cbm_sexo_editar").val();
    var rol = $("#cbm_rol_editar").val();
    var email = $("#txt_email_editar").val();
    var validaremail = $("#validar_email_editar").val();
    if (idusuario.length == 0 || sexo.length == 0 || rol.length == 0) {
        return Swal.fire("Mensaje De Advertencia", "Llene los campos vacios", "warning");
    }
    if (validaremail == "incorrecto") {
        return Swal.fire("Mensaje De Advertencia", "Ingrese un formato valido de Email", "warning");
    }

    $.ajax({
        "url": "../controlador/usuario/controlador_usuario_modificar.php",
        type: 'POST',
        data: {
            idusuario: idusuario,
            sexo: sexo,
            rol: rol,
            email: email
        }
    }).done(function (resp) {
        if (resp > 0) {
            $("#modal_editar").modal('hide');
            Swal.fire("Mensaje De Confirmacion", "Datos actualizados correctamente.", "success")
                .then((value) => {
                    table.ajax.reload();
                    TraerDatosUsuario();
                });
        } else {
            Swal.fire("Mensaje De Error", "Lo sentimos, no se pudo completar la actualización", "error");
        }
    })
}