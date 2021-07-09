<?php

if(isset($_GET['importe']) && isset($_GET['impuesto'])){

    $wsdl = 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/soap_Con_WSDL/afip.wsdl';

    $options = array(
        'uri' => 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/soap_Con_WSDL/servidorAFIP.php',
        'location' => 'http://localhost/API_Web_Service/Laboratorios/Laboratorio3/soap_Con_WSDL/servidorAFIP.php'
    );
    
    $client = new SoapClient($wsdl, $options);
    
    echo "El importe final es: ". $client->calcularImpuesto($_GET['importe'], $_GET['impuesto']);

}else{

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculadora de impuestos | Online</title>
</head>
<body>
    <h1>AFIP</h1>
    <form action="" method="GET">
        <input type="number" name="importe"><br>
        <select name="impuesto">
            <option>Seleccione Impuesto...</option>
			<option value="21">IVA Consumidor Final</option>
			<option value="3.5">Ingresos Brutos</option>
			<option value="9">Ganancias</option>
			<option value="2.5">IVA p/ Diarios, revistas y publicaciones impresas</option>
        </select>
        <input type="submit" name="boton" value="Calcular">
    </form>
</body>
</html>

<?php } ?>