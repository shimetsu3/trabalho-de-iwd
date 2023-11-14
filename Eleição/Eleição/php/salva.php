<?php

$Num_Candidato = $_GET["numero_Candidato"];
$Email = $_GET["Email"];
$votos=0;

$hostname = "localhost"; 
$user = "root";
$password = "ifsp";
$database = "eleicao";

$conn = mysqli_connect($hostname, $user, $password, $database);

if (!$conn) {
    die("Conexão falhou: " . mysqli_connect_error());
}

$query = "insert into votantes(email) value('$Email')";

$results = mysqli_query($conn, $query);

$query = "select * from candidatos where numero_candidato = '$Num_Candidato'";


$results = mysqli_query($conn, $query);

if(mysqli_num_rows($results) == 1){
    $query = "select * from votantes where votantes.email = '$Email'";

    $results = mysqli_query($conn, $query);
    if(mysqli_num_rows($results) == 0){
        $query = "update candidatos SET votos = votos+1 WHERE numero_candidato='".$Num_Candidato."'";
    }
    else{
        echo json_encode(array("message" => "você já votou"));
    }
}
else{
    echo json_encode(array("message" => "teu candidato não existe"));
}

$results = mysqli_query($conn, $query);


mysqli_close($conn);
header("Location: /Eleição/index.html");
exit();


?>