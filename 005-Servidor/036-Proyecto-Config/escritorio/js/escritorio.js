window.addEventListener("load", function() {
    let plantilla = document.getElementById("plantillapublicacion")
    let principal = document.querySelector("main")
    let ruta = "api/publicaciones.php?usuario="+dameCookie("usuario")
    console.log(ruta)
    fetch(ruta)
    .then(function(response){
        return response.json();
    })
    .then(function(datos){
        console.log(datos)
        for(let i = 0;i<datos.length;i++){
            let importado = document.importNode(plantilla.content,true);
            importado.querySelector("p").textContent = datos[i].texto
            importado.querySelector("time").textContent = datos[i].fecha
            importado.querySelector("h3").textContent = datos[i].usuario
            importado.querySelector("img").setAttribute("src",datos[i].imagen)
            principal.appendChild(importado);
        }
    })
    let plantillausuario = document.getElementById("plantillausuario")
    let listausuarios = document.querySelector("#nuevosusuarios")
    fetch("api/usuarios.php")
    .then(function(response){
        return response.json();
    })
    .then(function(datos){
        console.log(datos)
        for(let i = 0;i<datos.length;i++){
            let importado = document.importNode(plantillausuario.content,true);
            importado.querySelector("p").textContent = datos[i].nombre
            importado.querySelector("img").setAttribute("src",datos[i].imagen)
            listausuarios.appendChild(importado);
        }
    })
    
})

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

