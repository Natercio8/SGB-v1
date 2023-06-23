<?php

    try {
        $conn = new PDO('mysql:host=localhost;dbname=sgbester','root','');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    
    catch (PDOException $warning) {
        echo "Ocorreu um erro no: {$warning->getMessage()}";
    }
?>