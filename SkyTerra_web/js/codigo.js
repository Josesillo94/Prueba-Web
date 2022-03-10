const PMADERA = 20,  PROCA = 30, PESMERALDA = 100, PDIAMANTE = 150;
let valorFinal =0;
let objeto = document.querySelector('#objetos');
let precio = document.querySelector('#precioItems');
let cantidadCambio = document.querySelector('#cantidadItems');
objeto.onchange = function(){
    let cantidad = document.querySelector('#cantidadItems').value;
    if(cantidad > 0){
        
        let valor = objeto.value;
        if(valor == "Madera"){
            
            valorFinal = PMADERA * cantidad;
            precio.value = valorFinal;

        }else if(valor == "Roca"){
            valorFinal = PROCA * cantidad;
            precio.value = valorFinal;
        }else if(valor == "Esmeralda"){
            valorFinal = PESMERALDA * cantidad;
            precio.value = valorFinal;
        }else{
            valorFinal = PDIAMANTE * cantidad;
            precio.value = valorFinal;
        }
            
    }
    

}
cantidadCambio.onchange = function(){


    let valor = objeto.value;
    let cantidad = document.querySelector('#cantidadItems').value;
    if(cantidad > 0){
        
        
        if(valor == "Madera"){
            
            valorFinal = PMADERA * cantidad;
            precio.value = valorFinal;

        }else if(valor == "Roca"){
            valorFinal = PROCA * cantidad;
            precio.value = valorFinal;
        }else if(valor == "Esmeralda"){
            valorFinal = PESMERALDA * cantidad;
            precio.value = valorFinal;
        }else{
            valorFinal = PDIAMANTE * cantidad;
            precio.value = valorFinal;
        }
            
    }

}
let formularioTienda = document.getElementById("formulariocompraTienda");

formularioTienda.onsubmit = function(){


    alert("La compra se ha realizado correctamente");



}

