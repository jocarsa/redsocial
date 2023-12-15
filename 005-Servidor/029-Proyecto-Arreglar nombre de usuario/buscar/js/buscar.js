window.onload = function(){
    document.getElementById("buscador").onkeyup = function(){
        let plantillausuario = document.getElementById("plantillaresultadobusqueda")
        let contenedor = document.querySelector("#resultados")
        fetch("api/resultadosbusqueda.json")
        .then(function(response){
            return response.json();
        })
        .then(function(datos){
            for(let i = 0;i<datos.length;i++){
                let importado = document.importNode(plantillausuario.content,true);
                importado.querySelector("h3").textContent = datos[i].nombre
                importado.querySelector("img").setAttribute("src",datos[i].imagen)
                importado.querySelector("p").textContent = datos[i].contactos
                contenedor.appendChild(importado);
            }
        })
    }
}

