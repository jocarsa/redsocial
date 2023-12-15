window.addEventListener("load", function() {
    document.getElementById("buscar").onclick = function(){
        window.location = "../buscar/buscar.html"
    }
    document.getElementById("inicio").onclick = function(){
        window.location = "../escritorio/escritorio.html"
    }
    document.getElementById("crear").onclick = function(){
        window.location = "../crear/crear.html"
    }
    document.getElementById("cerrarsesion").onclick = function(){
        deleteCookie("usuario")
        window.location = "../index.html"
    }
})

function deleteCookie(name) {
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;';
}
