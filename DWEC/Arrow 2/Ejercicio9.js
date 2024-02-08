//Guardar en un array los 20 primeros números pares.
const obtenerPrimeros20Pares = () => {
    const numerosPares = [];

    for (let i = 1; numerosPares.length < 20; i++) {
    if (i % 2 === 0) {
        numerosPares.push(i);
    }
    }

    return numerosPares;
};

const primeros20Pares = obtenerPrimeros20Pares();

console.log("Los primeros 20 números pares son:", primeros20Pares);
