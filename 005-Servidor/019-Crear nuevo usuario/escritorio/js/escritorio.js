window.onload = function(){
    let plantilla = document.getElementById("plantillapublicacion")
    let principal = document.querySelector("main")
    fetch("api/publicaciones.json")
    .then(function(response){
        return response.json();
    })
    .then(function(datos){
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
    fetch("api/usuarios.json")
    .then(function(response){
        return response.json();
    })
    .then(function(datos){
        for(let i = 0;i<datos.length;i++){
            let importado = document.importNode(plantillausuario.content,true);
            importado.querySelector("p").textContent = datos[i].nombre
            importado.querySelector("img").setAttribute("src",datos[i].imagen)
            listausuarios.appendChild(importado);
        }
    })
    document.getElementById("buscar").onclick = function(){
        window.location = "../buscar/buscar.html"
    }
}

