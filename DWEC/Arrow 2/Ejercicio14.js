//Crea  una  función  que  reciba  2  parámetros,  precio  e  IVA,  y  devuelva  el  precio  con  IVA 
//incluido. Si no recibe el IVA, aplicará el 21 por ciento por defecto.
const calcularPrecioConIVA = (precio, iva = 0.21) => {
    if (isNaN(precio) || isNaN(iva) || precio < 0 || iva < 0) {
    return "Error: Precio o IVA inválido";
    }

    const precioConIVA = precio * (1 + iva);
    return precioConIVA.toFixed(2);
};


const precioOriginal = 100;
const ivaPersonalizado = 0.15;

const precioConIVA1 = calcularPrecioConIVA(precioOriginal);
const precioConIVA2 = calcularPrecioConIVA(precioOriginal, ivaPersonalizado);

console.log("Precio con IVA (21% por defecto): " + precioConIVA1);
console.log("Precio con IVA (15% personalizado): " + precioConIVA2);
