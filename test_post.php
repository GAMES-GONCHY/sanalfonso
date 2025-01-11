<?php
$url = "http://localhost/tercerAnio/sanalfonso/codeigniter/index.php/api/prueba";
$data = array(
    "nombre" => "Cinthia",
    "edad" => 25
);

$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
        'method'  => 'POST',
        'content' => http_build_query($data),
    ),
);
$context  = stream_context_create($options);
$result = file_get_contents($url, false, $context);
echo $result;
?>
