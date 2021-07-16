<?php

$result = 0;

if(isset($_GET['importe']) && isset($_GET['impuesto'])){

    try{
        $wsdl = 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/Soap_WSDL/afip.wsdl';

        $options = array(
            'uri' => 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/Soap_WSDL/servidorAFIP.php',
            'location' => 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/Soap_WSDL/servidorAFIP.php'
        );
        
        $client = new SoapClient($wsdl, $options);
        
        //echo "El importe final es: ". $client->calcularImpuesto($_GET['importe'], $_GET['impuesto']);
        
        $result = $client->calcularImpuesto($_GET['importe'], $_GET['impuesto']);

    }catch(Exception $ex){
        echo $ex->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>

        *{
            font-family: Georgia, 'Times New Roman', Times, serif;
        }
        header{
            padding: 8px;
            background-color: lightskyblue;
        }

        header h1{
            text-align: center;
        }

        form{
            margin: 0 auto;
            padding: 20px;
            /*border: 1px solid black;*/
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            margin-top: 20px;
        }

        form input{
            padding: 5px;
            font-size: medium;
        }

        form select{
            padding: 5px;
            font-size: medium;
        }

        #importe{
            margin-bottom: 15px;
        }

        #resultado{
            margin: 10px;
            margin-left: 5px;
        }

        #boton{
            margin-left: 5px;
            padding-right: 15px;
            padding-left: 15px;
        }

        footer{
            padding: 10px;
            background-color: lightskyblue;
            text-align: center;
        }

    </style>
    <title>Calculadora de impuestos | Online</title>
</head>
    <header>
        <h1>Calculadora virtual</h1>
    </header>
    <body>
        <form action="" method="GET">
            <input type="number" name="importe" id="importe" placeholder="Importe"><br>
            <select name="impuesto">
                <option>Seleccione Impuesto...</option>
                <option value="21">IVA Consumidor Final</option>
                <option value="3.5">Ingresos Brutos</option>
                <option value="9">Ganancias</option>
                <option value="2.5">IVA p/ Diarios, revistas y publicaciones impresas</option>
            </select>
            <?php
                $total = 0;
                $total = $result; 
                echo "<br>". "<input type='number' id='resultado' value='$total'>"."<br>"; 
            ?>
            <input type="submit" name="boton" value="Calcular" id="boton">
        </form>
        <section>
            <h3>Instrucciones:</h3>
            <div id="info">
                <p>1- Ingrese el importe a calcular.</p>
                <p>2- Seleccione el impuesto.</p>
                <p>3- Pulse el boton "Calcular".</p>
            </div>
        </section>
    </body>
    <footer>
        <p><strong>Todos los derechos reservados - 2021</strong></p>
    </footer>
</html>

<script>

    let txtImporte = document.getElementById("importe");
    let txtResultado = document.getElementById("resultado");
    let boton = document.getElementById("boton");
    
    if(txtResultado != "" || txtResultado != 0){
        txtImporte.value = "";
    }

</script>
