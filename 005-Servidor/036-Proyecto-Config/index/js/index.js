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
        
        let imagen = document.getElementById("imagen")
        let archivo = imagen.files[0];
        console.log(archivo)
        if (archivo) {
            let formData = new FormData();
            formData.append('imagen', archivo);
            fetch("api/signin.php?usuario="+usuario+"&contrasena="+contraseña+"&nombrepropio="+nombrepropio+"&apellidos="+apellidos+"&email="+email+"", {
                method: 'POST',
                body: formData
            })
            .then(function(response){
                window.location = window.location
            })
            .catch(error => console.error(error));
        } else {
            console.log('Sin archivos');
        }
        
        
    }
}
