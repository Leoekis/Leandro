function validar(){
    var correo, contraseña, expReg;
    correo = document.getElementById("correo").value;
    contraseña = document.getElementById("contra").value;
    expReg = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.([a-zA-Z]{2,4})+$/;

    if(correo.length<1 || correo.length>50){
        alert("Correo inválido");
        return false;
    } 
    else if(!expReg.test(correo)){
        alert("Correo inválido");
        return false;
    } 
    else if(contraseña.length<1 || contraseña.length>50){
        alert("Contraseña inválida")
        return false;
    }
    return true;

}