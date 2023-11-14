<?php

$hostname = "localhost"; 
$user = "root";
$password = "ifsp";
$database = "eleicao";

$conn = mysqli_connect($hostname, $user, $password, $database);

$query = "select * from candidatos";
$results = mysqli_query($conn, $query);
$index = 0;

while($record = mysqli_fetch_row($results)){
    $question = array(
        'numero_cadidato' => $record[1],
        'nome_candidato' => $record[2],
        'votos' => $record[3],
    );
    $questions[$index] = $question;
    $index++;
}

mysqli_close($conn);
$formattedData =  json_encode($questions, JSON_PRETTY_PRINT);
echo "<pre>" . $formattedData . "</pre>";
?>