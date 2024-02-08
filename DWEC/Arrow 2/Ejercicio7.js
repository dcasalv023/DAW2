//Leer un Array de enteros y sacar la media. 
const calcmedia = (array) => {
    if (array.length === 0) {
        return 0;
    }

    const suma = array.reduce((total, numero) => total + numero, 0);
    return suma / array.length;
};

const numeros = [5, 10, 15, 20, 25];
const media = calcmedia(numeros);

console.log("La media de los numeros es: " + media);