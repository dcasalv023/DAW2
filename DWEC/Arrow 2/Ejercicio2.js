//Definir  una  función  de  flecha  que  reciba  un  valor  entero  y  retorne  otro  valor  entero 
//aleatorio comprendido entre 1 y el valor que llega como parámetro. Asignar dicha función de 
//flecha a una constante para permitir llamarla en sucesivas ocasiones.
const numeroaleatorio = (valormax) => Math.floor(Math.random() * valormax) + 1;

const numeroaleatorio1 = numeroaleatorio(10);
console.log(numeroaleatorio1);


const numeroaleatorio2 = numeroaleatorio(10);
console.log(numeroaleatorio2);