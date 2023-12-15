window.onload = function(){
    document.getElementById("buscador").onkeyup = function(){
        let plantillausuario = document.getElementById("plantillaresultadobusqueda")
        let contenedor = document.querySelector("#resultados")
        fetch("api/resultadosbusqueda.php?busca="+this.value)
        .then(function(response){
            return response.json();
        })
        .then(function(datos){
            contenedor.innerHTML = "";
            for(let i = 0;i<datos.length;i++){
                let importado = document.importNode(plantillausuario.content,true);
                importado.querySelector("h3").textContent = datos[i].nombre
                importado.querySelector("img").setAttribute("src",datos[i].imagen)
                importado.querySelector("p").textContent = datos[i].contactos
                importado.querySelector("button").onclick = function(){
                    console.log("ok vamos a ello")
                    let miusuario = dameCookie("usuario")
                    console.log("tu usuario es: "+miusuario)
                    let tuusuario = datos[i].nombre
                    console.log("su usuario es: "+tuusuario)
                    let cadena = "api/insertaenlace.php?miusuario="+miusuario+"&tuusuario="+tuusuario
                    console.log(cadena)
                    fetch(cadena)
                    .then(function(response){
                       window.location = "../escritorio/escritorio.html"
                    })
                }
                contenedor.appendChild(importado);
            }
        })
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

