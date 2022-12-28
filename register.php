<?php

$jsonData = file_get_contents('./emails/emails.json');
$arrayData = json_decode($jsonData);

addRegister('Novo cadastro', 'serginho.semnome@example.com');

echo "<pre>";
print_r($arrayData);
echo "</pre>";

file_put_contents('./emails/emails.json', toJson($arrayData));


function addRegister($nome, $email) {
    $newLine = new stdClass;

    global $arrayData;
    $registersNo = count($arrayData);

    $newLine->id = ++$registersNo;
    $newLine->name = $nome;
    $newLine->email = $email;

    array_push($arrayData, $newLine);
}

function toJson($data) {
    $json = json_encode($data,
                        JSON_PRETTY_PRINT |
                        JSON_UNESCAPED_UNICODE |
                        JSON_UNESCAPED_SLASHES |
                        JSON_HEX_QUOT |
                        JSON_PRESERVE_ZERO_FRACTION);
    return $json;
}