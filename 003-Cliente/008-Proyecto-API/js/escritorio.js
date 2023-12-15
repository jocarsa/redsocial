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
            principal.appendChild(importado);
        }
    })
    
    
}

