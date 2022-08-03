function actionCreate() {
    let nombre    = document.getElementById("nombre").value;
    let apPaterno = document.getElementById("apPaterno").value;
    let apMaterno = document.getElementById("apMaterno").value;
    let boleta    = document.getElementById("boleta").value;
    let pass      = document.getElementById("pass").value;
    let pass2     = document.getElementById("pass2").value;
    let email     = document.getElementById("email").value;

    if(nombre === "" || apPaterno === "" || apMaterno === "" || boleta === "" || pass === "" || pass2 === "" || email === ""){
        alert("Faltan campos");
    } else if(pass != pass2){
        alert("Error, las contraseñas no coinciden");
    } else {
        $.ajax({
            url: "./resources/php/registro.php",
            method: 'GET',
            data: {
                nombre    : nombre,
                apPaterno : apPaterno,
                apMaterno : apMaterno,
                boleta    : boleta,
                pass      : pass,
                email     : email,
                action    : 'create'
            },
            success: function( resultado ){
                var objetoJSON = JSON.parse(resultado);
    
                if(objetoJSON.estado == 1){
                    alert(objetoJSON.mensaje);
                    window.location.href = "http://localhost/Servicio/index.php";
                }else{
                    alert(objetoJSON.mensaje);
                    $('#modal-nueva').modal('hide');
                }
            }
        });
    }
}