var ideAEliminar = 0;
var idAActualizar = 0;

function regActualizar(id){
    idAActualizar = id;
    $.ajax({
        url: "./resources/php/oficio-designacion.php",
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
                document.getElementById("alumno-act").value     = objetoJSON.alumno;
                document.getElementById("profesores-act").value = objetoJSON.profesores;
                document.getElementById("doc").src              = "./oficios-designacion/"+objetoJSON.fname;
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
        url: "./resources/php/oficio-designacion.php",
        method: 'POST',
        data: {
            id: ideAEliminar,
            action: 'delete'
        },
        success: function (resultado) {
            var objetoJSON = JSON.parse(resultado);
            if (objetoJSON.estado == 1) {
                location.href = "./oficio-designacion.php";
            } else {
                alert(objetoJSON.mensaje);
            }
        }
    });
}

function ideEliminar(id) {
    ideAEliminar = id;
}