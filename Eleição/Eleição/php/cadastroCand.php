<?php

$nome_cand= $_GET["name_cand"];
$num_cand= $_GET["num_cand"];

$hostname = "localhost"; 
$user = "root";
$password = "ifsp";
$database = "eleicao";

$conn = mysqli_connect($hostname, $user, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}
$query = "select * from candidatos where numero_candidato = '$num_cand'";

$results = mysqli_query($conn, $query);

if(mysqli_num_rows($results) == 1){
    echo json_encode(array("message" => "esse número de candidato já existe"));
}
else{
    $query = "select * from candidatos where nome_candidato = '$Candidato'";

    $results = mysqli_query($conn, $query);
        if(mysqli_num_rows($results) == 1){
            echo json_encode(array("message" => "esse nome de candidato já existe"));
        }
        else{
            $query = "insert into candidatos(numero_candidato, nome_candidato, votos) value('$num_cand','$nome_cand','0')";
            
            $results = mysqli_query($conn, $query);
        }
}

    $results = mysqli_query($conn, $query);
mysqli_close($conn);
header("Location: /Eleição/index.html");
exit();


?>