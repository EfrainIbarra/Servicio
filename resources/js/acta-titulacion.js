var ideAEliminar = 0;
var idAActualizar = 0;

function actionCreate() {
    let acta       = document.getElementById("acta").value;
    let alumno     = document.getElementById("alumno").value;
    let profesores = document.getElementById("profesores").value;
    let doc        = document.getElementById("file").value;

    if(acta === "" || alumno === "" || profesores === "" || doc === ""){
        alert("Faltan campos");
    } else {
        $.ajax({
            url: "./resources/php/acta-titulacion.php",
            method: 'GET',
            data: {
                acta       : acta,
                alumno     : alumno,
                profesores : profesores,
                doc        : doc,
                action     : 'create'
            },
            success: function( resultado ){
                var objetoJSON = JSON.parse(resultado);
    
                if(objetoJSON.estado == 1){
                    $('#modal-lg').modal('hide');
                }else{
                    alert(objetoJSON.mensaje);
                }
            }
        });
    }
}

function actionRead() {
    $.ajax({
        url: "./resources/php/acta-titulacion.php",
        method: 'GET',
        data: {
            action: 'read'
        },
        success: function (resultado) {
            var objetoJSON = JSON.parse(resultado);

            if (objetoJSON.estado == 1) {
                //Mostrar tabla
                var tabla = $('#example1').DataTable();
                for (acta of objetoJSON.actas) {

                    var Botones = '<a class="btn btn-primary btn-sm" onclick="regActualizar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-actualizar"><i class="fa fa-pen"></i> Editar</a> '
                    Botones = Botones + '<a class="btn btn-danger btn-sm" onclick="ideEliminar(' + acta.id + ');" href="#" data-toggle="modal" data-target="#modal-delete"><i class="fa fa-trash"></i> Borrar</a>'

                    var profes = "";
                    for (let i = 0; i < acta.profesores.length; i++) {
                        if(acta.profesores[i] === '\n' || acta.profesores === "\n"){
                            profes += ',</br>';
                        } else {
                            profes += acta.profesores[i];
                        }
                    }

                    tabla.row.add([
                        acta.acta,
                        acta.alumno,
                        profes,
                        Botones
                    ]).node().id = 'row_' + acta.id; //asignamos un id a cada renglon
                    tabla.draw(false);
                }
            }
        }
    });
}

function actionUpdate() {
    var acta       = document.getElementById("acta-act").value;
    var alumno     = document.getElementById("alumno-act").value;
    var profesores = document.getElementById("profesores-act").value;
    //var doc        = document.getElementById("doc-act").value;

    $.ajax({
        url: "./resources/php/acta-titulacion.php",
        method: 'POST',
        data:{
            id         : idAActualizar,
            acta       : acta,
            alumno     : alumno,
            profesores : profesores,
            //doc        : doc,
            action     : 'update'
        },
        success: function(resultado){
            var objetoJSON = JSON.parse(resultado);

            if(objetoJSON.estado == 1){
                var tabla = $('#example1').DataTable();
                var renglon = tabla.row( "#row_"+idAActualizar ).data();

                renglon[0] = acta;
                renglon[1] = alumno;
                renglon[2] = profesores;

                tabla.row( "#row_"+idAActualizar ).data(renglon);

                alert(objetoJSON.mensaje);
                $('#modal-actualizar').modal('hide');
            }else{
                alert(objetoJSON.mensaje);
            }
        }
    });
}

function regActualizar(id){
    idAActualizar = id;
    $.ajax({
        url: "./resources/php/acta-titulacion.php",
        method: 'GET',
        data:{
            id: idAActualizar,
            action: 'read'
        },
        success: function(resultado){
            var objetoJSON = JSON.parse(resultado);

            if(objetoJSON.estado == 1){
                document.getElementById("id-act").value         = objetoJSON.id;
                document.getElementById("fname-act").value      = objetoJSON.fname;
                document.getElementById("acta-act").value       = objetoJSON.acta;
                document.getElementById("alumno-act").value     = objetoJSON.alumno;
                document.getElementById("profesores-act").value = objetoJSON.profesores;
                document.getElementById("doc").src              = "./upload/"+objetoJSON.fname;
                document.getElementById("acta-doc").textContent = objetoJSON.acta;
                //document.getElementById("descarga").href = "download.php?filename="+objetoJSON.name+"&f="+objetoJSON.fname;
            }else{
                alert(objetoJSON.mensaje);
            }
        }
    });
    
}

function actionDelete() {
    $.ajax({
        url: "./resources/php/acta-titulacion.php",
        method: 'POST',
        data: {
            id: ideAEliminar,
            action: 'delete'
        },
        success: function (resultado) {
            var objetoJSON = JSON.parse(resultado);
            if (objetoJSON.estado == 1) {
                location.href = "./acta-titulacion.php";
            } else {
                alert(objetoJSON.mensaje);
            }
        }
    });
}

function ideEliminar(id) {
    ideAEliminar = id;
}
