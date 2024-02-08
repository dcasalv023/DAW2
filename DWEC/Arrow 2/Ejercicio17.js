//Crea una función que genere 100 números aleatorios entre 1 y 1000 que no se repitan y 
//luego muéstralos por pantalla 
const generarNumerosNoRepetidos = () => {
    const numerosAleatorios = new Set();

    while (numerosAleatorios.size < 100) {
      const numeroAleatorio = Math.floor(Math.random() * 1000) + 1;
    numerosAleatorios.add(numeroAleatorio);
    }

    return Array.from(numerosAleatorios);
};


const numerosNoRepetidos = generarNumerosNoRepetidos();

console.log("Números aleatorios no repetidos:" + numerosNoRepetidos);
