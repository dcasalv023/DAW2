
<?php
//12. Escribe un programa que resuelva ecuaciones de segundo grado (ax2 + bx + c = 0). 
//Si la ecuación no tiene soluciones reales, hay que mostrar un mensaje de error. 
//Usa funciones para ello. La función recibirá los coeficientes de la ecuación y 
//devolverá un array con las soluciones reales. Si no hay soluciones devolverá false.

function calcula($a, $b, $c) {
    $discriminante = ($b**2)-(4*$a*$c);

    if ($discriminante < 0) {
        echo "No tiene soluciones reales";
        return false;
    } else {
        $raiz = sqrt($discriminante);
        $x1 = (-$b+($raiz)/(2*$a));
        $x2 = (-$b-($raiz)/(2*$a));

        $resultado = array($x1, $x2);
        return $resultado;
    }
}

$result = calcula(2, 1, 1);

if ($result !== false) {
    foreach($result as $x){
        echo "Resultado; {$x}";
    }
}