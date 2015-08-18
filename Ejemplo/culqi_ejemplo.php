<?php
    require 'culqi.php';
    
    Culqi::$llaveSecreta = "Aq+yGWgYrDK9qWi30yj6+LicpKXxuVqZEGKsu9U4pwE=";
    Culqi::$codigoComercio = "xdemo";
    Culqi::$servidorBase = 'https://integ-pago.culqi.com';
    
    try {
        
        $data = Pago::crearDatospago(array(
                                           
            //Numero de pedido de la venta
            Pago::PARAM_NUM_PEDIDO => rand(5, 10000),
                                           
            //Moneda de la venta ("PEN" O "USD")
            Pago::PARAM_MONEDA => "PEN",
                                           
            //Monto de la venta (ejem: 10.25, va sin el punto decimal)
            Pago::PARAM_MONTO => "1025",
                                           
            //Descripción de la venta
            Pago::PARAM_DESCRIPCION => "Venta de prueba.",
                                           
            //Código del país del cliente Ej. PE, US
            Pago::PARAM_COD_PAIS => "PE",
                                           
            //Ciudad del cliente
            Pago::PARAM_CIUDAD => "Lima",
                                           
            //Dirección del cliente
            Pago::PARAM_DIRECCION => "Avenida Lima 2132, Miradores",
                                           
            //Número de teléfono del cliente
            Pago::PARAM_NUM_TEL => "992765900",
                                           
        ));
        
        //Respuesta de la creación de la venta. Cadena cifrada.
        $informacionVenta = $data[Pago::PARAM_INFO_VENTA];
        
        echo "<script src=\"https://integ-pago.culqi.com/culqi.js\"></script><script src=\"https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js\"></script><button id=\"btn_pago\">Pagar</button><script>checkout.codigo_comercio = \"xdemo\";checkout.informacion_venta = \"$informacionVenta\";$('#btn_pago').on('click', function(e) {checkout.abrir();e.preventDefault();});function culqi (checkout) {console.log(checkout.respuesta);checkout.cerrar();};</script>";


    } catch (InvalidParamsException $e) {
        
        echo $e->getMessage()."\n";
        
    }
?>
