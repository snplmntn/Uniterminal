<?php

declare(strict_types=1);

function getEmail(Object $pdo, String $Email)
{
    $query = "SELECT Email FROM Accounts WHERE Email = :Email";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":Email", $Email); 
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function set_user(Object $pdo, String $Email, String $Pass)
{
    $query = "INSERT INTO Accounts (Email, Pass) VALUES (:Email, :Pass);";
    $stmt = $pdo->prepare($query);
    $options = [
        'cost' => 12
     ];
    $hashedpass = password_hash($Pass, PASSWORD_BCRYPT, $options);
    $stmt->bindParam(":Email", $Email);
    $stmt->bindParam(":Pass", $hashedpass);
    $stmt->execute();
}

?>