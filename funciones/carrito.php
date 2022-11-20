<?php
session_start();

$mensaje = "";

if (isset($_POST['btnAccion'])) {

    switch ($_POST['btnAccion']) {

        case 'Agregar':

            if (is_numeric(openssl_decrypt($_POST['id'], COD, KEY))) {
                $ID = openssl_decrypt($_POST['id'], COD, KEY);
                $mensaje .= "Ok ID correcto " . $ID . "<br/>";
            } else {
                $mensaje .= "Upss... ID incorrecto " . $ID . "<br/>";
            }
            if (is_string(openssl_decrypt($_POST['nombre'], COD, KEY))) {
                $NOMBRE = openssl_decrypt($_POST['nombre'], COD, KEY);
                $mensaje .= "Ok NOMBRE correcto " . $ID . "<br/>";
            } else {
                $mensaje .= "Upss... nombre incorrecto " . $ID . "<br/>";
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['cantidad'], COD, KEY))) {
                $CANTIDAD = openssl_decrypt($_POST['cantidad'], COD, KEY);
                $mensaje .= "Ok CANTIDAD correcto " . $ID . "<br/>";
            } else {
                $mensaje .= "Upss... cantidad incorrecto " . $ID . "<br/>";
                break;
            }
            if (is_numeric(openssl_decrypt($_POST['precio'], COD, KEY))) {
                $PRECIO = openssl_decrypt($_POST['precio'], COD, KEY);
                $mensaje .= "Ok PRECIO correcto " . $ID . "<br/>";
            } else {
                $mensaje .= "Upss... precio incorrecto " . $ID . "<br/>";
                break;
            }

            if (!isset($_SESSION['CARRITO'])) {

                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO,
                );
                $_SESSION['CARRITO'][0] = $producto;
            } else {
                $NumeroProductos = count($_SESSION['CARRITO']);
                $producto = array(
                    'ID' => $ID,
                    'NOMBRE' => $NOMBRE,
                    'CANTIDAD' => $CANTIDAD,
                    'PRECIO' => $PRECIO,
                );
                $_SESSION['CARRITO'][$NumeroProductos] = $producto;
            }

            $mensaje = print_r($_SESSION, true);

            break;
    }
}
