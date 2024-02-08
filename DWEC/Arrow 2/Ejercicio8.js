// Leer el nombre y sueldo de 8 empleados y mostrar el nombre y sueldo del empleado que 
//más gana.
const obtenerEmpleadoMasGanador = () => {
    const empleados = [];

    for (let i = 1; i <= 8; i++) {
    const nombre = prompt(`Ingrese el nombre del empleado ${i}:`);
    const sueldo = parseFloat(prompt(`Ingrese el sueldo de ${nombre}:`));

    if (!isNaN(sueldo)) {
        empleados.push({ nombre, sueldo });
    }
    }

    const empleadoGanador = empleados.reduce((max, empleado) => (empleado.sueldo > max.sueldo ? empleado : max), { sueldo: 0 });

    return empleadoGanador;
    };

const empleadoGanador = obtenerEmpleadoMasGanador();

console.log(`El empleado que más gana es ${empleadoGanador.nombre} con un sueldo de ${empleadoGanador.sueldo}`);
