//Función que pida N parámetros y devuelva cuantos parámetros se le pasaron.
const parametros = (...params) => params.length;

const cantidad =  parametros(1, 2, "Hola", true, 3.14);
console.log("Se  me pasaron "+ cantidad +" parámetros");
