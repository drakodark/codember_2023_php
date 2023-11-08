<?php
/*
Procesador de datos v.1.1 by: drakodark

Aqui una descripcion de lo que hace cada parte.

$DATA_CONTENT_IN = array_count_values(explode(" ", strtolower(str_replace("\n", "", file_get_contents($DATA)))));

El archivo txt llega del formulario y se almacena en la variable $DATA, luego de eso el contenido se comieza a
limpiar hasta llegar al resultado deseado. Empezando por "file_get_contens()", esta funcion se encarga de obtener todo
el contenido del archivo de texrto y luego es pasado a otra funcion, "str_replace("\n", )", esta funcion se encarga de eliminar
todos los posibles saltos de linea que tenga el documento, despues de eso pasa por "strtolower()" que transforma todas las
mayusculas que pueda tener el archivo de texto a minusculas luego es trasladado a "explode(" ", )", que hace todas las palabras
que esten cortadas con un espacio pasen a formar parte de un array y luego por ultimo es trasladada a la ultima funcion que es
"array_count_value()" que cuenta todos los valores que tiene el array.

El "foreach" se encarga de buscar y sumar todas las coincidentes del array segun la pocicion en la que aparecen.
*/

$DATA = isset($_FILES['input-text']['tmp_name']) ? $_FILES['input-text']['tmp_name'] : null;
$DATA_TYPE = isset($_FILES['input-text']['name']) ? $_FILES['input-text']['name'] : null;

if (isset($DATA) || pathinfo($DATA_TYPE, PATHINFO_EXTENSION) == 'txt') {
    header('Content-type: text/plain');
    $DATA_CONTENT_IN = array_count_values(explode(" ", strtolower(str_replace("\n", "", file_get_contents($DATA)))));
    foreach ($DATA_CONTENT_IN as $DATA_WORD => $DATA_COUNT) {
        echo $DATA_WORD . $DATA_COUNT;
    }
} else {
    header('Content-type: text/plain');
    echo 'ERROR: No se ha especificado un archivo de texto *.txt';
}
?>