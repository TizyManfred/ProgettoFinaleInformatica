<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registra utenti</title>
</head>
<body>
<?php
    include "connessione.php";

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = $_POST["nome"];
        $cognome = $_POST["cognome"];
        $numeroTel = $_POST["numeroTel"];
        $mail = $_POST["mail"];
        $password1 = $_POST["password1"];
        $password2 = $_POST["password2"];

        $passwordCritt = password_hash($password1, PASSWORD_DEFAULT);

        // Estrai la data di nascita dal POST
        $dataNascita = $_POST["dataNascita"];

        // Converte la data di nascita nel formato MySQL (YYYY-MM-DD)
        $dataConvertita = date("Y-m-d", strtotime($dataNascita));

        $sql = "INSERT INTO `Utente`(`mail`, `nome`, `cognome`, `dataNascita`, `numeroTelefono`, `password`) 
                VALUES ('$mail', '$nome', '$cognome', '$dataConvertita', '$numeroTel', '$passwordCritt')";

        // Esegui la query e controlla se è andata a buon fine
        if ($conn->query($sql) === TRUE) {
            // Operazione di inserimento riuscita
            header("Location: home.php");
            exit;
        } else {
            echo "<script>
                    window.history.back();
                </script>";               
            exit;
        }
    }

    $conn->close();
?>


</body>
</html>