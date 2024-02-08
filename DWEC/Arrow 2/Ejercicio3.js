//Hacer una función que convierta de grados centígrados a Farenheit
const final = (celsius) => (celsius * 9/5) + 32;

const tempcelsius = 30;
const tempfahr = final(tempcelsius);

console.log(tempcelsius +  "grados Celsius son " + tempfahr);