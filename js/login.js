const nombre_completo = document.getElementById("nombre_completo")
const correo = document.getElementById("correo")
const usuario = document.getElementById("usuario")
const contrasena = document.getElementById("cotrasena")
const form = document.getElementById("form")

form.addEventListener("submit", e=>{
    e.preventDefault()
    if(nombre_completo.nodeValue.length <6.){
        alert ("Nombre muy corto")
    }
})