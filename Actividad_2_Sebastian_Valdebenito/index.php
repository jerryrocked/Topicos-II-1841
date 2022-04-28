<?php
    // Se definen estas variables en vacio que seran utilizadas mas adelante
    $tipo="";
    $mensajeCaracter="";
    $mensajeGenerarNumeros="";
    $mensajeFactorial="";
    $mensajeParesImpares="";
    $mensajeGenerarCruz="";
    if(isset($_REQUEST["tipo"])){
        $tipo=$_REQUEST["tipo"];
        switch($tipo) {
            case 'caracter': 
                // Se obtiene el caracter y se evalua a que tipo de caracter corresponde
                // Luego agregamos esa respuesta a un Alert para mostrarlo en pantalla
                $caracter=$_REQUEST["caracter"];
                $mensajeCaracter.='<div class="alert alert-primary" role="alert" >';
                $mensajeCaracter.="<p>";
                if($caracter>= 'A' && $caracter <='Z'){
                    $mensajeCaracter.="El caracter $caracter es una Mayúscula";
                }elseif($caracter>= 'a' && $caracter <='z'){
                    $mensajeCaracter.="El caracter $caracter es una Minúscula";
                }elseif($caracter>= '0' && $caracter<= '9'){
                    $mensajeCaracter.="El caracter $caracter es un Número";
                }elseif($caracter== '.' || $caracter== ',' || $caracter== ':' || $caracter== ';'){
                    $mensajeCaracter.="El caracter $caracter es un Signo de puntuación";
                }elseif($caracter== ' '){
                    $mensajeCaracter.="El caracter $caracter es un Espacio en Blanco";
                }elseif($caracter== ''){
                    $mensajeCaracter.="No se recibio ningún caracter";
                }else{
                    $mensajeCaracter.="El caracter $caracter es otro caracter";
                }
                $mensajeCaracter.="</p>";
                $mensajeCaracter.="</div>";
            break;

            case 'generarNumeroAleatorios':
                // Recibe la cantidad de iteraciones ingresadas por el usuario 
                $n=$_REQUEST["cantidad"];
                $n= intval($n);
                // Se da formato a la variable
                $n1=0;$n2=0;$n3=0;$n4=0;$n5=0;

                // Generamos un ciclo for con N vueltas segun indique el usuario.
                for($i=1; $i<=$n;$i++){
                    $numero= rand(1,5);
                    // Generamos un numero random entre 1 y 5
                    // Luego evaluamos a con CASE a cual corresponde y lo contamos
                    switch ($numero){
                        case 1:
                            $n1++;
                        break;
                        case 2:
                            $n2++;
                        break;
                        case 3:
                            $n3++;
                        break;
                        case 4:
                            $n4++;
                        break;
                        case 5:
                            $n5++;
                        break;
                    }
                }
                // Generamos un cuadro Alert para mostrar la informacion 
                $mensajeGenerarNumeros.='<div class="alert alert-primary" role="alert" >';
                $mensajeGenerarNumeros.="<p>";
                $mensajeGenerarNumeros.="El número 1 se repitio #$n1 veces.<br>";
                $mensajeGenerarNumeros.="El número 2 se repitio #$n2 veces.<br>";
                $mensajeGenerarNumeros.="El número 3 se repitio #$n3 veces.<br>";
                $mensajeGenerarNumeros.="El número 4 se repitio #$n4 veces.<br>";
                $mensajeGenerarNumeros.="El número 5 se repitio #$n5 veces.<br>";
                $mensajeGenerarNumeros.="</p>";
                $mensajeGenerarNumeros.="</div>";
            break;

            case 'calcularFactorialDeUnNumero':
                // Recibe el numero que se analizará y se formatea
                $n=$_REQUEST["numero"];
                $n= intval($n);

                // Generamos una funcion recursiva que se ejecutara hasta obtener los numeros 0 o 1
                function calcularFactorial($n){
                    if($n==0){
                        return 0;
                    }
                    if($n==1){
                        return 1;
                    }
                    return $n * calcularFactorial($n-1);
                }
                $resultadoFactorial=calcularFactorial($n);
                // Generamos un cuadro Alert para mostrar la informacion 
                $mensajeFactorial.='<div class="alert alert-primary" role="alert" >';
                $mensajeFactorial.="<p>";
                $mensajeFactorial.="El Factorial de $n es =".$resultadoFactorial;
                $mensajeFactorial.="</p>";
                $mensajeFactorial.="</div>";
            break;
            
            case 'calcularNumerosParesImpares':
                // Recibe el numero que se analizará
                // y se formatean en formato numerico
                
                $n=$_REQUEST["cantidad"];
                $n= intval($n);
                $nPar=0;
                $nImpar=0;
                
                $temp="";
                for($i=1; $i<=$n;$i++){
                    $numero= rand();
                    if($numero %2 ==0){
                        $nPar++;
                        $temp.="El número $numero es par <br>";
                    }else{
                        $nImpar++;
                        $temp.="El número $numero es impar <br>";
                    }
                }
                // Generamos un cuadro Alert para mostrar la informacion 
                $mensajeParesImpares.='<div class="alert alert-primary" role="alert" >';
                $mensajeParesImpares.="<p>";
                $mensajeParesImpares.="Los cantidad de números pares son: $nPar <br>";
                $mensajeParesImpares.="Los cantidad de números impares son: $nImpar <br>";
                $mensajeParesImpares.=$temp;
                $mensajeParesImpares.="</p>";
                $mensajeParesImpares.="</div>";
            break;
            case 'generarCruz':
                // Se declaran en vacio estas variables que seran llenadas mas adelante
                $temp="";
                $mensajeGenerarCruz="";
               
                $vertical=$_REQUEST["vertical"];
                $horizontal=$_REQUEST["horizontal"];
                // Se recibe los datos ingresados por el usuario y se formatean en formato numerico
                $vertical= intval($vertical);
                $horizontal= intval($horizontal);

                // En caso que los numeros ingresados sean pares, se les agrega +1 
                //para la correcta impresion de la cruz, esto generara un mensaje de 
                //aviso en el usuario
                $cambioVertical=false;
                $cambioHorizontal=false;
                if(($vertical%2)==0){
                    $vertical++;
                    $cambioVertical=true;
                }
                if(($horizontal%2)==0){
                    $horizontal++;
                    $cambioHorizontal=true;
                }
               
                // Calculamos cual es la mitad de ambos numeros ingresados para poder imprimir los *
                $mitadVertical=intval($vertical/2);
                $mitadHorizontal=intval($horizontal/2);

                for ($i=0; $i<$vertical; $i++) {
                    for ($a=0; $a< $horizontal;$a++) {
                        // Aca validamos si llegamos a la mitad vertical u horizontal, 
                        // en  dicho caso se imprime el * y en el contrario un espacio
                        // Como estamos utilizando HTML para la visualizacion, el espacio
                        // en blanco fue reemplazado por '&nbsp;'
                        if($i==$mitadVertical || $a==$mitadHorizontal){
                            $temp.= '*';
                        }else{
                            $temp.= '&nbsp;';
                        }
                    }
                    $temp.= '<br>';
                }
                 // Generamos un cuadro Alert para mostrar la informacion 
                $mensajeGenerarCruz.='<div class="alert alert-primary" role="alert" >';
                $mensajeGenerarCruz.='<p>';
                if($cambioVertical) $mensajeGenerarCruz.='Ups, debido a que el número que ingreso en el campo <b>Vertical</b> es PAR, tuvimos que sumarle +1 para su correcta impresión.<br>';
                if($cambioHorizontal) $mensajeGenerarCruz.='Ups, debido a que el número que ingreso en el campo <b>Horizontal</b> es PAR, tuvimos que sumarle +1 para su correcta impresión.<br>';
                $mensajeGenerarCruz.="</p>";
                $mensajeGenerarCruz.='<p class="formatearInterlineado">';
                $mensajeGenerarCruz.='<code>';
                $mensajeGenerarCruz.=$temp;
                $mensajeGenerarCruz.='</code>';
                $mensajeGenerarCruz.="</p>";
                $mensajeGenerarCruz.="</div>";
        
            break;
        }
    }else{
        // Si no se recibe información, no hace ninguna accion
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicios PHP </title>
    <meta name="author" content="Sebastian Valdebenito" />
    <!-- Se importa libreria Boostrap para dar un poco de CSS estandarizado al sitio y su correcta visualizacion -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <style>
        body{
            background-color: #f1f1f1;
        }
        .container{
            background-color: white;
        }
        .formatearInterlineado{
            line-height:50%;
            font-size:3rem;
        }
    </style>
</head>
<body>
    <div class="container mt-5 vh-80 p-4">
        <div class="row justify-content-between">
            <div class="col-sm-12 col-md-5 col-lg-5 mb-4">
                <h3>Generar una CRUZ con * y espacios</h3>
                <form class="row mt-2 g-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div>
                        <input type="hidden" name="tipo" value="generarCruz">
                        <label for="vertical" >Ingrese la cantidad de * que desea en de forma Vertical (del 3 al 50)</label>
                        <input required type="number" min="3" max="50" class="form-control" id="vertical" name="vertical" placeholder="Ej: 7" >
                        
                    </div>
                    <div>
                        <label for="horizontal" >Ingrese la cantidad de * que desea de forma Horizontal (del 3 al 50)</label>
                        <input required type="number" min="3" max="50" class="form-control" id="horizontal" name="horizontal" placeholder="Ej: 7">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mb-3">Generar</button>
                    </div>            
                    <?=$mensajeGenerarCruz?>
                </form>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 mb-4">
                <h3>Determina la cantidad de números Pares e Impares</h3>
                <form class="row mt-2 g-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div>
                        <input type="hidden" name="tipo" value="calcularNumerosParesImpares">
                        <label for="cantidad" >Ingrese la cantidad de números a generar</label>
                        <input required type="number" class="form-control" id="cantidad" name="cantidad">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mb-3">Calcular</button>
                    </div>            
                    <?=$mensajeParesImpares?>
                </form>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 mb-4">
                <h3>Calcular el Factorial de un Número</h3>
                <form class="row mt-2 g-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div>
                        <input type="hidden" name="tipo" value="calcularFactorialDeUnNumero">
                        <label for="numero" >Ingrese el número a analizar</label>
                        <input required type="number" class="form-control" id="numero" name="numero">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mb-3">Calcular</button>
                    </div>
                    <?=$mensajeFactorial?>
                </form>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 mb-4">
                <h3>Generar N números aleatorios del 1 al 5 y determine cuantas veces se repite cada número</h3>
                <form class="row mt-2 g-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div>
                        <input type="hidden" name="tipo" value="generarNumeroAleatorios">
                        <label for="cantidad" >Ingrese la cantidad de números a generar</label>
                        <input required type="number" min="1" max="1000"  placeholder="Del 1 al 1000" class="form-control" id="cantidad" name="cantidad">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mb-3">Calcular</button>
                    </div>
                    <?=$mensajeGenerarNumeros?>
                </form>
            </div>
            <div class="col-sm-12 col-md-5 col-lg-5 mb-4">
                <h3>Analizar el caracter ingresado</h3>
                <form class="row mt-2 g-3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <div>
                        <input type="hidden" name="tipo" value="caracter">
                        <label for="caracter" >Ingrese Caracter</label>
                        <input required type="text" maxlength="1" placeholder="Ej: L" class="form-control" id="caracter" name="caracter">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-primary mb-3">Calcular</button>
                    </div>
                    <?=$mensajeCaracter?>
                </form>
            </div>
        </div>
        
    </div>
    <div class="container">
        <footer class="py-3 my-4">
            <p class="text-center text-muted">Sitio Desarrollado por: Sebastián Valdebenito Guzmán</p>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>