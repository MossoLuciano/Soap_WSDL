<?php

class ServidorAFIP{

    public function calcularImpuesto($importe, $impuesto){
        return $importe += ($importe * $impuesto) / 100;
    }
}

$server = new SoapServer("afip.wsdl");
$server->setClass("ServidorAFIP");
$server->handle();

?>