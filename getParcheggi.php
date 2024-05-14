<?php
header('Content-Type: text/html; charset=UTF-8');
include("connessione.php");

if(isset($_POST['aeroporto'])) {
    $aeroporto = $_POST['aeroporto'];

    $sql = "SELECT `codice`, `nome` FROM `Parcheggio` WHERE `aeroporto` = '$aeroporto'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['codice'] . "'>" . $row['nome'] . "</option>";
        }
    } else {
        echo "<option value=''>Nessun parcheggio disponibile</option>";
    }
}
?>
