//Hacer una función que calcule  el tiempo necesario para que  un automóvil que se mueve 
//con una velocidad de 73000 km/h recorra una distancia de 120 km. (TIEMPO = d/v). 
const calcularTiempo = (velocidad, distancia) => {
    // Convertir la velocidad de km/h a km/min
    const velocidadEnKmPorMinuto = velocidad / 60;

    // Calcular el tiempo usando la fórmula TIEMPO = distancia / velocidad
    const tiempoEnMinutos = distancia / velocidadEnKmPorMinuto;

    return tiempoEnMinutos;
};

const velocidadAutomovil = 73000; 
const distanciaRecorrida = 120; 

const tiempoNecesario = calcularTiempo(velocidadAutomovil, distanciaRecorrida);

console.log(`El tiempo necesario para recorrer ${distanciaRecorrida} km a ${velocidadAutomovil} km/h es de ${tiempoNecesario} minutos.`);
