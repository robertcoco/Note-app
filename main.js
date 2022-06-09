var boton = document.getElementById("button");
function elemento(){
    var elemento = document.getElementsByClassName("contenedor")
    var item = elemento.querySelector(".notes");
    elemento.removeChild(item);
}
boton.addaddEventListener("onclick",elemento());
