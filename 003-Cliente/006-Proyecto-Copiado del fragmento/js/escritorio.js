window.onload = function(){
    let plantilla = document.getElementById("plantillapublicacion")
    let principal = document.querySelector("main")
    
    for(let i = 0;i<20;i++){
        let importado = document.importNode(plantilla.content,true);
        principal.appendChild(importado);
    }
    
}

