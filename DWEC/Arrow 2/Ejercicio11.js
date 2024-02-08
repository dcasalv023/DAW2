//Hacer los primeros 10 dígitos de serie Fibonacci.
const obtenerPrimeros10Fibonacci = () => {
    const fibonacci = [0, 1];

    for (let i = 2; i < 10; i++) {
    const siguienteNumero = fibonacci[i - 1] + fibonacci[i - 2];
    fibonacci.push(siguienteNumero);
    }

    return fibonacci;
};


const primeros10Fibonacci = obtenerPrimeros10Fibonacci();

console.log("Los primeros 10 números de la serie Fibonacci son:", primeros10Fibonacci);
