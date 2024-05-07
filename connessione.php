<?php
    $servername = "localhost"; // Indirizzo del server MySQL
    $username = "root"; // Nome utente del database
    $password = ""; // Password del database
    $dbname = "autoAereoporto"; // Nome del database
    
    // Connessione al database
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    // Verifica della connessione
    if ($conn->connect_error) {
        die("Connessione fallita: " . $conn->connect_error);
    } else {
        //echo "Connessione al database riuscita!";
    }
?>