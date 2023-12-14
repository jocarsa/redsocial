window.onload = function(){
    document.getElementById("botoniniciasesion").onclick = function(){
        let usuario = document.getElementById("loginnombreusuario").value
        let contraseña = document.getElementById("logincontraseña").value
        fetch("api/login.php?usuario="+usuario+"&contrasena="+contraseña)
        .then(function(response){
            return response.json();
        })
        .then(function(datos){
            console.log(datos)
            if(datos.acceso == true){
                document.cookie = "usuario="+usuario+"; path=/";
                window.location = "../escritorio/escritorio.html"
            }
        })
    }
}
