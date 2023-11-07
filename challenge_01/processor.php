<?php
/*
Procesador de datos v.1.0 by: drakodark
*/
$DATA = $_FILES['input-text']['tmp_name'];
if (isset($DATA)) {
    header('Content-type: text/plain');
    $DATA_CONTENT_IN = array_count_values(explode(" ", strtolower(str_replace("\n", "", file_get_contents($DATA)))));
    foreach ($DATA_CONTENT_IN as $DATA_WORD => $DATA_COUNT) {
        echo $DATA_WORD . $DATA_COUNT;
    }
} else {
    echo 'ERROR: Se ha especificado un archivo de texto *.txt';
}
?>