// Hacer una función que muestre la tabla de multiplicar de un número.
const tablamult = (numero) => {
    for (let i = 1; i <= 10; i++) {
        console.log(`${numero} x ${i} = ${numero * i}`);
    }
};

const numero = 5;
tablamult(numero); 