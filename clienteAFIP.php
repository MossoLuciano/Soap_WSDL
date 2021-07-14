<?php

if(isset($_GET['importe']) && isset($_GET['impuesto'])){
    try{
        $wsdl = 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/Soap_WSDL/afip.wsdl';

        $options = array(
            'uri' => 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/Soap_WSDL/servidorAFIP.php',
            'location' => 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/Soap_WSDL/servidorAFIP.php'
        );
        
        $client = new SoapClient($wsdl, $options);
        
        echo "El importe final es: ". $client->calcularImpuesto($_GET['importe'], $_GET['impuesto']);
    }catch(Exception $ex){
        echo $ex->getMessage();
    }
   

}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        header{
            padding: 8px;
            background-color: lightskyblue;
        }

        header h1{
            text-align: center;
        }

        form{
            margin-top: 10px;
            padding: 20px;
            border: 1px solid black;
            text-align: center;
        }

        form input{
            padding: 5px;
        }

        form select{
            padding: 5px;
        }

        #importe{
            margin-bottom: 15px;
        }

        #boton{
            margin-left: 10px;
            padding-right: 15px;
            padding-left: 15px;
        }

        footer{
            padding: 8px;
            background-color: lightskyblue;
            margin-top: 25%;
        }

    </style>
    <title>Calculadora de impuestos | Online</title>
</head>
    <header>
        <h1>Calculadora virtual</h1>
    </header>
    <body>
        <form action="" method="GET">
            <label>Importe:</label>
            <input type="number" name="importe" id="importe"><br>
            <select name="impuesto">
                <option>Seleccione Impuesto...</option>
                <option value="21">IVA Consumidor Final</option>
                <option value="3.5">Ingresos Brutos</option>
                <option value="9">Ganancias</option>
                <option value="2.5">IVA p/ Diarios, revistas y publicaciones impresas</option>
            </select>
            <input type="submit" name="boton" value="Calcular" id="boton">
        </form>
    </body>
    <footer>
        <p>Todos los derechos reservados</p>
    </footer>
</html>

<?php } ?>