    filtrarPlanos = (planos, arrancarNave) => {  
    let filtro= planos.filter(plano =>plano>=1 && plano<=10);
        arrancarNave(filtro);    

    };
    

    let planos=[1,100,200,400,500]
    filtrarPlanos(planos, filtro => {
    let cuenta=filtro.length
    

    if(cuenta>0){
        console.log('Arrancando la nave')
    }else{
        console.log('Buscando planos')
    }
    
});