//Crea una función que reciba un parámetro, un DNI, y devuelva la letra del mismo. Si el DNI 
//pasado tiene algún error devolverá “DNI Erróneo”. 
const obtenerLetraDNI = (dni) => {
    const longitudDNI = 9;

    if (typeof dni === 'string' && dni.length === longitudDNI) {
    const numerosDNI = dni.slice(0, -1);
    const letraDNI = dni.slice(-1).toUpperCase();

    if (!isNaN(numerosDNI)) {
        const resto = parseInt(numerosDNI) % 23;
        const letrasValidas = 'TRWAGMYFPDXBNJZSQVHLCKE';

        if (letraDNI === letrasValidas.charAt(resto)) {
        return letraDNI;
        }
    }
    }

    return "DNI Erróneo";
};


const dniEjemplo = "12345678Z";
const letraObtenida = obtenerLetraDNI(dniEjemplo);

console.log("La letra del DNI " + dniEjemplo + " es: " + letraObtenida);

