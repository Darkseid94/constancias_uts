function eliminar(){
    var respuesta = confirm("estas seguro que deseas eliminiar este usuario?");
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}

function eliminarH(){
    var respuesta = confirm("estas seguro que deseas eliminiar este historial?");
    if(respuesta == true){
        return true;
    }else{
        return false;
    }
}
