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
                document.cookie = "usuario="+datos.usuario+"; path=/";
                window.location = "../escritorio/escritorio.html"
            }
        })
    }
    document.getElementById("botoncreausuario").onclick = function(){
        let usuario = document.getElementById("signinnombreusuario").value
        let contraseña = document.getElementById("signincontraseña").value
        let nombrepropio = document.getElementById("nombrepropio").value
        let apellidos = document.getElementById("apellidos").value
        let email = document.getElementById("email").value
        fetch("api/signin.php?usuario="+usuario+"&contrasena="+contraseña+"&nombrepropio="+nombrepropio+"&apellidos="+apellidos+"&email="+email+"")
        .then(function(response){
            window.location = window.location
        })
    }
}
