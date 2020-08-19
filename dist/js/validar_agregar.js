function validar_ag(){
    var nombre_apellido, dni, edad, localidad;
    nombre_apellido = document.getElementById("ape_y_nom").value;
    dni = document.getElementById("dni").value;
    edad = document.getElementById("edad").value;
    localidad = document.getElementById("localidad").value;

    if(nombre_apellido.length<1 || nombre_apellido.length>100){
        alert("Ingrese un nombre y apellido válido")
        return false;
    } else if(dni.length<1 || dni.length>20){
        alert("Ingrese un DNI válido")
        return false;
    } else if(isNaN(dni)){
        alert("Ingrese un DNI válido")
        return false;
    } else if(edad.length<1 || edad.length>3){
        alert("La edad ingresada no es válida")
        return false;
    } else if(isNaN(edad)){
        alert("Solo los números son válidos")
        return false;
    } else if(localidad.length<1 || localidad.length>100){
        alert("Ingrese una localidad válida")
        return false;
    } return true;
}

function validar_user(){
    var correo, contraseña, expReg;
    correo = document.getElementById("correo").value;
    contraseña = document.getElementById("contra").value;
    c_contraseña = document.getElementById("contra2").value;
    expReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;
    
    if(correo.length<1 || correo.length>100){
        alert("Ingrese un correo válido")
        return false;
    } else if(!expReg.test(correo)){
        alert("El correo es inválido")
        return false;
    } else if(contraseña.length<1 || contraseña.length>50){
        alert("La contraseña es inválida")
        return false;
    } else if(contraseña != c_contraseña){
        alert("Las contraseñas no coinciden")
        return false;
    }
    
}