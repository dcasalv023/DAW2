//Crea una función que reciba un texto y lo devuelva al revés.
const invertirTexto = (texto) => {
    if (typeof texto !== 'string') {
    return "Error: Se esperaba un texto";
    }

    return texto.split('').reverse().join('');
};


const textoOriginal = "Hola, mundo!";
const textoInvertido = invertirTexto(textoOriginal);

console.log("Texto original: " + textoOriginal);
console.log("Texto invertido: " + textoInvertido);
