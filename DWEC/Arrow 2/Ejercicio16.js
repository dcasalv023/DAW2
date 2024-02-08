//Crea una función que genere número entero aleatorio entre min y max, que serán pasados 
//como parámetros. Por defecto min = 1 y max = 100.
const generarNumeroAleatorio = (min = 1, max = 100) => {
    if (isNaN(min) || isNaN(max) || min >= max) {
    return "Error: Parámetros inválidos";
    }

    const numeroAleatorio = Math.floor(Math.random() * (max - min + 1)) + min;
    return numeroAleatorio;
};


const numeroAleatorio1 = generarNumeroAleatorio();
const numeroAleatorio2 = generarNumeroAleatorio(10, 50);

console.log("Número aleatorio (por defecto): " + numeroAleatorio1);
console.log("Número aleatorio (entre 10 y 50): " + numeroAleatorio2);
