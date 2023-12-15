window.onload = function(){
    
    document.getElementById("enviarcontenido").onclick = function(){
        let contenido = document.getElementById("micontenido").innerHTML
        let usuario = dameCookie("usuario")
        let imagen = document.getElementById("imagen")
        let archivo = imagen.files[0];
        if (archivo) {
            let formData = new FormData();
            formData.append('imagen', archivo);
            fetch("api/nuevaentrada.php?contenido="+encodeURI(contenido)+"&usuario="+usuario, {
                method: 'POST',
                body: formData
            })
            .then(function(response){
                window.location = "../escritorio/escritorio.html"
            })
            .catch(error => console.error(error));
        } else {
            console.log('Sin archivos');
        }
        
    }
}

function dameCookie(cookie) {
  const name = cookie + "=";
  const decodificado = decodeURIComponent(document.cookie);
  const arraycookies = decodificado.split(';');
  
  for (let i = 0; i < arraycookies.length; i++) {
    let cookie = arraycookies[i];
    while (cookie.charAt(0) === ' ') {
      cookie = cookie.substring(1);
    }
    if (cookie.indexOf(name) === 0) {
      return cookie.substring(name.length, cookie.length);
    }
  }
  return "";
}